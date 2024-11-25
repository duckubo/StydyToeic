<!-- <!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html> -->

<!-- Thêm jQuery (Bootstrap cần jQuery để hoạt động) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Thêm Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" />

<!-- Font CSS -->
<link rel="stylesheet" href="{{ asset('template/font/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('template/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

<!-- Ace CSS -->
<link rel="stylesheet" href="{{ asset('template/css/ace.min.css') }}" />
<link rel="stylesheet" href="{{ asset('template/css/ace-rtl.min.css') }}" />

<body class="login-layout">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-leaf green"></i>
                                <span class="red">JSP</span>
                                <span class="white" id="id-text2">SERVLET</span>
                            </h1>
                            <h4 class="blue" id="id-company-text">&copy; Myclass.vn</h4>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            {{ __('label.account_information') }}
                                        </h4>

                                        <div class="space-6"></div>

                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <fieldset>
                                                <label class="block clearfix" style="color:red">
                                                    @if(session('msglogin'))
                                                        {{ session('msglogin') }}
                                                    @endif
                                                </label>
                                                @error('email')
                                                    <span style="color:red">{{ $message }}</span>
                                                @enderror
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="email" class="form-control" placeholder="{{ __('label.nhapemail') }}" name="email" value="" required/>
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>
                                                @error('password')
                                                    <span style="color:red">{{ $message }}</span>
                                                @enderror
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control" placeholder="{{ __('label.nhappass') }}" name="password" required/>
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix text-center">
                                                    <button type="submit" class="width-35 btn btn-sm btn-primary">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">{{ __('label.login') }}</span>
                                                    </button>
                                                </div>


                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>

                                        <div class="clearfix">
                                                    <button type="button" class="width-100 pull-right btn btn-sm"
                                                        onclick="window.location.href='/auth/google'"
                                                        style="border-color: #ec640f; background-color: #ec640f !important; outline: none">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">{{ __('label.loginwg') }}</span>
                                                    </button>
                                                </div>

                                        <div class="social-or-login center">
                                            <span class="bigger-110"></span>
                                        </div>

                                        <div class="space-6"></div>

                                    </div><!-- /.widget-main -->

                                    <div class="toolbar clearfix">
                                        <div>
                                            <a href="{{ route('home') }}" class="forgot-password-link">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                {{ __('label.ghome') }}
                                            </a>
                                        </div>

                                        <div>
                                            <a href="{{ route('register') }}" class="user-signup-link">
                                            {{ __('label.register') }}
                                                <i class="ace-icon fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->
                        </div><!-- /.position-relative -->

                       
                        
                        <div class="navbar-fixed-top align-right">
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                        <!-- Button to toggle the language dropdown -->
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                {{ __('label.languages') }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('lang/vi') }}">Tiếng Việt</a></li>
                                    <li><a href="{{ url('lang/en') }}">English</a></li>
                                </ul>
                            </div>
                        </div>
                            <br />
                            &nbsp;
                            <a id="btn-login-dark" href="#">{{ __('label.dark') }}</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-blur" href="#">{{ __('label.blue') }}</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-light" href="#">{{ __('label.light') }}</a>
                            &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->
    <script src="template/js/jquery-2.1.4.min.js"></script>


		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='template/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});



			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');

				e.preventDefault();
			 });

			});
		</script>
</body>
