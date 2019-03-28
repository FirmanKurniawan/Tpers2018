<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Tpers 2018</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('zeedapp/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('zeedapp/css/responsive.css')}}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('zeedapp/img/favicon.ico')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!-- prealoader area start -->
    <div id="preloader">
        <div class="spiner"></div>
    </div>
    <!-- prealoader area end -->
    <!-- Crumbs area start -->
    <div class="crumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="crumbs-header">
                        <h2 class="cd-headline letters rotate-3">
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Tpers 2018</b>
                                <b>Tpers 2018</b>
                            </span>
                        </h2>
                        @guest
                        <p>Upload & Download Your Files</p>
                        <div class="btn-area">
                            <a href="{{url('login')}}">Masuk</a>
                        </div>
                        @else
                        @if(Auth::user()->role == 1)
                        <h2>ADMIN</h2>
                        @else
                        <h2>USER</h2>
                        @endif
                        <p>Hai {{Auth::user()->name}}</p>
                        <div class="btn-area">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Keluar') }}
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Crumbs area end -->
    <!-- counter-box area start -->
    <div class="counter-box">
        <div class="container">
            <div class="row">
                <div class="counter-box-container">
                    <div class="col-md-4 col-sm-4 col-xs-12 col-2">
                        <div class="counter-item">
                            <b class="counter-up">{{$total_matakuliah}}</b>
                            <span>Total Mata Pelajaran</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-2">
                        <div class="counter-item">
                            <b class="counter-up">{{$total_file}}</b>
                            <span>Total File</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 col-2">
                        <div class="counter-item">
                            <b class="counter-up">{{$total_user}}</b>
                            <span>Total User</span>
                        </div>
                    </div>
                    @guest
                    @else
                    <div class="col-md-12 col-sm-4 col-xs-12 col-2">
                        <br>
                        <div class="btn-area">
                            <a href="#exampleModal" data-target="#exampleModal" data-toggle="modal">Upload Files</a>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{url('/upload/save')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-row">
    <div class="col-12">
        <label>Mata Kuliah :</label>
        @php
            $matakuliah = \App\Matakuliah::all();
        @endphp
      <select name="matakuliah" class="form-control">
        @foreach($matakuliah as $m)
        <option value="{{$m->id}}">{{$m->nama_matakuliah}}</option>
        @endforeach
      </select>

      <label>Judul :</label>
      <input type="text" class="form-control" placeholder="Judul" name="judul">
      <br>
      <label>Nama :</label>
      <input type="text" class="form-control" placeholder="Nama Anda" name="nama">
    </div>
    <div class="col-12">
        <br>
        <label>Upload File :</label>
      <input type="file" class="form-control" name="gambar[]">
    </div>
  </div>
<br>
<button type="submit" class="btn btn-primary">Upload</button>
</form>
      </div>
    </div>
  </div>
</div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <!-- counter-box area end -->
    <!-- demo area start -->
    <div class="demo-area">
        <div class="container">
            <center>
            <div class="col-md-12">
                <div class="counter-item">
                    <h1>Mata Kuliah</h1>
                </div>
            </div>
            </center>
            <br>
            <br>
            <div class="row">
                @foreach ($index as $indexs)
                <div class="col-md-4 col-sm-4 col-xs-12 col-2">
                    <div class="demo-item">
                        <div class="thumb-area">
                            <a href="zeedapp/index.html" target="_blank"><img src="{{asset('zeedapp/img/demo-thumb/index.jpg')}}" alt="demo image"></a>
                            <a href="{{url('data/'.$indexs->id)}}" class="lets-view" target="_blank"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                        <div class="demo-title">
                            <h2>{{$indexs->nama_matakuliah}}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- demo area end -->

    <!-- footer area start -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="footer-content text-center">
                    <h2>Kritik dan Saran?</h2>
                    <div class="btn-area">
                        <a href="#">Kontak</a>
                    </div>
                    <p class="copy-right"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- Scripts -->
    <script src="{{asset('zeedapp/js/jquery-3.2.0.min.js')}}"></script>
    <script src="{{asset('zeedapp/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('zeedapp/js/animatedheadline.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('zeedapp/js/counterup.js')}}"></script>
    <script src="{{asset('zeedapp/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('zeedapp/js/theme.js')}}"></script>
</body>

</html>