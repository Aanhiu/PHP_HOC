@extends('layouts.app')

@section('content')
    <h1>Thêm mới Sản phầm</h1>
     <!-- Hiển thị tất cả các lỗi ở đầu form -->
     @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif
    <form action="{{route('storeProduct')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p> //id name image price description status Category_id </p>

        <label for="">Name</label>
        <input type="text" placeholder="Tên" class="form-control" name="name">

        <label for="">Image</label>
        <input type="file" class="form-control" name="image">

        <label for="">Price</label>
        <input type="number" class="form-control" name="price">

        <label for="">Description</label>
        <input type="text" placeholder="Tên" class="form-control" name="description">

        <label for="">Categories</label>
        <select name="Category_id" class="form-control">
            <option value="">
                Chọn danh mục sản phẩm
                @foreach ($getCateroryName as $cateName)
                    <option value="{{$cateName->id}}">{{$cateName->Categories_name}}</option>
                @endforeach
            </option>
        </select>

        <input type="submit" value="Thêm mới" class="btn btn-success m-3">

    </form>
@endsection