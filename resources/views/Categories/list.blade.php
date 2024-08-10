@extends('layouts.app')
@section('content')
    <h1>Danh sách Categories</h1>
    <a href="{{ route('addCategories') }}" class="link"> <button class="btn btn-success">Thêm</button></a>
    <table class="table">
        
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name (tên)</th>
                <th scope="col">Description (mô tả)</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        
        @foreach ($getlistCategories as $c)
            <tbody>
                <tr>
                    <td scope="row">{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td style="width: 600px">{{ $c->description }}</td>
                    <td>
                        <a href="{{route('editCategories', $c->id)}}"><button class="btn btn-success">Edit</button></a>
                        
                        
                        <form action="{{route('deleteCategories' , $c->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Bạn muốn xóa chứ !!!!')">Delete</button>
                        </form>
                    </td>

                </tr>

            </tbody>
        @endforeach

    </table>
@endsection
