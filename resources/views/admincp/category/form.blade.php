@extends('layouts.app')

@section('content')
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
    html>body #sortable li { height: 1.5em; line-height: 1.2em; }
    .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quản lý danh mục') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($category))
                        {!! Form::open(['route' =>'category.store','method'=>'POST']) !!}
                    @else
                    {!! Form::open(['route' =>['category.update', $category->id],'method'=>'PUT']) !!}
                    @endif
                    
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($category)? $category->title : '', ['class'=> 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($category)? $category->slug : '', ['class'=> 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'convert_slug' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($category)? $category->description : '', ['style'=>'resize:none','class'=> 'form-control', 'placeholder' => 'Nhập vào dữ liệu', 'id' => 'description' ]) !!}                           
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Active', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị', '0'=> 'Không'], isset($category)? $category->status : '', ['class'=> 'form-control']) !!}                        
                        </div>
                    @if(isset($category))
                        {!! Form::submit('Cập nhật dữ liệu', ['class'=>'btn btn-success']) !!}                       
                    @else
                        {!! Form::submit('Thêm dữ liệu', ['class'=>'btn btn-success']) !!}  
                    @endif
                    {!! Form::close() !!} 
                    
                </div>
            </div>
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
        </div>
    </div>
</div>
@endsection
