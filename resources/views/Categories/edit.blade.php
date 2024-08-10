@extends('layouts.app')
@section('content')
    <h1>Cập nhật Danh mục</h1>

    <form action="{{route('updateCategories', $categori_id->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" hidden name="id" value="{{$categori_id->id}}">
        <label for="">Tên</label>
        
        <input type="text" class="form-control" placeholder="Tên" name="name"  value="{{$categori_id->name}}" required>

        <label for="">Mô tả</label>
        <input type="text" class="form-control" placeholder="Mô tả" name="description"  value="{{$categori_id->description}}" required>

        <div class="pt-3 d-flex">
            <button class="btn btn-danger mx-3"> <a href="{{ route('listCategories') }}" class="nav-link">Black</a></button>
            <input type="submit" value="Cập Nhật" class="btn btn-success">
        </div>
    </form>
@endsection
