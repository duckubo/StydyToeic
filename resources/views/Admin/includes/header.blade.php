
<!-- Thêm jQuery (Bootstrap cần jQuery để hoạt động) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Thêm Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
            <div class="navbar-header pull-left">
                <a href="{{route('admin.dashboard')}}" class="navbar-brand">
                    <small>
                        <i class="fa fa-leaf"></i>
                        {{ __('label.adminp') }}
                    </small>
                </a>
            </div>
            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                
                <ul class="nav ace-nav">
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
                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <span class="user-info">
                                <small>{{ __('label.hello') }}</small>
                                 {{ Auth::user()->name }}
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


                            <li>
                                 <a href="{{ route('profile', ['id'=> Auth::user()->id]) }}">
                                    <i class="ace-icon fa fa-users"></i>
                                    {{ __('label.prof') }}
                                </a>
                                <a href="{{ route('logout')}}">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    {{ __('label.exit') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

    </div>
</div>
