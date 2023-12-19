<?php


namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Login;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends Controller
{
    /**
     * Register a new user.
     */
    public function register(UserRequest $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|min:8',
        ]);

        // $existingUser = User::where('email', $validatedData['email'])->first();

        // if ($existingUser) {
        //     return response()->json(['error' => 'User with this email already exists.'], 400);
        // }

        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken($validatedData['email']);

        $response = [
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token->accessToken,
        ];

        return $response;
    }

    public function login(UserRequest $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:8',
        ]);

        try {
            $user = User::where('email', $validatedData['email'])->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (!Hash::check($validatedData['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Insert a record into the logins table
        Login::create([
            'email' => $validatedData['email'],
            'login_time' => now(),
        ]);

        $token = $user->createToken($validatedData['email']);

        $response = [
            'user' => $user,
            'token' => $token->accessToken, // Use accessToken instead of plainTextToken
        ];

        return $response;
    }


    public function show($id)
    {
        $login = Login::findOrFail($id);

        return response()->json(['data' => $login]);
    }

    public function getLatestLoginId()
    {
        $latestLogin = Login::latest()->first();

        return response()->json(['latest_login_id' => $latestLogin->user_id]);
    }
}
