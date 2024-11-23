@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
@include('includes.header')
    <!-- Bootstrap CSS -->
    <div class="container mt-5">
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <!-- Card -->
                <div class="card shadow" style="margin:auto;">

                    <div class="card-header bg-primary text-white text-center">
                        <h3>Thông tin cá nhân</h3>
                    </div>
                    <div class="card-body" style="width: 500px; margin: auto;">
                        <!-- Form -->
                        <form action="{{route('update.profile', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
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
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                            </div>

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

    <!-- Bootstrap JS -->
@endsection
