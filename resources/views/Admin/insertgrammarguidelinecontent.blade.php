@extends('Admin.layouts.admin')

@section('title', 'Trang Chủ')
@section('content')
<body class="no-skin">
    <!-- Header -->
    @include('Admin.includes.header')
    <!-- End Header -->

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try { ace.settings.loadState('main-container') } catch (e) {}
        </script>

        <!-- Begin menu -->
        @include('Admin.includes.menu')<!-- Đảm bảo bạn có file menu.blade.php trong thư mục resources/views/admin -->
        <!-- End menu -->

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Trang chủ</a>
                        </li>
                        <li>
                            <a href="{{route('admin.grammar')}}">Quản lý phần hướng dẫn</a>
                        </li>
                        <li class="active">Ngữ pháp</li>
                    </ul><!-- /.breadcrumb -->
                </div>

                <div class="page-content">
                    <div class="ace-settings-container" id="ace-settings-container">
                    </div><!-- /.ace-settings-container -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
							 <a href="{{ route('admin.grammar', ['pageid' => 1]) }}">
										<ul class="breadcrumb" >
												<i class="menu-icon fa fa-arrow-left"></i>
												<li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
											</ul><!-- /.breadcrumb -->
										</a>
                            <div class="row">
                                <div class="col-sm-7">
                                    <h4 class="header green">Soạn thảo nội dung bài ngữ pháp</h4>

                                    <h4 class="pink">
                                        <a class="red" data-toggle="modal">
                                            @if(session('msggrammarguidelinecontent'))
                                                {{ session('msggrammarguidelinecontent') }}
                                            @else
                                                &nbsp;
                                            @endif
                                        </a>
                                    </h4>

                                    <div class="widget-box widget-color-blue">
                                        <div class="widget-header widget-header-small"></div>

                                        <form action="{{ route('grammarguidelinecontent.update', ['grammarguidelineid' => $grammarguidelineid]) }}" method="POST">
                                            @csrf
                                            <div class="widget-body">
                                                <div class="widget-main no-padding">
                                                    <textarea name="content" data-provide="markdown" data-iconlibrary="fa" rows="10" data-hidden-buttons="Image"></textarea>
                                                </div>

                                                <div class="widget-toolbox padding-4 clearfix">
                                                    <div class="btn-group pull-right">
                                                        <button class="btn btn-sm btn-purple" type="submit">
                                                            <i class="ace-icon fa fa-floppy-o bigger-125"></i>
                                                            Thêm nội dung
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->

        <!-- Begin footer -->
           @include('Admin.includes.footer')<<!-- Đảm bảo bạn có file footer.blade.php trong thư mục resources/views/admin -->
        <!-- end footer -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->
    @section('scripts')
<script type="text/javascript">
			jQuery(function($){

	$('textarea[data-provide="markdown"]').each(function(){
        var $this = $(this);

		if ($this.data('markdown')) {
		  $this.data('markdown').showEditor();
		}
		else $this.markdown()

		$this.parent().find('.btn').addClass('btn-white');
    })



	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			//console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	}


	$('#editor1').ace_wysiwyg({
		toolbar:
		[
			'font',
			null,
			'fontSize',
			null,
			{name:'bold', className:'btn-info'},
			{name:'italic', className:'btn-info'},
			{name:'strikethrough', className:'btn-info'},
			{name:'underline', className:'btn-info'},
			null,
			{name:'insertunorderedlist', className:'btn-success'},
			{name:'insertorderedlist', className:'btn-success'},
			{name:'outdent', className:'btn-purple'},
			{name:'indent', className:'btn-purple'},
			null,
			{name:'justifyleft', className:'btn-primary'},
			{name:'justifycenter', className:'btn-primary'},
			{name:'justifyright', className:'btn-primary'},
			{name:'justifyfull', className:'btn-inverse'},
			null,
			{name:'createLink', className:'btn-pink'},
			{name:'unlink', className:'btn-pink'},
			null,
			{name:'insertImage', className:'btn-success'},
			null,
			'foreColor',
			null,
			{name:'undo', className:'btn-grey'},
			{name:'redo', className:'btn-grey'}
		],
		'wysiwyg': {
			fileUploadError: showErrorAlert
		}
	}).prev().addClass('wysiwyg-style2');



	$('#editor2').css({'height':'200px'}).ace_wysiwyg({
		toolbar_place: function(toolbar) {
			return $(this).closest('.widget-box')
			       .find('.widget-header').prepend(toolbar)
				   .find('.wysiwyg-toolbar').addClass('inline');
		},
		toolbar:
		[
			'bold',
			{name:'italic' , title:'Change Title!', icon: 'ace-icon fa fa-leaf'},
			'strikethrough',
			null,
			'insertunorderedlist',
			'insertorderedlist',
			null,
			'justifyleft',
			'justifycenter',
			'justifyright'
		],
		speech_button: false
	});




	$('[data-toggle="buttons"] .btn').on('click', function(e){
		var target = $(this).find('input[type=radio]');
		var which = parseInt(target.val());
		var toolbar = $('#editor1').prev().get(0);
		if(which >= 1 && which <= 4) {
			toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
			if(which == 1) $(toolbar).addClass('wysiwyg-style1');
			else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
			if(which == 4) {
				$(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
			} else $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
		}
	});



	if ( typeof jQuery.ui !== 'undefined' && ace.vars['webkit'] ) {

		var lastResizableImg = null;
		function destroyResizable() {
			if(lastResizableImg == null) return;
			lastResizableImg.resizable( "destroy" );
			lastResizableImg.removeData('resizable');
			lastResizableImg = null;
		}

		var enableImageResize = function() {
			$('.wysiwyg-editor')
			.on('mousedown', function(e) {
				var target = $(e.target);
				if( e.target instanceof HTMLImageElement ) {
					if( !target.data('resizable') ) {
						target.resizable({
							aspectRatio: e.target.width / e.target.height,
						});
						target.data('resizable', true);

						if( lastResizableImg != null ) {
							//disable previous resizable image
							lastResizableImg.resizable( "destroy" );
							lastResizableImg.removeData('resizable');
						}
						lastResizableImg = target;
					}
				}
			})
			.on('click', function(e) {
				if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
					destroyResizable();
				}
			})
			.on('keydown', function() {
				destroyResizable();
			});
	    }

		enableImageResize();
	}


});
		</script>
        @endsection
</body>
@endsection
