<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function register_user() {
        $data['header_title'] = 'Register';
        return view('client/auth/register', $data);
    }

    public function insert(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'check' => 'required',
        ], [
            'required' => 'The :attribute field is required',
            'email' => ':attribute error format',
            'unique' => ':attribute already exists',
            'min' => ':attribute must be greater than 6 characters',
        ]);

        $token_verify_email = Hash::make(Str::random(10));

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token_verify_email = $token_verify_email;
        $user->roles = 0;
        $user->save();

        MailController::sendMail($token_verify_email, $user->email);
        
        return redirect()->route('login')->with('success', "Tạo tài khoản người dùng thành công");
        //return redirect()->route('VerifyEmail.Message');
    }

    public function changePassword() {
        $data['header_title'] = 'Change Password';
        return view('client/components/change-password', $data);
    }

    public function submitChangePassword(Request $request) {
        $request->validate([
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'repeatPassword' => 'required|min:6|same:newPassword',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->oldPassword, $user->password)) {
            return redirect()->back()->with('error', 'Sai mật khẩu cũ');
        }

        // Cập nhật mật khẩu mới cho người dùng
        $user->password = Hash::make($request->newPassword);
        // $user->save();

        return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công');
    }

    public function editProfile(Request $request) {
        $user = User::find(Auth::user()->id);
        
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->address = $request->address;
        $user->save();
        
    
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

}
