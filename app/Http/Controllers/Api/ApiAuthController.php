<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiAuthController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {

    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        /**
         * validasi request dari user
         *
         * @var array $auth data request login dari user
         */
        $auth = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        /** cek apakah authentifikasi benar atau salah, jika salah kembalikan ke halaman login
         *  jika benar arahkan ke halaman selanjutnya
         */
        if (Auth::attempt($auth) === false) {

            return response()->json([
                'message' => 'Bad Credentials'
            ], 401);
        }

        /** @var User */
        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        Log::info($token);

        return response()->json([
            'message' => 'Login'
        ], 200);

    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {

    }
}
