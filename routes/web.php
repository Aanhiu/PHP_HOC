<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Models\Categorie;
use App\Http\Controllers\CategoriesElqController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
})->name('home');

// xuất all list get
Route::get('listCategories' , [CategoriesController::class , 'list'])->name('listCategories');


Route::get('/addCategories' , function(){
    return view('Categories.add');
})->name('addCategories');

// them du lieu luu du lieu post
Route::post('/storeCategories', [CategoriesController::class, 'store'])->name('storeCategories');

// xóa theo id  delete
Route::delete('/deleteCategories/{id}' , [CategoriesController::class ,'delete'])->name('deleteCategories');

// chuyến hướng đến trang cập nhật theo id get
Route::get('/editCategories/{id}' , [CategoriesController::class , 'edit'])->name('editCategories');

// cập nhật dữ liệu mới theo id put
Route::put('/editCategories/{id}' , [CategoriesController::class , 'update'])->name('updateCategories');





// ----------------------------------------------------------------
// // điều hướng code Eloquent
// Route::get('/listCategories_Elq' , function(){
//     return view('Categories_Elq.list');
// })->name('listCategories_Elq');

Route::get('/listCategories_Elq' , [CategoriesElqController::class,'getCateAll'])->name('listCategories_Elq');

// chuyến đến from têm mới 
Route::get('addCategories_Elq' , function(){
    return view('Categories_Elq.add');
})->name('addCategories_Elq');

// điều hướng quay lại
Route::get('/black' , [CategoriesElqController::class , 'black'])->name('black');

// thêm mới lưu dữ liệu với Eloquent
Route::post('/storeCategories_Elq' , [CategoriesElqController::class,'storeElq'])->name('storeCategories_Elq');

// xóa bản ghi theo dữ liệu
Route::delete('/delete/{id}' , [CategoriesElqController::class , 'deleteElq'])->name('delete');

// điều hướng đến trang edit và đổ dữa liệu theo id ra
Route::get('/editCategories_Elq/{id}' , [CategoriesElqController::class , 'editElq'])->name('editCategories_Elq');

// cập nhật dữ liệu mới theo id 
Route::put('/editCategories_Elq/{id}' , [CategoriesElqController::class , 'updateElq'])->name('updateCategories_Elq');


// ----------------------------------------------------------------
// Điều hướng  Products
Route::get('/products' , function(){
    return view('Products.list');
})->name('products');

// xuat all san pham ra list 
Route::get('/listProducts' , [ProductsController::class, 'getProducts'])->name('listProducts');

// chuyến đến from thêm và đổ dữ liệu danh mục ra để chọn
Route::get('/addProducts' , [ProductsController::class , 'getCategoryName'])->name('addProducts');

// store thêm mới sản phẩm
Route::put('/addProducts', [ProductsController::class , 'storeProduct'])->name('storeProduct');

// xoa product theo id
Route::delete('/deleteProduct/{id}' , [ProductsController::class , 'deleteProduct'])->name('deleteProduct');

// đến trang edit product
Route::get('/editProduct/{id}', [ProductsController::class ,'editProduct'])->name('editProduct'); 

// cập nhật product khi đã chỉnh sửa thông tin
Route::put('/editProduct/{id}' , [ProductsController::class, 'updateProduct'])->name('updateProduct');






// ----------------------------------------------------------------
// viết equamet truy vấn thô hơi ngu

// vi du tren du lieu thô với csdl
// Route::get('/insert' , function(){
//     DB::insert('insert into Categories(name , description) value(?,?)', ['anh' , 'anh day']);
// });

// vi dụ ve cap nhat du lieu thô csdl
// Route::get('/update' , function(){
//     $update = DB::update('update Categories set name = "Đây là đẫ update" where id = ?' , [7]);
//     return $update;
// });

// vi dụ xóa dự liệu thô truy vấn sql csdl
// Route::get('delete' , function(){
//     $delete = DB::delete('delete from Categories where id = ?' ,[7]);  // id 7 đã xóa đi rồi
//     return $delete;
// });


// xuất all dữ liệu product vói eloquent
Route::get('/danhmuc' , function(){
    $categorie = Categorie::all();
    dd($categorie);
    var_dump($categorie);

});

//






