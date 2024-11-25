<!-- resources/views/send_sms.blade.php -->
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

        <!-- Begin Content -->
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="{{ route('admin.dashboard') }}">Trang chủ</a>
                        </li>
                        <li>
                            <a class="">Quản lý tài khoản</a>
                        </li>
                        <li>
                            <a class="active">Liên hệ người dùng</a>
                        </li>
                    </ul><!-- /.breadcrumb -->
                </div>

                 <div class="container mt-5">
          <a href="{{ route('admin.account', ['pageid' => 1]) }}">
            <ul class="breadcrumb" >
                    <i class="menu-icon fa fa-arrow-left"></i>
                    <li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
                </ul><!-- /.breadcrumb -->
            </a>
        <h2>Send SMS</h2>

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

        <form method="POST" action="{{ route('send.sms') }}">
            @csrf
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$phone}}" placeholder="Enter phone number" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send SMS</button>
        </form>
    </div>
                    </div>
                </div>
            </div>
        </div><!-- /.main-content -->
        <!-- End Content -->

        <!-- Begin footer -->
        @include('Admin.includes.footer')
        <!-- end footer -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- Modal thêm tên đề thi -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form action="{{ route('insert.readingexercise') }}" method="POST">
                @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm đề bài tập đọc</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nhập
                                            tên</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1-1" placeholder="Tên đề thi"
                                                class="form-control" name="readname" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Chọn
                                            ảnh</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="readexerciseimage"
                                                name="readexerciseimage" accept="image/*">
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
                            Thêm tên bài tập đọc
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection
