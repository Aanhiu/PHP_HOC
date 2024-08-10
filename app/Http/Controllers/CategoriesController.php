<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    // viet ham xuat all list danh muc ra
    public function list(){
        // viet truy van xuat all list danh muc
        $getlistCategories =  DB::table('Categories')->select('id','name' , 'description')->get();
        return view('Categories.list' , compact('getlistCategories'));
    }

    // viết hàm luu du lieu vao csdl
    public function store(Request $request){
        // luu du lieu vao csdl
        $name = $request->name;
        $description = $request->description;
        DB::table('Categories')->insert([
            'name'=>$name, 
            'description'=>$description,
        ]);

        // thêm xong đưa về trang list
       return redirect('listCategories');

    }

    // hàm xóa theo id 
    public function delete($id){
        DB::table('Categories')->where('id' , $id)->delete();
        return redirect('listCategories');
    }

    // hàm chuyển hướng cập nhật theo id và đổ dữ liệu theo id đó ra
    public function edit($id){
        // đổ dữ liệu theo id
        $categori_id = DB::table('Categories')->where('id' , $id)->first();
        //dd($categori_id);
        return view('Categories.edit' , compact('categori_id'));
    }

    // ham cập nhật theo id khi đã thay đổi dữ liệu và ấn nút cập nhật
    public function update(Request $request){
        // lấy các name gía trị 
        $name = $request->name;
        $description = $request->description;
        // cập nhật mới dữ liệu
        DB::table('Categories')->where('id' , $request['id'])->update([
            // những dữ liệu cập nhật mới
            'name'=> $name,
            'description'=>$description
        ]);

        // chuyển về view
        return redirect('listCategories');
    }

   
    


}
