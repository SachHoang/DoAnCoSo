@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm phim</a>
            <div class="table-container" style="overflow-x: auto;">
                <table class="table" id = "tablephim">
                
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Tập phim</th>
                        <th scope="col">Số Tập</th>
                        <th scope="col">Thời lượng phim</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Phim hot</th>
                        <th scope="col">Định dạng</th>
                        <th scope="col">Phụ đề</th>
                        <!-- <th scope="col">Mô tả</th> -->                                      
                        <th scope="col">Danh mục</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Thuộc thể loại phim</th>
                        <th scope="col">Quốc gia</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col">Năm phim</th>
                        <th scope="col">Season</th>
                        <th scope="col">Top View</th>
                        <th scope="col">Đường dẫn</th>
                        <!-- <th scope="col">Tags</th> -->
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                    </thead>
                    <tbody id ="sortable">
                        @foreach ($list as $key => $cate)      
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$cate->title}}</td>
                                <td><a href="{{route('add-episode', [$cate->id])}}" class="btn btn-success btn-sm">Thêm tập phim</a></td>
                                <td>{{$cate->episode_count}}/{{$cate->sotap}}</td>
                                <td>{{$cate->thoiluong}}</td>
                                <td><img width="50%" src="{{asset('uploads/movie/'.$cate->image)}}"></td>
                                <td>
                                    @if($cate->phim_hot == 0)
                                        Không
                                    @else
                                        Có
                                    @endif
                                </td>
                                <td>
                                    @if($cate->resolution == 0)
                                        HD
                                    @elseif($cate->resolution == 1)
                                        SD
                                    @elseif($cate->resolution == 2)
                                        HDCam
                                    @elseif($cate->resolution == 3)
                                        Cam
                                    @elseif($cate->resolution == 4)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif
                                </td>
                                <td>
                                    @if($cate->phude == 0)
                                        Vietsub
                                    @else
                                        Thuyết Minh
                                    @endif
                                </td>
                                <!-- <td>{{$cate->description}}</td> -->                                                      
                                <td>{{$cate->category->title}}</td>
                                <td>
                                    @if($cate->thuocphim=='phimle')
                                        Phim lẻ
                                    @else
                                        Phim bộ
                                    @endif
                                </td>
                                <td>
                                @foreach($cate->movie_genre as $gen)
                                    <span class="badge text-bg-dark">{{$gen->title}}</span>
                                @endforeach
                                </td>
                            
                                
                                <td>{{$cate->country->title}}</td>
                                <td>{{$cate->ngaytao}}</td>
                                <td>{{$cate->ngaycapnhat}}</td>
                                <td>
                                    
                                    {!! Form::selectYear('year', 2000, 2024, isset($cate->year) ? $cate->year : '', ['class' => 'select-year', 'id' => $cate->id,'placeholder' => '--Năm phim--']) !!}
                                    </form>
                                </td>
                                <td>
                                    {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '', ['class' => 'select-season', 'id' => $cate->id]) !!}
                                    </form>
                                </td>
                                <td>
                                    {!! Form::select('topview', ['0'=>'Ngày', '1'=> 'Tuần', '2'=>'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class'=> 
                                    'select-topview', 'id' => $cate->id, 'placeholder' => '--Views--']) !!}                        

                                </td>
                                <td>{{$cate->slug}}</td>
                                <!-- <td>{{$cate->tags}}</td> -->
                                <td>
                                    @if($cate->status)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                            
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $cate->id], 'onsubmit' => 'return confirm("Bạn chắc chắn muốn xóa?")']) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{route('movie.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


