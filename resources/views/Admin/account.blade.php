@extends('Admin.layouts.admin')

@section('title', 'Trang Chủ')
@section('content')

<body class="no-skin">
    <!-- Header -->
    @include('Admin.includes.header')
    <!-- End Header -->

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) { }
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
                <div class="container">
                    <div class=row>
                        <canvas id="accountsLineChart"></canvas>
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
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-white btn-warning btn-bold" data-toggle="modal"
                                    data-target="#myModal">
                                    Thêm người dùng
                                </button>
                            </div>
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
                                        <td>{{ $user->role->name }}</td>
                                        <td>
                                            <a href="{{route('admin.profile', ['id' => $user->id])}}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil"></i> Sửa
                                            </a>
                                            <form action="{{ route('account.delete', $user->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
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
    @include('Admin.includes.footer')
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form action="{{ route('account.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm người dùng</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Nhập tên người dùng -->
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nhập
                                            tên</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1" placeholder="Tên người dùng"
                                                class="form-control" name="name" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nhập email -->
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Nhập
                                            email</label>
                                        <div class="col-sm-9">
                                            <input type="email" id="form-field-2" placeholder="Email người dùng"
                                                class="form-control" name="email" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nhập mật khẩu -->
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">Nhập
                                            mật khẩu</label>
                                        <div class="col-sm-9">
                                            <input type="password" id="form-field-3" placeholder="Mật khẩu"
                                                class="form-control" name="password" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Xác nhận mật khẩu -->
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Xác
                                            nhận mật khẩu</label>
                                        <div class="col-sm-9">
                                            <input type="password" id="form-field-4" placeholder="Xác nhận mật khẩu"
                                                class="form-control" name="password_confirmation" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Trường Role -->
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Chọn
                                            vai trò</label>
                                        <div class="col-sm-9">
                                            <select id="form-field-6" class="form-control" name="role_id" required>
                                                <option value="2">Quản trị </option>
                                                <option value="1">Người dùng</option>
                                                <!-- Thêm các vai trò khác nếu cần -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Thêm avatar (tùy chọn) -->
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-5">Ảnh
                                            đại diện</label>
                                        <div class="col-sm-9">
                                            <input type="file" id="form-field-5" class="form-control"
                                                name="profile_picture" accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Thêm người dùng
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Dữ liệu giả lập
        const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const data = {
        !!json_encode($data)!!
    }; // Số tài khoản theo thời gian

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