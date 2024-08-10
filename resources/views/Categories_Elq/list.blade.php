@extends('layouts.app')
@section('content')
    <h4>Danh mục với Eloquent</h4>
    <a href="{{route('addCategories_Elq')}}"><button class="btn btn-warning">Them moi</button></a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Hành đông</th>
            </tr>
        </thead>
    
        @foreach ($Categorie as $Cate)
        <tbody>
            <tr>
                <td>{{$Cate->id}}</td>
                <td>{{$Cate->name}}</td>
                <td>{{$Cate->description}}</td>
                <td>
                    <a href="{{route('editCategories_Elq' , $Cate->id)}}"><button class="btn btn-success">Edit</button></a>

                    <form action="{{route('delete', $Cate->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Bạn muốn xóa chú !!!')">Delete</button>
                    </form>
                   
                </td>
            </tr>
        </tbody>
        @endforeach
        
    </table>
@endsection