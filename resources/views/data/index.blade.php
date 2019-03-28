            {{-- @extends('layouts.app')
            @section('content')
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Pengupload</th>
                  <th scope="col">Judul</th>
                  <th scope="col">File</th>
                  <th colspan="3">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $file = \App\File::where('id_matakuliah', 'id');
                $i = 1;
                @endphp
                @foreach ($data as $datas)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$datas->nama}}</td>
                  <td>{{$datas->judul}}</td>
                  <td><a href="{{url('download/'.$datas->id)}}">{{$datas->nama_file}}</a></td>
                  <td><a href="{{url('upload/delete/'.$datas->id)}}">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endsection --}}

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
    @php
      $total_matakuliah = \App\Matakuliah::count();
      $total_user = \App\User::count();
      $total_file = \App\File::count();
    @endphp
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
                    
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <!-- counter-box area end -->
    <!-- demo area start -->
    <div class="container">
      @foreach ($data as $datas1)
      @php
        $file = \App\File::where('id_matakuliah', 'id');
        $nama = \App\Matakuliah::where('id', $datas1->id_matakuliah)->value('nama_matakuliah');
        $i = 1;
      @endphp
      @endforeach
      <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Pengupload</th>
                  <th scope="col">Judul</th>
                  <th scope="col">File (Klik File Untuk Download)</th>
                  <th colspan="3">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $datas)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$datas->nama}}</td>
                  <td>{{$datas->judul}}</td>
                  <td><a href="{{url('download/'.$datas->id)}}">{{$datas->nama_file}}</a></td>
                  <td><a href="{{url('upload/delete/'.$datas->id)}}">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
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