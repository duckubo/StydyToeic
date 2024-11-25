<!-- Thêm jQuery (Bootstrap cần jQuery để hoạt động) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Thêm Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" />

<!-- Font CSS -->
<link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('template/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

<!-- Ace CSS -->
<link rel="stylesheet" href="{{ asset('template/css/ace.min.css') }}" />
<link rel="stylesheet" href="{{ asset('template/css/ace-rtl.min.css') }}" />
<script src="{{asset('template/js/jquery-2.1.4.min.js')}}"></script>
 <script>
        $(document).ready(function() {
            $('#addFile').click(function() {
                var fileIndex = $('#fileTable tr').length;
                $('#fileTable').append('<tr><td><input type="file" name="files['+ fileIndex +']" /></td></tr>');
            });
        });
    </script>
<body class="login-layout">

		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									  <span class="red">Laravel</span>
                                <span class="white" id="id-text2">Blade</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Myclass.vn</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<a href="{{ route('admin.examination', ['pageid' => 1]) }}">
										<ul class="breadcrumb" >
												<i class="menu-icon fa fa-arrow-left"></i>
												<li style="color: #0088cc">&nbsp; &nbsp;{{ __('label.back') }}</li>
											</ul><!-- /.breadcrumb -->
										</a>
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												{{ __('label.add_audio_and_image_for_exam') }}
											</h4>

											<div class="space-6"></div>

											<form action="{{route('media.insert.examination')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<fieldset>
													<label class="block clearfix">
                                                    {{ session('msgthemhinhchudetuvung', ' ') }}
                                                </label>
												   @if (session('success'))
                                                    <div class="alert alert-success">{{ session('success') }}</div>
                                                @endif
  												@if (session('error'))
                                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                                @endif
													<table id="fileTable">
												 			 <tr>
										                   		 <td><input name="files[0]" type="file" /></td>
										               		 </tr>
										                	<tr>
										                   		 <td><input name="files[1]" type="file" /></td>
										                	</tr>
												 	 </table>


													<div class="space"></div>

													<div class="clearfix">

														<input type="submit" value="{{ __('label.add_exercise_audio_image') }}" class="btn btn-sm btn-primary">
													 	<input id="addFile" type="button" value="{{ __('label.choose_file') }}" class="btn btn-sm btn-primary"/>

													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110"></span>
											</div>

											<div class="space-6"></div>


										</div><!-- /.widget-main -->

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
<form action="{{ url('/upload-files') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="files">{{ __('label.choose_file') }}</label>
    <input type="file" name="files[]" id="files" multiple required>
    <button type="submit">{{ __('label.upload') }}</button>
</form>
