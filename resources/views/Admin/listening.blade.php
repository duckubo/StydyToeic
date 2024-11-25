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
                            <a class="active">{{ __('label.manage_reading_exercise_list') }}</a>
                        </li>
                    </ul><!-- /.breadcrumb -->
                </div>

                <div class="page-content">
                    @if(session('msgquanlydsbtdoc'))
                        <h4 class="pink">
                            <a class="green" data-toggle="modal">{{ session('msgquanlydsbtdoc') }}</a>
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
                                                <th class="center">{{ __('label.listen_exercise_name') }}</th>
                                                <th class="center">{{ __('label.listen_exercise_image_name') }}</th>
                                                <th class="center">{{ __('label.delete_listen_exercise') }}</th>
                                                <th class="center">{{ __('label.add_listen_exercise_question') }}</th>
                                                <th class="center">{{ __('label.checked_listen_exercise_question') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listlisteningexercise as $list)
                                                <tr>
                                                    <td class="center">{{ $list->listenexerciseid }}</td>
                                                    <td class="center">{{ $list->listenexercisename }}</td>
                                                    <td class="center">{{ $list->listenexerciseimage }}</td>
                                                    <td class="center">
                                                        <a class="red" href="{{ route('delete.listeningexercise', ['listenexerciseid' => $list->listenexerciseid]) }}">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <a class="green" href="{{ route('edit.listeningexercisecontent', ['listenexerciseid' => $list->listenexerciseid]) }}">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                    </td>
                                                    <td class="center">
                                                        <ul class="list-unstyled">
                                                            @if ($list->checkcauhoi)
                                                                <li>
                                                                    <i class="ace-icon fa fa-check-square-o"></i>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <i class="ace-icon fa fa-square-o"></i>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div>
                                        <ul class="pagination">
                                            @if ($pageid == 1)
                                                <li class="active"><a href="#">{{ __('label.prev') }}</a></li>
                                                <li><a href="{{ route('admin.listeningexercise', ['pageid' => $pageid + 1]) }}">{{ __('label.next') }}</a></li>
                                            @elseif ($pageid == $maxPageId)
                                                <li><a href="{{ route('admin.listeningexercise', ['pageid' => $pageid - 1]) }}">{{ __('label.prev') }}</a></li>
                                                <li class="active"><a href="#">{{ __('label.next') }}</a></li>
                                            @else
                                                <li><a href="{{ route('admin.listeningexercise', ['pageid' => $pageid - 1]) }}">{{ __('label.prev') }}</a></li>
                                                <li><a href="{{ route('admin.listeningexercise', ['pageid' => $pageid + 1]) }}">{{ __('label.next') }}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-white btn-warning btn-bold" data-toggle="modal" data-target="#myModal">
                                    {{ __('label.add_listen_exercise') }}
                                    </button>
                                      <a href="{{route('media.listeningexercise')}}" role="button" class="btn btn-white btn-warning btn-bold">{{ __('label.add_listen_exercise_audio_image') }}</a>
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
        <!-- end footer -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- Modal thêm tên đề thi -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
              <form action="{{ route('insert.listeningexercise')}}" method="POST">
                @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ __('label.add_read_exercise') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">{{ __('label.enter_name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1-1" placeholder="Tên đề thi" class="form-control" name="readname" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">{{ __('label.choose_image') }}</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="listenexerciseimage" name="listenexerciseimage" accept="image/*">
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
                            {{ __('label.add_listen_exercise_name') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection
