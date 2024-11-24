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
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Thêm media
											</h4>

											<div class="space-6"></div>

											<form action="{{route('media.insert.vocabularyguideline')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<fieldset>
													<label class="block clearfix">
                                                    {{ session('msgthemhinhchudetuvung', ' ') }}
                                                </label>

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

														<input type="submit" value="Thêm audio và hình ảnh" class="btn btn-sm btn-primary">
													 	<input id="addFile" type="button" value="Thêm choose file" class="btn btn-sm btn-primary"/>

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
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
<form action="{{ url('/upload-files') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="files">Chọn các file âm thanh hoặc hình ảnh:</label>
    <input type="file" name="files[]" id="files" multiple required>
    <button type="submit">Tải lên</button>
</form>
