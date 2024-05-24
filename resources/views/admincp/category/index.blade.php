@extends('layouts.app')

@section('content')
<table class="table" id = "tablephim">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Slug</th>
        <th scope="col">Active/Inactive</th>
        <th scope="col">Mange</th>
      </tr>
    </thead>
    <tbody id ="sortable">
        
        @foreach ($list as $key => $cate)      
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$cate->title}}</td>
                <td>{{$cate->description}}</td>
                <td>{{$cate->slug}}</td>
                <td>
                    @if($cate->status)
                        Hiển thị
                    @else
                        Không hiển thị
                    @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $cate->id], 'onsubmit' => 'return confirm("Bạn chắc chắn muốn xóa?")']) !!}
                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    <a href="{{route('category.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection