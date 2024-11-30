
<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try { ace.settings.loadState('sidebar') } catch (e) {}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div>

    <ul class="nav nav-list">
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">{{ __('label.userm') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
             <ul class="submenu">
                <li>
                    <a href="{{route('admin.account')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{ __('label.user') }}
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
        <!-- Quản lý phần HD -->
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-folder"></i>
                <span class="menu-text">{{ __('label.grammar_guideline_managementv1') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li>
                    <a href="{{ route('admin.grammar', ['pageid' => 1]) }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{ __('label.grammar') }}
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="{{ route('admin.vocabulary', ['pageid' => 1]) }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{ __('label.vocab') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <!-- Quản lý phần bài tập -->
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-table"></i>
                <span class="menu-text">{{ __('label.exmana') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li>
                    <a href="{{ route('admin.readingexercise', ['pageid' => 1]) }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{ __('label.readex') }}
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="{{ route('admin.listeningexercise', ['pageid' => 1]) }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{ __('label.listenex') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <!-- Quản lý đề thi -->
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">{{ __('label.exam_management') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li>
                    <a href="{{ route('admin.examination', ['pageid' => 1]) }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{ __('label.exam') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">{{ __('label.course_management') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li>
                    <a href="{{ route('admin.courses', ['pageid' => 1]) }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{ __('label.course') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon"
           class="ace-icon fa fa-angle-double-left ace-save-state"
           data-icon1="ace-icon fa fa-angle-double-left"
           data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
