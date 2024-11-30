@extends('Admin.layouts.admin')

@section('title', 'Trang Chủ')
@section('content')

<body class="no-skin">
    <!-- Header -->
    @include('Admin.includes.header')
    <!-- End Header -->

    <!-- Begin menu -->
    @include('Admin.includes.menu')
    <!-- Bootstrap CSS -->
    <div class="container mt-5">
       <a href="{{route('admin.courses')}}">
            <ul class="breadcrumb" >
                    <i class="menu-icon fa fa-arrow-left"></i>
                <li style="color: #0088cc">&nbsp; &nbsp;{{ __('label.back') }}</li>

            </ul><!-- /.breadcrumb -->
        </a>
        <div class="row justify-content-center">
            <div class="">

                <!-- Card -->
                <div class="card shadow" style="margin:auto;">

                    <div class="card-header bg-primary text-white text-center">
                        <h3>Thông tin khóa học</h3>
                    </div>
                    <div class="card-body" style="width: 100%; margin: auto;">
                        <!-- Form -->
                        <form action="{{route('admin.course.update', ['id' => $course->id])}}" method="POST"
                            enctype="multipart/form-data">
                            <!-- CSRF Token (Laravel) -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <!-- Full Name -->
                            <div style="display:flex ; column-gap: 50px; margin-top:100px;">
                                <div style="width: 40%;">

                            <div class="mb-3">
                                <label for="name" class="form-label">Tên khóa học</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$course->name}}" required>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả khóa học</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$course->description}}" required>
                            </div>
                            @error('phone')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                             <!-- Phone Number -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Giá cả</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{$course->price}}" required>
                            </div>

                            </div>
                            <div>
                            <div>
                            <!-- Profile Picture -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Ảnh banner khóa học</label>
                                @if($course->image)
                                    <img src="{{ asset('images/' . $course->image) }}" alt="Profile Picture" class="img-fluid" width="300px"/>
                                @endif
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>


                                    <!-- Submit Button -->

                                </div>
                            </div>
                    </div>
                    <br>
                     <div class="d-grid">
                                <button type="submit" class="btn btn-primary">{{ __('label.savechange') }}</button>

                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
    @include('Admin.includes.footer')

    <!-- Bootstrap JS -->
    @endsection
