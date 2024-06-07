@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Quản lý Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>{{ __('Welcome to Admin') }}</h5>

                    <!-- Additional Sections -->

                    <!-- User Statistics -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">{{ __('Người dùng') }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Tổng số người dùng: 1234') }}</h5>
                                    <p class="card-text">{{ __('Người dùng mới hôm nay: 20') }}</p>
                                    <p class="card-text">{{ __('Đang trực tuyến: 15') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header">{{ __('Video') }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Tổng số video: 5678') }}</h5>
                                    <p class="card-text">{{ __('Video mới hôm nay: 10') }}</p>
                                    <p class="card-text">{{ __('Video được xem nhiều nhất: ABC') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-header">{{ __('Lượt xem') }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Tổng số lượt xem: 91011') }}</h5>
                                    <p class="card-text">{{ __('Lượt xem hôm nay: 150') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">{{ __('Biểu đồ và Đồ thị') }}</div>
                                <div class="card-body">
                                    <canvas id="myChart" width="400" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Videos -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">{{ __('Danh sách video mới') }}</div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Tên Video') }}</th>
                                                <th>{{ __('Người upload') }}</th>
                                                <th>{{ __('Thời gian upload') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ __('Video 1') }}</td>
                                                <td>{{ __('User A') }}</td>
                                                <td>{{ __('01/06/2024') }}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>{{ __('Video 2') }}</td>
                                                <td>{{ __('User B') }}</td>
                                                <td>{{ __('01/06/2024') }}</td>
                                            </tr>
                                            <!-- Thêm các video khác -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Management Form -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">{{ __('Quản lý người dùng') }}</div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="userName">{{ __('Tên người dùng') }}</label>
                                                <input type="text" class="form-control" id="userName" placeholder="Tên người dùng">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="userEmail">{{ __('Email') }}</label>
                                                <input type="email" class="form-control" id="userEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="userRole">{{ __('Vai trò') }}</label>
                                                <select id="userRole" class="form-control">
                                                    <option selected>{{ __('Chọn...') }}</option>
                                                    <option>{{ __('Quản trị viên') }}</option>
                                                    <option>{{ __('Người dùng') }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="userStatus">{{ __('Trạng thái') }}</label>
                                                <select id="userStatus" class="form-control">
                                                    <option selected>{{ __('Chọn...') }}</option>
                                                    <option>{{ __('Hoạt động') }}</option>
                                                    <option>{{ __('Vô hiệu hóa') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('Cập nhật người dùng') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video Management Form -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">{{ __('Quản lý video') }}</div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="videoTitle">{{ __('Tiêu đề video') }}</label>
                                                <input type="text" class="form-control" id="videoTitle" placeholder="Tiêu đề video">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="videoUploader">{{ __('Người upload') }}</label>
                                                <input type="text" class="form-control" id="videoUploader" placeholder="Người upload">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="videoDescription">{{ __('Mô tả video') }}</label>
                                                <textarea class="form-control" id="videoDescription" rows="3" placeholder="Mô tả video"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">{{ __('Cập nhật video') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Lượt xem',
                data: [10, 20, 30, 40, 50, 60, 70],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection
