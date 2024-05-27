<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;

use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function list() {
        $data['header_title'] = 'SubCategory';
        $data['getRecord'] = SubCategoryModel::getRecord();
        return view('admin.subcategory.list', $data);
    }

    public function add() {
        $data['header_title'] = 'Add new SubCategory';
        $data['getRecord_Category'] = CategoryModel::getRecord();
        return view('admin.subcategory.add', $data);
    }

    public function insert(Request $request) {

        $request->validate([
            'name' => 'required',
        ], [
            'required' => 'The :attribute field is required',
        ]);
        $subcategory = new SubCategoryModel;
        $subcategory->name = $request->name;
        $subcategory->created_by = Auth::user()->id;
        $subcategory->category_id = $request->category_id;
        $subcategory->status = $request->status;
        $subcategory->save();
        
        return redirect('admin/sub_category/list')->with('success', "Thêm mới thành công!");
    }

    public function edit($id) {
        $data['header_title'] = 'Edit Category';
        $data['getRecord'] = SubCategoryModel::find($id);
        $data['getRecord_Category'] = CategoryModel::getRecord();
        return view('admin.subcategory.edit', $data);
    }

    public function update($id, Request $request) {

        $request->validate([
            'name' => 'required',
        ], [
            'required' => 'The :attribute field is required',
        ]);
        $subcategory = SubCategoryModel::find($id);
        $subcategory->name = $request->name;
        $subcategory->created_by = Auth::user()->id;
        $subcategory->category_id = $request->category_id;
        $subcategory->status = $request->status;
        $subcategory->save();
        
        return redirect('admin/sub_category/list')->with('success', "Cập nhật thành công");
    }

    public function delete($id, Request $request) {
        $category = SubCategoryModel::find($id);       
        $category->delete();
        
        return redirect()->back()->with('success', "Xóa thành công");
    }
}
