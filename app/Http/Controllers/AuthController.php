<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;


class AuthController extends Controller
{
    public function login_admin() {
        
        if(Auth::check()) {
            if(Auth::User()->roles == 1) return redirect()->route('admin.dashboard');               
            else {
                Auth::logout();
            }
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request) {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'roles' => 1, 'status' => 0, 'is_deleted' => 0], $remember)) {
            //dd($remember);
            return redirect()->route('admin.dashboard');
        }
        else return redirect()->back()->with('error', "Email hoặc mật khẩu không chính xác");
        return redirect()->route('admin.dashboard');
    }

    public function logout_admin() {
        if(Auth::check()) {
            Auth::logout();
            return redirect('admin');
        }
    }

    public function login_user() {
        $data['header_title'] = 'Login';
        if(Auth::check()) {
            if(Auth::User()->roles == 0) return redirect()->route('home');
            else {
                Auth::logout();
            }
        }
        return view('client/auth/login', $data);
    }

    public function auth_login_user(Request $request) {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->singin_email, 'password' => $request->singin_password, 'roles' => 0, 'is_deleted' => 0], $remember)) {
            if(Auth::User()->status == 0) return redirect('home');
            else {
                $randomString = Str::random(10); 
                $token_verify = Hash::make($randomString);
                $user = User::find(Auth::user()->id);
                $user->token_verify_email = $token_verify;
                $user->save();
                MailController::sendMail($randomString, $user->email);
                return redirect()->route('VerifyEmail.Message');
            }
            //return redirect()->route('home');
        }
        else return redirect()->back()->with('error', "Email hoặc mật khẩu không chính xác");
    }

    public function logout_user() {
        if(Auth::User()) {
            Auth::logout();
            session()->flush();
            return redirect('home');
        }
        
    }

}
