@extends('layouts.app')
@section('content')
    <h1>Cập Nhật danh mục Eloquent</h1>
    <form action="{{route('editCategories_Elq' ,$Categorie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" hidden value="{{$Categorie->id}}">
        <label for="">Tên</label>
        <input type="text" name="name" placeholder="Nhập tên" class="form-control" required value="{{$Categorie->name}}"   >

        <label for="">description</label>
        <input type="text" name="description" placeholder="Nhập description" class="form-control" required value="{{$Categorie->description}}">

        <div class="pt-3">
           
            <input type="submit" value="Cập nhật" class="btn btn-success">
        </div>
    </form>
    <button class="btn btn-danger mx-3"> <a href="{{ route('black') }}" class="nav-link">Black</a></button>
@endsection
