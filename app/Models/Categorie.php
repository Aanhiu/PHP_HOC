<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;



    // chỉ định bảng chuẩn để truy vấn bảng đó không bị nhầm lẫn
    protected $table = 'Categories';
    
    // chi dinh cac truong lay du lieu cua bang do
    protected $fillable = ['name', 'description'];

    // 
   
   

}
