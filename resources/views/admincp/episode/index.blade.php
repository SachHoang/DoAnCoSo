@extends('layouts.app')

@section('content')
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
    html>body #sortable li { height: 1.5em; line-height: 1.2em; }
    .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
    .diff iframe {
        width: 100%;
        height: 15%;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Phim</th>
                    <th scope="col">Hình ảnh Phim</th>
                    <th scope="col">Link Phim</th>
                    <!-- <th scope="col">Trạng Thái</th> -->
                    <th scope="col">Mange</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($list_episode as $key => $episode)    
                
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$episode->movie->title}}</td>
                            <td><img width="30%" src="{{asset('uploads/movie/'.$episode->movie->image)}}"></td>
                            <td>{{$episode->episode}}</td>
                            <td class="diff">{!!$episode->linkphim!!}</td>
                           
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['episode.destroy', $episode->id], 'onsubmit' => 'return confirm("Bạn chắc chắn muốn xóa?")']) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('episode.edit', $episode->id)}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
            
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
