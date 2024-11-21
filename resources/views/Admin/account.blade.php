@extends('Admin.layouts.admin')

@section('title', 'Trang Chủ')
@section('content')
<body class="no-skin">
    <!-- Header -->
    @include('Admin.includes.header')
    <!-- End Header -->

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try { ace.settings.loadState('main-container') } catch (e) {}
        </script>

        <!-- Begin menu -->
        @include('Admin.includes.menu')
        <!-- End menu -->

    <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="{{ route('admin.dashboard') }}">Trang chủ</a>
                        </li>
                    </ul>
                    <!-- /.breadcrumb -->
                </div>
                <div class= "container">
                <div class= row>
                    <canvas id="accountsLineChart" ></canvas>
                </div>
                    <div class="col-md-12">
                        <h2 class="my-4">Quản Lý Người Dùng</h2>

                        <!-- Hiển thị thông báo -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Nút Thêm Người Dùng -->
                        <div class="mb-3 text-end">
                            <a href="" class="btn btn-success">
                                <i class="fa fa-plus"></i> Thêm Người Dùng
                            </a>
                        </div>

                        <!-- Bảng danh sách người dùng -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên Người Dùng</th>
                                    <th>Email</th>
                                    <th>Vai Trò</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil"></i> Sửa
                                            </a>
                                            <form action="" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Không có người dùng nào.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Phân trang -->
                        <div class="mt-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Dữ liệu giả lập
    const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"]; // Các tháng
    const data ={!! json_encode($data) !!};// Số tài khoản theo thời gian

    const ctx = document.getElementById('accountsLineChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'line', // Loại biểu đồ
        data: {
            labels: labels, // Gán nhãn cho trục X
            datasets: [{
                label: 'Số tài khoản',
                data: data, // Dữ liệu
                borderColor: 'rgba(75, 192, 192, 1)', // Màu đường biểu đồ
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Màu nền (dưới đường)
                tension: 0.4, // Độ cong của đường
                fill: true // Đổ màu phía dưới
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Thời gian (Tháng)'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Số tài khoản'
                    },
                    beginAtZero: true // Bắt đầu trục Y từ 0
                }
            }
        }
    });
</script>

@endsection
