
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
												<li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
											</ul><!-- /.breadcrumb -->
										</a>
                                    <div class="widget-main">

                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                          	Thêm câu hỏi đề thi
                                        </h4>

                                        <div class="space-6"></div>

                                        <form action="{{ route('edit.examinationcontent', ['examinationid' => $examinationid]) }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <fieldset>
                                                <label class="block clearfix">
                                                    {{ session('msgthemhinhchudetuvung', ' ') }}
                                                </label>

                                                <label class="block clearfix">
                                                  Thêm file(.xlsx):
                                                    <input type="file" name="file" class="btn btn-white btn-warning btn-bold">
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix">
                                                    <button type="submit" class="width-70 pull-right btn btn-sm btn-primary">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">Thêm câu hỏi đề thi</span>
                                                    </button>
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
</body>
