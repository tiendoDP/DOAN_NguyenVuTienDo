<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function list() {
        $data['header_title'] = 'Admin';
        $data['getAdmin'] = User::getAdmin();
        return view('admin.admin.list', $data);
    }

    public function add() {
        $data['header_title'] = 'Add new Admin';
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'required' => 'The :attribute field is required',
            'email' => ':attribute lỗi',
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute phải lớn hơn 6 ký tự',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = $request->role;
        $user->status = $request->status;
        $user->save();
        
        return redirect('admin/admin/list')->with('success', "Thêm mới tài khoản thành công!");
    }

    public function edit($id) {
        $data['header_title'] = 'Edit Admin';
        $data['admin'] = User::find($id);
        return view('admin.admin.edit', $data);
    }

    public function update($id, Request $request) {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ], [
            'required' => 'The :attribute field is required',
            'email' => ':attribute lỗi',
            'unique' => ':attribute đã tồn tại',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)) $user->password = Hash::make($request->password);
        $user->roles = $request->role;
        $user->status = $request->status;
        $user->save();
        
        return redirect('admin/admin/list')->with('success', "Cập nhật tài khoản thành công!");
    }

    public function delete($id, Request $request) {
        $user = User::find($id);
        
        $user->is_deleted = 1;
        $user->save();
        
        return redirect()->back()->with('success', "Xóa tài khoản thành công!");
    }

    public function unlock($id, Request $request) {
        $user = User::find($id);
        
        $user->is_deleted = 0;
        $user->save();
        
        return redirect()->back()->with('success', "Cập nhật tài khoản thành công!");
    }
}
