<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Correct Validator facade

class authController extends Controller
{
    public function loginUser(Request $request)
    {
        $Validation = Validator::make($request->all(), [
            'email'    => 'required|string|email|exists:users,email',
            'password' => 'required|string',
        ]);

        if ($Validation->fails()) {
            return response()->json(['status' => 400, 'message' => $Validation->errors()->first()]);
        } else {
            $cred = ['email' => $request->email, 'password' => $request->password];
            if (Auth::attempt($cred, false)) {
                if (Auth::user()->hasRole('admin')) {
                    return response()->json(['status' => 200, 'message' => 'admin user','url'=>'admin/dashboard']);
                } else {
                    return response()->json(['status' => 200, 'message' => 'non user']);
                }
            } else {
                return response()->json(['status' => 404, 'message' => 'Wrong Credentials']);
            }
        }
    }
}
