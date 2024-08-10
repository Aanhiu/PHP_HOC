@extends('layouts.app')
@section('content')
    <h1>Thêm mới danh mục Eloquent</h1>
    <form action="{{route('storeCategories_Elq')}}" method="POST">
        @csrf
        <label for="">Tên</label>
        <input type="text" name="name" placeholder="Nhập tên" class="form-control" required>

        <label for="">description</label>
        <input type="text" name="description" placeholder="Nhập description" class="form-control" required>

        <div class="pt-3">
           
            <input type="submit" value="Thêm mới" class="btn btn-success">
        </div>
    </form>
    <button class="btn btn-danger mx-3"> <a href="{{ route('black') }}" class="nav-link">Black</a></button>
@endsection
