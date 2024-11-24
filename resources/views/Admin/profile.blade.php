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
       <a href="{{route('admin.account')}}">
            <ul class="breadcrumb" >
                    <i class="menu-icon fa fa-arrow-left"></i>
                <li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
            </ul><!-- /.breadcrumb -->
        </a>
        <div class="row justify-content-center" >
            <div class="col-md-8">

                <!-- Card -->
                <div class="card shadow" style="margin:auto;">

                    <div class="card-header bg-primary text-white text-center">
                        <h3>Thông tin cá nhân</h3>
                    </div>
                    <div class="card-body" style="width: 600px; margin: auto;">
                        <!-- Form -->
                        <form action="{{route('admin.update.profile', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                            <!-- CSRF Token (Laravel) -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <!-- Full Name -->
                             <div style="display:flex ; column-gap: 100px;">
                             <div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                            </div>
                            @error('phone')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                             <!-- Phone Number -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                            </div>
                            <br>
                               <div class="mb-3">
                                    <label class="col-sm-5 control-label no-padding-right" for="form-field-6">Chọn vai trò</label>
                                    <div class="col-sm-7">
                                        <select id="form-field-6" class="form-control" name="role_id" required>
                                            <option value="2">Quản trị </option>
                                            <option value="1">Người dùng</option>
                                            <!-- Thêm các vai trò khác nếu cần -->
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div>
                            <!-- Profile Picture -->
                            <div class="mb-3">
                                <label for="profile_picture" class="form-label">Profile Picture</label>
                                @if($user->profile_picture)
                                    <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture" class="img-fluid" width="100px"/>
                                @endif
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                            </div>

                            <!-- Submit Button -->

                            </div>
                    </div>
                    <br>
                     <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
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
