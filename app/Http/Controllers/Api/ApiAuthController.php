<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
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
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {

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

        /** cek apakah authentifikasi benar atau salah, jika salah kembalikan ke halaman login
         *  jika benar arahkan ke halaman selanjutnya
         */
        if (Auth::attempt($auth) === false) {

            return response()->json([
                'message' => 'Bad Credentials'
            ], 401);
        }

        /** @var User $user */
        $user = Auth::user();

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
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {

    }
}
