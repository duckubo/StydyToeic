
@guest
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
                                    <li><a href="{{route('form_login')}}">{{ __('label.login') }}</a></li>
                                    <li><a href="{{route('register')}}">{{ __('label.register') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MAIN NAVIGATION -->
            </div>
        </div>
    </div>
@endguest
@auth
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
                            <div class="nav-collapse collapse navbar-responsive-collapse">
                            <div class="btn-group pull-right nav">
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
                                <ul class="nav">
                                    <li><a href="{{ route('courses') }}">{{ __('label.activecource') }}</a></li>
                                    <li><a href="{{ route('mycourses') }}">{{ __('label.my-course') }}</a></li>
                                    <li><a href="{{ route('profile', ['id' => Auth::user()->id]) }}">{{ __('label.hello') }} {{ Auth::user()->name }}</a></li>
                                    <li><a href="{{ route('logout') }}">{{ __('label.exit') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MAIN NAVIGATION -->
            </div>
        </div>
    </div>
@endauth
