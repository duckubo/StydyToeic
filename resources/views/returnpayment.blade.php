@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <!-- PAGE TITLE -->
    <!--PAGE TITLE-->
    <div class="row">
        <div class="span12">
            <div class="page-header">
                 <a href="{{route('grammarguideline')}}">
                        <ul class="breadcrumb" >
                                <i class="menu-icon fa fa-arrow-left"></i>
                            <li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
                        </ul><!-- /.breadcrumb -->
                    </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <p>Bạn đã đăng kí khóa học thành công.</p>
            <ul>
                <li>Mã đăng kí {{$enrollcode}}</li>
                <li>Số tiền đã thanh toán {{$price}}</li>
            </ul>
            <a href="{{route('mycourses')}}">Xem khóa học đã đăng kí</a>
        </div>
    </div>
    <!-- /. PAGE TITLE -->
</div>

<div id="para1">
    @include('includes.footer')
</div>
@endsection
