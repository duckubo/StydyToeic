@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <h1>Xác thực email</h1>
    <p>Vui lòng xác minh địa chỉ email của bạn bằng cách nhấp vào liên kết chúng tôi vừa gửi tới email của bạn.</p>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Gửi lại email xác minh</button>
    </form>
</div>

<div id="para1">
    @include('includes.footer')
</div>

@endsection