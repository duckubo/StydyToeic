
@if(session('sessionuser') == null)
    <div id="header-row">
        <div class="container">
            <div class="row">
                <!--LOGO-->
                <div class="span3">
                    <a class="brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" />
                    </a>
                </div>
                <!-- /LOGO -->

                <!-- MAIN NAVIGATION -->
                <div class="span9">
                    <div class="navbar pull-right">
                        <div class="navbar-inner">
                            <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <div class="nav-collapse collapse navbar-responsive-collapse">
                                <ul class="nav">
                                    <li><a href="">Đăng nhập</a></li>
                                    <li><a href="">Đăng Ký</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MAIN NAVIGATION -->
            </div>
        </div>
    </div>
@else
    <div id="header-row">
        <div class="container">
            <div class="row">
                <!--LOGO-->
                <div class="span3">
                    <a class="brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" />
                    </a>
                </div>
                <!-- /LOGO -->

                <!-- MAIN NAVIGATION -->
                <div class="span9">
                    <div class="navbar pull-right">
                        <div class="navbar-inner">
                            <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <div class="nav-collapse collapse navbar-responsive-collapse">
                                <ul class="nav">
                                    <li><a>Welcome: {{ session('sessionuser') }}</a></li>
                                    <li><a href="">Thoát</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MAIN NAVIGATION -->
            </div>
        </div>
    </div>
@endif
