<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MailController extends Controller
{
    public static function sendMail($token_verify_email, $user_email) {
        Mail::send('client.components.emails.verifyEmail', ['token_verify_email' => $token_verify_email], function($email) use ($user_email) {
            $email->subject('Xác nhận tài khoản');
            $email->to($user_email, "Customer");
        });
    }

    public function message() {
        return view('client/message/verifyEmail');
    }
    public function verifyEmail($token_verify) {
        $user = User::find(Auth::user()->id);
        //dd($token_verify);
        if(Hash::check($token_verify, $user->token_verify_email)) {
            $user->token_verify_email = Hash::make(Str::random(20));
            $user->email_verified_at = now();
            $user->status = 0;
            $user->save();
            return view('client/message/success');
        }
        else {
            Auth::logout();
            return "Error when verify email";
        }
    }


}
