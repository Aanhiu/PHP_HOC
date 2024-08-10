@extends('layouts.app')
@section('content')
    <h1>Danh sách Sản phầm</h1>
    <a href="{{route('addProducts')}}"><button class="btn btn-warning">Thêm mơi</button></a>
   <table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Description</th>
            <th>Status</th>
            <th>Category_id (Loại)</th>
            <th>Hành Động</th>
        </tr>

        @foreach ($getProducts as $pro)
        <tbody>
            <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
             
                <td> <img src="{{ asset('storage/'. $pro->image) }}" alt="Product Image" style="width: 100px">
                </td>
                <td>{{$pro->price}}</td>
                <td>{{$pro->description}}</td>
                <td>@if ($pro->status == 0)
                   <p> Có thể thuê</p>
                @endif</td>
                <td>{{$pro->Category_name}}</td>
                
                <td>
                    <a href="{{route('editProduct' , $pro->id)}}"><button class="btn btn-success">Edit</button></a>
                    <form action="{{route('deleteProduct' , $pro->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                       <button class="btn btn-danger" onclick="return confirm('Bạn muốn xóa sản phầm này chứ !!!')">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        
    </thead>
   </table>
@endsection