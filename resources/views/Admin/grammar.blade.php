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
                            <a href="#">Quản lý phần hướng dẫn ngữ pháp</a>
                        </li>
                        <li class="active">Thêm danh sách bài hướng dẫn ngữ pháp</li>
                    </ul><!-- /.breadcrumb -->
                </div>

                <div class="page-content">
                    @if(session('msglistgrammarguidelinemanage'))
                        <h4 class="pink">
                            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                            <a class="green" data-toggle="modal">{{ session('msglistgrammarguidelinemanage') }}</a>
                        </h4>
                        <div class="hr hr-18 dotted hr-double"></div>
                    @endif
                    @if(session('msggrammarguidelinecontent'))
                        <h4 class="pink">
                            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                            <a class="green" data-toggle="modal">{{ session('msggrammarguidelinecontent') }}</a>
                        </h4>
                        <div class="hr hr-18 dotted hr-double"></div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="simple-table" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">ID</th>
                                                <th class="center">Tên bài hd ngữ pháp</th>
                                                <th class="center">Tên hình</th>
                                                <th class="center">Xóa</th>
                                                <th class="center">Thêm nội dung</th>
                                                <th class="center">Checked nội dung</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listgrammarguidelinemanage as $list)
                                                <tr>
                                                    <td class="center">{{ $list->grammarguidelineid }}</td>
                                                    <td class="center">{{ $list->grammarname }}</td>
                                                    <td class="center">{{ $list->grammarimage }}</td>
                                                    <td class="center">
                                                        <form
                                                            action="{{ route('delete.grammarguideline', ['grammarguidelineid' => $list->grammarguidelineid]) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài HD ngữ pháp này?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="ace-icon fa fa-trash bigger-130"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="center">
                                                        <a class="green"
                                                            href="{{ route('edit.grammarguidelinecontent', ['id' => $list->grammarguidelineid]) }}">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <ul class="list-unstyled">
                                                            @if($list->content)
                                                                <li><i class="ace-icon fa fa-check-square-o"></i></li>
                                                            @else
                                                                <li><i class="ace-icon fa fa-square-o"></i></li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <div>
                                        <ul class="pagination">
                                            @if($pageid == 1)
                                                <li class="active"><a href="#">Prev</a></li>
                                                <li><a
                                                        href="{{ route('admin.grammar', ['pageid' => $pageid + 1]) }}">Next</a>
                                                </li>
                                            @elseif($pageid == $maxPageId)
                                                <li><a
                                                        href="{{ route('admin.grammar', ['pageid' => $pageid - 1]) }}">Prev</a>
                                                </li>
                                                <li class="active"><a href="#">Next</a></li>
                                            @else
                                                <li><a
                                                        href="{{ route('admin.grammar', ['pageid' => $pageid - 1]) }}">Prev</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('admin.grammar', ['pageid' => $pageid + 1]) }}">Next</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-white btn-warning btn-bold" data-toggle="modal"
                                        data-target="#myModal">
                                        Thêm đề bài hướng dẫn học ngữ pháp
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.main-content -->
        <!-- End Content -->

        <!-- Begin footer -->
        @include('Admin.includes.footer')
        <!-- End footer -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form action="{{ route('insert.grammarguideline') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm bài hướng dẫn ngữ pháp</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nhập
                                            tên</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1-1"
                                                placeholder="Tên bài hướng dẫn ngữ pháp" class="form-control"
                                                name="grammarname" />
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
                                            <input type="file" class="form-control" id="grammarimage"
                                                name="grammarimage" accept="image/*">
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
                            Thêm tên bài hướng dẫn
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection