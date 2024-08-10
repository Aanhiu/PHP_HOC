@extends('layouts.app')

@section('content')
    <h1>Chỉnh sửa Sản phầm</h1>
    
    <form action="{{route('updateProduct' , $getProID->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p> //id name image price description status Category_id </p>

        <input type="text" hidden value="{{$getProID->id}}">
        <label for="">Name</label>
        <input type="text" placeholder="Tên" class="form-control" name="name" value="{{$getProID->name}}"   >

    <div>
        <label for="">Image</label>
        <input type="file" class="form-control" name="image" value="{{ $getProID->image ? basename($getProID->image) : 'No image selected' }}" >
        @if ($getProID->image)
        <img src="{{ asset('storage/' . $getProID->image) }}" alt="{{ $getProID->name }}" width="100">
    @endif
    </div>

        <label for="">Price</label>
        <input type="number" class="form-control" name="price" value="{{$getProID->price}}">

        <label for="">Description</label>
        <input type="text" placeholder="Tên" class="form-control" name="description" value="{{$getProID->description}}">

        <label for="">Categories</label>
        <select name="Category_id" class="form-control">
            <option value="{{$getProID->Category_id}}">
                {{$getProID->Category_name}}
                @foreach ($getCateroryName as $cateName)
                <option value="{{$cateName->id}}">{{$cateName->Categories_name}}</option>
            @endforeach
            
            </option>
        </select>

        <input type="submit" value="Thêm mới" class="btn btn-success m-3">

    </form>
@endsection