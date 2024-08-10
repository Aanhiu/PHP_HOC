@extends('layouts.app')
@section('content')
    <h1>Thêm mới Danh mục</h1>

    <form action="{{route('storeCategories')}}" method="POST">
        @csrf
      
        <label for="">Tên</label>
        
        <input type="text" class="form-control" placeholder="Tên" name="name" required>

        <label for="">Mô tả</label>
        <input type="text" class="form-control" placeholder="Mô tả" name="description" required>

        <div class="pt-3 d-flex">
            <button class="btn btn-danger mx-3"> <a href="{{ route('listCategories') }}" class="nav-link">Black</a></button>
            <input type="submit" value="Thêm mới" class="btn btn-success">
        </div>
    </form>
@endsection
