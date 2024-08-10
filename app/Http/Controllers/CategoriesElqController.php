<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesElqController extends Controller
{
    
    // viet ham cac ham truy van Eloquent 

    // lay all cac Categorie
    public function getCateAll(){
        $Categorie = new Categorie();
        $Categorie = Categorie::all();
        
        return view('Categories_Elq.list', compact('Categorie'));
    }

    // hàm chuyen huong về 
    public function black(){
        return redirect()->route('listCategories_Elq');
        }

    // ham them moi Categories
    public function storeElq(Request $request){

        // validatation lam sau
        
        $Categorie = new Categorie();
        $Categorie->name = $request->name;
        $Categorie->description = $request->description;

        $Categorie->save();
        return redirect()->route('listCategories_Elq');
    }

    // xoa theo ban ghi theo id
    public function deleteElq($id){
        $Categorie = new Categorie();
        $Categorie = Categorie::where('id',$id)->first();
        $Categorie->delete();
        return redirect()->route('listCategories_Elq');
    }

    // ham chinh sua theo id 
    public function editElq($id){
        // đổ dữ liệụ theo id
        $Categorie = new Categorie();
        $Categorie = Categorie::where('id' , $id)->first();
        return view('Categories_Elq.edit' , compact('Categorie'));
    }

    // hàm cập nhật dữ liệu mới theo id danh muc đo
    public function updateElq(Request $request){
        $Categorie = new Categorie();
        // viết điều kiện update
        $name = $request->name;
        $description = $request->description;
        // truy cấn cập nhật
        $Categorie = Categorie::where('id' , $request->id)->update([
            'name'=> $name,
            'description'=>$description
        ]);
       
        // chuyển hướng khi sửa dữ liệu và ấn nút câp nhật
        return redirect()->route('listCategories_Elq');
    
    }
}
