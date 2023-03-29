<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFile(Request $request)
    {
        $path = $request->file('avatar')->store('avatars');
        $data = [
            'message' => 'File Upload',
            'path' => $path
        ];

        return response()->json($data, 200);

    }
}
