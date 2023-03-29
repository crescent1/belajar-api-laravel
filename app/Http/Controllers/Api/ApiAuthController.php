<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiAuthController extends Controller
{
    /**
     * Undocumented function
     *
     * @param RegisterRequest $request
     * @return \App\Http\Resources\LoginResource
     */
    public function register(RegisterRequest $request)
    {
        // simpan data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // return token
        /** @var string $token */
        $token = $user->createToken('token')->plainTextToken;
        // Log::info($token);
        return new LoginResource([
            'user' => $user,
            'token' => $token
        ]);

    }

    /**
     * Undocumented function
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse|\App\Http\Resources\LoginResource
     */
    public function login(LoginRequest $request)
    {
        /**
         * validasi request dari user
         *
         * @var array $auth data request login dari user
         */
        $auth = $request->validated();

        /** cek apakah authentifikasi benar atau benar, jika salah kembalikan ke halaman login
         *  jika benar arahkan ke halaman selanjutnya
         */
        if (Auth::attempt($auth)) {
            /** @var User $user */
            $user = Auth::user();

            /** @var string $token */
            $token = $user->createToken('token')->plainTextToken;
            // Log::info($token);
            return new LoginResource([
                'user' => $user,
                'token' => $token
            ]);

        } else {
            return response()->json([
                'message' => 'Bad Credentials'
            ], 401);
        }
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // dd($request->user());
        // hapus token
        // $request->user()->currentAccessToken()->delete();
        // hapus semua token by user
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        // // return response
        return response()->noContent();

    }
}
