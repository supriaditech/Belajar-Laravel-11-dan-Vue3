<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends ResponseFormatter
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(
                null,
                'error',
                'Validation failed: ' . implode(', ', $validator->errors()->all()),
                422
            );
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->apiResponse([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 'success', 'User registered successfully', 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);


        if ($validator->fails()) {
            return $this->apiResponse(
                null,
                'error',
                'Validation failed: ' . implode(', ', $validator->errors()->all()),
                422
            );
        }


        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->apiResponse(null, 'error', 'Invalid credentials', 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->apiResponse([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 'success', 'User login successfully', 200);
    }

    public function logout(Request $request)
    {
        // Mendapatkan pengguna yang terautentikasi  
        $user = $request->user();

        // Memeriksa apakah pengguna terautentikasi  
        if (!$user) {
            return $this->apiResponse(null, 'error', 'User already logged out', 400);
        }

        // Menghapus semua token pengguna  
        try {
            $user->tokens()->delete();
        } catch (\Exception $e) {
            // Menangani kesalahan saat menghapus token  
            return $this->apiResponse(null, 'error', 'Failed to log out. Please try again.', 500);
        }

        return $this->apiResponse(null, 'success', 'Logged out successfully', 200);
    }




    public function getUser(Request $request)
    {
        // Mendapatkan pengguna yang terautentikasi  
        $user = $request->user();

        // Memeriksa apakah pengguna terautentikasi  
        if (!$user) {
            return $this->apiResponse(null, 'error', 'User not authenticated', 401);
        }

        // Mengembalikan respons dengan struktur yang diinginkan  
        return $this->apiResponse($user, 'success', 'User retrieved successfully', 200);
    }


    public function updateUser(Request $request)
    {
        // Memeriksa apakah pengguna terautentikasi  
        $user = Auth::user();
        if (!$user) {
            return $this->apiResponse(null, 'error', 'User not authenticated', 401);
        }

        // Validasi input  
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(
                null,
                'error',
                'Validation failed: ' . implode(', ', $validator->errors()->all()),
                422
            );
        }
        /** @var \App\Models\User $user **/

        // Memperbarui data pengguna  
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->save();

        // Mengembalikan respons dengan data pengguna yang diperbarui  
        return $this->apiResponse($user, 'success', 'User updated successfully', 200);
    }



    public function deleteUser(Request $request)
    {
        // Mendapatkan pengguna yang terautentikasi  
        $user = $request->user();

        // Memeriksa apakah pengguna terautentikasi  
        if (!$user) {
            return $this->apiResponse(
                null,
                'error',
                'User not authenticated',
                401
            );
        }

        // Menghapus semua token pengguna  
        $user->tokens()->delete();

        // Menghapus pengguna  
        $user->delete();

        // Mengembalikan respons menggunakan apiResponse  
        return $this->apiResponse(
            null,
            'success',
            'User deleted successfully',
            200
        );
    }
}
