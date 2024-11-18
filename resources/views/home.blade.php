@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
    <div class="container">
     <div class="row">
        <div class="span6">
           <div id="size">
              <form name="myform">
                 <input type="text" class="form-control" placeholder="Tìm kiếm"
                 style="width:500px; height:35px;" name="grammarname" onkeyup="Search()">
             </form>
         </div>

     </div>
 </div>
<div class="container" id="searchresult">
    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">

            <!-- Slide đầu tiên -->
            <div class="active item">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <div class="carousel-caption">
                                <h1>Hướng Dẫn Phần Nghe, Đọc Toeic</h1>
                                <p class="lead">Chúng tôi cung cấp cho các bạn những kiến thức tốt nhất</p>
                                <a class="btn btn-large btn-primary" href="#">Hãy tham gia ngay</a>
                            </div>
                        </div>
                        <div class="span6">
                            <img src="{{ asset('images/slide/slide1.jpg') }}" height="350" width="350" alt="Slide 1">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Các slide từ danh sách  -->
            @foreach ($listslidebanner as $list)
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <div class="carousel-caption">
                                <h1>{{ $list->slidename }}</h1>
                                <p class="lead">{{ $list->slidecontent }}</p>
                                <a class="btn btn-large btn-primary" href="#">Hãy tham gia</a>
                            </div>
                        </div>
                        <div class="span6">
                            <img src="{{ asset('images/slide/' . $list->slideimage) }}" height="350" width="350" alt="slide Name">
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>

        <!-- Điều hướng Carousel -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="icon-chevron-left"></i></a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="icon-chevron-right"></i></a>
    </div>
    <!-- /.Carousel -->
    <!-- Feature -->
    <div class="row feature-box">
        <div class="span12 cnt-title">
            <h1>Chúng tôi cung cấp cho bạn các giao diện học và thi thân thiện với người dùng</h1>
            <span>(--Học thử, Làm bài tập, Thi thử--)</span>
        </div>

        <div class="span4">
            <img src="{{ asset('images/guideline.png') }}" alt="Guideline">
            <h2>Hướng dẫn phần từ vựng, ngữ pháp</h2>
            <p>Cung cấp các bài hướng dẫn sát với đề thi.</p>
            <a href="#" data-toggle="modal" data-target="#myModal">Chi tiết &rarr;</a>
        </div>

        <div class="span4">
            <img src="{{ asset('images/exercises.png') }}" alt="Exercises">
            <h2>Bài tập phần nghe, đọc</h2>
            <p>Chúng tôi cung cấp các dạng bài tập có trong đề thi Toeic.</p>
            <a href="#" data-toggle="modal" data-target="#myModal1">Chi tiết &rarr;</a>
        </div>

        <div class="span4">
            <img src="{{ asset('images/thitoeic.png') }}" alt="Thi thử Toeic">
            <h2>Đề thi thử</h2>
            <p>Chúng tôi cung cấp cho các bạn đề thi sát với thi thật.</p>
            <a href="{{ url('Hienthidsdethi?pageid=1') }}">Chi tiết &rarr;</a>
        </div>
    </div>
    <!-- /.Feature -->

    <div class="hr-divider"></div>

    <!-- Row View -->
    <div class="row">
        <div class="span6">
            <img src="{{ asset('images/responsive.png') }}" alt="Responsive">
        </div>

        <div class="span6">
            <img class="hidden-phone" src="{{ asset('images/icon4.png') }}" alt="Icon 4">
            <h1>Fully Responsive</h1>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            <a href="#">Read More &rarr;</a>
        </div>
    </div>

</div>
</div>
<div id="size1">
    @include('includes.footer')
</div>
<!-- start Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">DANH SÁCH LOẠI BÀI HƯỚNG DẪN</h4>
            </div>
            <div class="modal-body">

                <div class="media">
                    <a class="pull-left"><img src="{{asset('images/loaibtnghe.png')}}" class="media-object" alt='' /></a>
                    <div class="media-body">
                        <h4>
                            <a href="{{ route('vocabularyguideline', ['pageid' => 1]) }}">Bài hướng dẫn phần từ vựng</a>
                        </h4>
                    </div>
                </div>

                <div class="media">
                    <a class="pull-left"><img src="{{asset('images/loaibtdoc.png')}}" class="media-object" alt='' /></a>
                    <div class="media-body">
                        <h4>
                            <a href="grammarguideline?pageid=1">Bài hướng dẫn phần ngữ pháp</a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
            </div>
        </div>

    </div>
</div>
<!-- end modal -->
<!-- start Modal làm bt -->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DANH SÁCH LOẠI BÀI TẬP</h4>
    </div>
    <div class="modal-body">

      <div class="media">
         <a class="pull-left"><img src="{{asset('images/loaibtnghe.png')}}" class="media-object" alt='' /></a>
         <div class="media-body">
            <h4>
               <a href="{{ route('listeningexercise', ['pageid' => 1]) }}">Bài tập phần nghe</a>
           </h4>
       </div>
   </div>

   <div class="media">
     <a class="pull-left"><img src="{{asset('images/loaibtdoc.png')}}" class="media-object" alt='' /></a>
     <div class="media-body">
        <h4>
           <a href="{{ route('listeningexercise', ['pageid' => 1]) }}">Bài tập phần đọc</a>
       </h4>
   </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
</div>
</div>

</div>
</div>
<!-- end modal -->

@endsection
@section('scripts')
<script type="text/javascript">
    function Search() {
        var xhttp;
        var grammarname = document.myform.grammarname.value;

        if (grammarname !== "") {
          var url = "{{ route('search') }}";

            // Tạo đối tượng XMLHttpRequest
            if (window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            } else {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Khi yêu cầu hoàn tất
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState === 4 && xhttp.status === 200) {
                    var data = xhttp.responseText;
                    document.getElementById("searchresult").innerHTML = data;
                }
            };

            // Gửi yêu cầu POST với tham số 'grammarname'
            xhttp.open("POST", url, true);
            xhttp . setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp . setRequestHeader("X-CSRF-TOKEN", document . querySelector('meta[name="csrf-token"]') . getAttribute('content'));
            xhttp.send("grammarname="+encodeURIComponent(grammarname));

        } else {
            document.getElementById("searchresult").innerHTML =
                "Quay lại trang chủ bằng cách click vào logo website";
        }
        console.log('ok');

    }
</script>

@endsection
