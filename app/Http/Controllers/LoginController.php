<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AuthRequest;
use App\Services\Checker;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        //Login Controller
        public function checkAppointment(Request $request){
            return redirect()->route('admin.appointment');
        }
        public function showLoginForm() {
            return view("layout.admin.login");
        }
        public function login(Request $request)
        {
            $user = User::where('email', $request->input('email'))->first();
        
            if ($user && Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'error']);
            }
        }
        
        
}
