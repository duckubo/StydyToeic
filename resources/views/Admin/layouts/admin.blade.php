<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Trang chủ quản trị</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" />

		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('template/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

		<!-- Colorbox -->
		<link rel="stylesheet" href="{{ asset('template/css/colorbox.min.css') }}" />

		<!-- Ace Styles -->
		<link rel="stylesheet" href="{{ asset('template/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="{{ asset('template/css/ace-skins.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('template/css/ace-rtl.min.css') }}" />

		<!-- Ace Extra -->
		<script src="{{ asset('template/js/ace-extra.min.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body >
    @yield('content')

	<script src="{{ asset('template/js/jquery-2.1.4.min.js') }}"></script>

    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('template/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
    </script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('template/js/jquery.colorbox.min.js') }}"></script>

    <script src="{{ asset('template/js/jquery-ui.custom.min.js')}}"></script>
		<script src="{{ asset('template/js/jquery.ui.touch-punch.min.js')}}"></script>
		<script src="{{ asset('template/js/markdown.min.js')}}"></script>
		<script src="{{ asset('template/js/bootstrap-markdown.min.js')}}"></script>
		<script src="{{ asset('template/js/jquery.hotkeys.index.min.js')}}"></script>
		<script src="{{ asset('template/js/bootstrap-wysiwyg.min.js')}}"></script>
		<script src="{{ asset('template/js/bootbox.js')}}"></script>


		<script src="{{ asset('template/js/ace-elements.min.js')}}"></script>
		<script src="{{ asset('template/js/ace.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            var $overflow = '';
            var colorbox_params = {
                rel: 'colorbox',
                reposition: true,
                scalePhotos: true,
                scrolling: false,
                previous: '<i class="ace-icon fa fa-arrow-left"></i>',
                next: '<i class="ace-icon fa fa-arrow-right"></i>',
                close: '&times;',
                current: '{current} of {total}',
                maxWidth: '100%',
                maxHeight: '100%',
                onOpen: function() {
                    $overflow = document.body.style.overflow;
                    document.body.style.overflow = 'hidden';
                },
                onClosed: function() {
                    document.body.style.overflow = $overflow;
                },
                onComplete: function() {
                    $.colorbox.resize();
                }
            };

            $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
            $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");
            $(document).one('ajaxloadstart.page', function(e) {
                $('#colorbox, #cboxOverlay').remove();
            });
        });
    </script>
     @yield('scripts')
</body>

</html>
