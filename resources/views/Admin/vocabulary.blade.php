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
                            <a href="{{ route('admin.dashboard') }}">{{ __('label.home') }}</a>
                        </li>

                        <li>
                            <a class="active">{{ __('label.manage_vocabulary_guides') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="page-content">

                    @if(session('msgdstuvung'))
                        <h4 class="pink">
                            <a class="green" data-toggle="modal">{{ session('msgdstuvung') }}</a>
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
                                                <th class="center">{{ __('label.vocabulary_topic_name') }}</th>
                                                <th class="center">{{ __('label.vocabulary_topic_image') }}</th>
                                                <th class="center">{{ __('label.delete_vocabulary_guide') }}</th>
                                                <th class="center">{{ __('label.add_vocabulary_topic_content') }}</th>
                                                <th class="center">{{ __('label.checked_vocabulary_topic_content') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($danhsachtuvung as $list)
                                                                                        <tr>
                                                                                            <td class="center">{{ $list->vocabularyguidelineid }}</td>
                                                                                            <td class="center">{{ $list->vocabularyname }}</td>
                                                                                            <td class="center">{{ $list->vocabularyimage }}</td>

                                                                                            <td class="center">
                                                                                                <form
                                                                                                    action="{{ route('delete.vocabularyguideline', ['vocabularyguidelineid' => $list->vocabularyguidelineid]) }}"
                                                                                                    method="POST"
                                                                                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài HD từ vựng này?');">
                                                                                                    @csrf
                                                                                                    @method('DELETE')
                                                                                                    <button type="submit" class="btn btn-danger">
                                                                                                        <i class="ace-icon fa fa-trash bigger-130"></i>
                                                                                                    </button>
                                                                                                </form>
                                                                                            </td>

                                                                                            <td class="center">
                                                                                                <a class="green" href="{{ route('edit.vocabularyguidelinecontent', [
                                                    'vocabularyguidelineid' => $list->vocabularyguidelineid
                                                ]) }}">
                                                                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                                                                </a>
                                                                                            </td>

                                                                                            <td class="center">
                                                                                                <ul class="list-unstyled">
                                                                                                    @if($list->checknoidung == 1)
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
                                                <li class="active"><a href="#">{{ __('label.prev') }}</a></li>
                                                <li><a href="{{ route('admin.vocabulary', ['pageid' => $pageid + 1]) }}">{{ __('label.next') }}</a></li>
                                            @elseif($pageid == $maxPageId)
                                                <li><a href="{{ route('admin.vocabulary', ['pageid' => $pageid - 1]) }}">{{ __('label.prev') }}</a></li>
                                                <li class="active"><a href="#">{{ __('label.next') }}</a></li>
                                            @else
                                                <li><a href="{{ route('admin.vocabulary', ['pageid' => $pageid - 1]) }}">{{ __('label.prev') }}</a></li>
                                                <li><a href="{{ route('admin.vocabulary', ['pageid' => $pageid + 1]) }}">{{ __('label.next') }}</a></li>

                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Buttons -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-white btn-warning btn-bold" data-toggle="modal" data-target="#myModal">
                                        {{ __('label.add_vocabulary_topic') }}

                                    </button>
                                    <a href="{{route('media.vocabularyguideline')}}" role="button"
                                        class="btn btn-white btn-warning btn-bold">Thêm hình ảnh cho chủ đề từ vựng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->

        <!-- Begin Footer -->
        @include('Admin.includes.footer')
        <!-- End Footer -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>

    <!-- Modal thêm tên đề thi -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form action="{{ route('insert.vocabularyguideline')}}" method="POST">
                @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ __('label.add_vocabulary_topic') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">{{ __('label.enter_name') }}</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1-1" placeholder="Tên chủ đề từ vựng"
                                                class="form-control" name="vocabularyname" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">{{ __('label.choose_image') }}</label>

                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="grammarimage"
                                                name="grammarimage" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            {{ __('label.add_vocabulary_topic') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection