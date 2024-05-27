<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryModel;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function list() {
        $data['header_title'] = 'Category';
        $data['getRecord'] = CategoryModel::getRecord();
        return view('admin.category.list', $data);
    }

    public function add() {
        $data['header_title'] = 'Add new Category';
        return view('admin.category.add', $data);
    }

    public function insert(Request $request) {

        $request->validate([
            'name' => 'required',
        ], [
            'required' => 'The :attribute field is required',
        ]);
        $category = new CategoryModel;
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;
        $category->status = $request->status;
        $category->save();
        
        return redirect('admin/category/list')->with('success', "Thêm mới danh mục thành công!");
    }

    public function edit($id) {
        $data['header_title'] = 'Edit Category';
        $data['category'] = CategoryModel::find($id);
        return view('admin.category.edit', $data);
    }

    public function update($id, Request $request) {

        $request->validate([
            'name' => 'required',
        ], [
            'required' => 'The :attribute field is required',
        ]);
        $category = CategoryModel::find($id);
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;
        $category->status = $request->status;
        $category->save();
        
        return redirect('admin/category/list')->with('success', "Cập nhật danh mục thành công!");
    }

    public function delete($id, Request $request) {
        $category = CategoryModel::find($id);       
        $category->delete();
        
        return redirect()->back()->with('success', "Xóa danh mục thành công!");
    }


}
