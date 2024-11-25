<!-- resources/views/send_sms.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>

<!-- Font CSS -->
<link rel="stylesheet" href="{{ asset('template/font/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('template/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
