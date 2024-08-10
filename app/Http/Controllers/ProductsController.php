<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    // viết ham truy van
    //id name image price description status Category_id
    public function getProducts(){
        $getProducts = DB::table('Products')->join('Categories', 'Products.Category_id' , '=' ,'Categories.id')->select('Products.*' , 'Categories.name as Category_name')->get();
        //var_dump($getProducts);
        return view('Products.list' , compact('getProducts'));
    }

    // hàm lấy các đổ dữ liệu của categories ra
    public function getCategoryName(){
        $getCateroryName = DB::table('Categories')->select('Categories.*','Categories.name as Categories_name')->get();
        //dd($getCateroryName);
        return view('Products.add' , compact('getCateroryName'));
    }

    // hàm thêm mới sản phẩm
    public function storeProduct(Request $request){
        // su li sau
    
        // vilidate 
        $request->validate([
            'name'=> 'required|string|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'price'=>'required|numeric', 
            'description'=>'required|string',
            'Category_id'=>'required|integer',
        ]);

        // xử lí việc upload
        $imagePath = null;
        if($request->hasFile('image')){
            //php artisan storage:link  // tạo ổ lưu trữ image : public/storage/images
            $imagePath = $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName(), 'public');
        }

        // insert thêm mới dữ liệu vào
        // lấy dữ liệu các biết từ form add thêm mới product
        DB::table('Products')->insert([
            // lấy các name ở form 
            'name'=>$request->name,
            'image'=>$imagePath ,
            'price'=>$request->price,
            'description'=>$request->description,
            'Category_id'=>$request->Category_id,
        ]);      

        // the xong chuye huong ve list
        return redirect('listProducts');
    }

    // xoa product theo id
    public function deleteProduct($id){
        DB::table('Products')->where('id' , $id)->delete();
        return redirect('listProducts');
    }

    // edit theo id products 
    public function editProduct($id){
        // code đổ dữ liệu theo id product để edit
        $getCateroryName = DB::table('Categories')->select('Categories.*','Categories.name as Categories_name')->get();
       
       $getProID =  DB::table('Products')->join('Categories', 'Products.Category_id' , '=' , 'Categories.id')->select('Products.*' ,'Categories.name as Category_name')->where('Products.id' , $id)->first();
       //dd($getProID);
        
       return view('Products.edit', compact('getProID' , 'getCateroryName'));
    }

    // hàm cập nhật dữ liệu mới khi chỉnh sửa dữ liệu mới thành công 
    public function updateProduct(Request $request){
        // vilidate 
        $request->validate([
            'name'=> 'required|string|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'price'=>'required|numeric', 
            'description'=>'required|string',
            'Category_id'=>'required|integer',
        ]);

        // xử lí việc upload
        $imagePath = null;
        if($request->hasFile('image')){
            //php artisan storage:link  // tạo ổ lưu trữ image : public/storage/images
            $imagePath = $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName(), 'public');
        }

        // insert thêm mới dữ liệu vào
        // lấy dữ liệu các biết từ form add thêm mới product
        DB::table('Products')->where('id' , $request['id'])->update([
            // lấy các name ở form 
            'name'=>$request->name,
            'image'=>$imagePath ,
            'price'=>$request->price,
            'description'=>$request->description,
            'Category_id'=>$request->Category_id,
        ]);  
        
        return redirect('listProducts');

    }


}


