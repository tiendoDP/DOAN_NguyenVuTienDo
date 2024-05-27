<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list() {
        $data['header_title'] = 'Product';
        $data['getRecord'] = ProductModel::getRecord();
        //dd($data['getRecord']);
        return view('admin.product.list', $data);
    }

    public function add() {
        $data['header_title'] = 'Add new Product';
        $data['getRecord_Category'] = CategoryModel::getRecord();
        $data['sizes'] = Size::get();
        $data['colors'] = Color::get();
        return view('admin.product.add', $data);
    }

    public function insert(Request $request) {
        //dd($request->sizes);
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'colors' => 'array|required',
            'sizes' => 'array|required',
        ], [
            'required' => 'The :attribute field is required',
            'max' => ':attribute must not exceed max:2080',
        ]);
        DB::beginTransaction();
        try {
            $fileName = time().'.'.$request->image->getCLientOriginalExtension();
            $request->image->move(public_path('assets/images/products'), $fileName);
            
            $product = new ProductModel;
            $product->name = $request->name;
            $product->created_by = Auth::user()->id;
            $product->status = $request->status;
            $product->sex = $request->sex;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->image = $fileName;
        
            $product->save();
        
            // Lưu hình ảnh vào bảng product_image
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('assets/images/products'), $fileName);
        
                    // Tạo mới một bản ghi trong bảng product_image
                    $productImage = new ProductImage;
                    $productImage->product_id = $product->id; // ID của sản phẩm mới được tạo
                    $productImage->url = $fileName;
                    $productImage->save();
                }
            }

            foreach ($request->sizes as $size) {
                $sizeNew = new ProductSize;
                $sizeNew->product_id = $product->id; 
                $sizeNew->size_id = $size;
                $sizeNew->save();
            }
            
            foreach ($request->colors as $color) {
                $colorNew = new ProductColor;
                $colorNew->product_id = $product->id; 
                $colorNew->color_id = $color;
                $colorNew->save();
            }
            DB::commit();
            return redirect('admin/product/list')->with('success', "Thêm sản phẩm thành công!");
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Thêm thất bại, vui lòng thử lại.');
        }
    }
    

    public function edit($id) {
        $data['header_title'] = 'Edit Product';
        $data['product'] = ProductModel::find($id);
        $data['getRecord_Category'] = CategoryModel::getRecord();
        $data['sizes'] = Size::get();
        $data['colors'] = Color::get();
        $data['product_images'] = ProductModel::find($id)->images;
        $data['product_sizes'] = ProductModel::find($id)->sizes;
        $data['product_colors'] = ProductModel::find($id)->colors;
        
        return view('admin.product.edit', $data);
    }

    public function update($id, Request $request) {

        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'images.*' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'colors' => 'array|required',
            'sizes' => 'array|required',
        ], [
            'required' => 'The :attribute field is required',
            'max' => ':attribute must not exceed max:2080',
        ]);

        DB::beginTransaction();
        try {
            $fileName = $request->old_image;

            if(!empty($request->image)) {
                $fileName = time().'.'.$request->image->getCLientOriginalExtension();
                $request->image->move(public_path('assets/images/products'), $fileName);
            }


            $product = ProductModel::find($id);
            $product->name = $request->name;
            $product->created_by = Auth::user()->id;
            $product->status = $request->status;
            $product->sex = $request->sex;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->image = $fileName;

            $product->save();

            if ($request->hasFile('images')) {
                ProductImage::where('product_id', $id)->delete();
                foreach ($request->file('images') as $image) {
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('assets/images/products'), $fileName);
        
                    // Tạo mới một bản ghi trong bảng product_image
                    $productImage = new ProductImage;
                    $productImage->product_id = $product->id; // ID của sản phẩm mới được tạo
                    $productImage->url = $fileName;
                    $productImage->save();
                }
            }

            ProductSize::where('product_id', $id)->delete();
            ProductColor::where('product_id', $id)->delete();
            foreach ($request->sizes as $size) {
                $sizeNew = new ProductSize;
                $sizeNew->product_id = $product->id; 
                $sizeNew->size_id = $size;
                $sizeNew->save();
            }
            
            foreach ($request->colors as $color) {
                $colorNew = new ProductColor;
                $colorNew->product_id = $product->id; 
                $colorNew->color_id = $color;
                $colorNew->save();
            }
            DB::commit();
            return redirect('admin/product/list')->with('success', "Cập nhật sản phẩm thành công!");
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Cập nhật thất bại, vui lòng thử lại.');
        }
    }
    public function delete($id, Request $request) {
        $category = ProductModel::find($id);       
        $category->delete();
        
        return redirect()->back()->with('success', "Xóa sản phẩm thành công!");
    }
}
