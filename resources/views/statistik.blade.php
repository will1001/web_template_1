
<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
    <meta name="author" content="John Doe">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{$template[0]->nama_desa}}</title>
    <!-- Place favicon.ico in the root directory -->
    
    <link rel="shortcut icon" type="image/ico" href="{{asset('images/favicon.ico')}}" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lemon">
    <link rel="stylesheet" href="{{asset('css/transparansi.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsivedetailhalaman.css')}}">
    <link rel="stylesheet" href="{{asset('css/table.css')}}">

    <style>
      .bg-light {
        background-color: {{$template[0]->warna_navbar}}!important;
      }
      section table th{
        color: {{$template[0]->warna_navbar}}!important;
       }
    </style>
</head>

<!-- <body onload="startTime()" data-spy="scroll" data-target="#primary-menu"> -->
  <body>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
   <a class="navbar-brand" href="{{ url('/') }}" @click="currentView='indexpage';activate(0);isHidden = false">
    <img src="/images/kabupaten-lombok-timur-ntb.png" width="55" height="70" class="d-inline-block align-top" alt="">
    <div id="spacetextlogo">
    <span id="logotext">{{ $template[0]->nama_desa }}</span>
    <span id="logotext2">Website Resmi Pemerintah Desa</span>
    </div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
              <li>
                  <a href="{{URL::previous()}}" class="nav-link">KEMBALI</a>
              </li>
       </ul>
    </ul>
  </div>
   </div>
</nav>



    <section id="statistik" style="margin-top: 31px;">
      <div class="container" id="app">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Data statistik Desa</h1>
              <div :is="currentchart" class="wow fadeIn"  @clicked="gantichart" keep-alive></div>
          </div>
        </div>
      </div>
    </section>


  

 <!--  <footer style="padding-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 text-light text-left">
                <p><i class="text-light fas fa-map-marker"></i> {{$template[0]->alamat_desa}}</p>
                <p><i class="text-light fas fa-phone"></i> {{$template[0]->no_tlp_desa}}</p>
                <p class="text-light text-left"><i class="text-light fas fa-envelope"></i> {{$template[0]->email}}</p>
            </div>
            <div class="col-md-4">
                <br>
                <br>
                <br>
                <p class="text-light text-center">&copy; Copyright 2019 by <a class="text-light" href="https://winchy.tech">Winchy.tech</a></p>
            </div>
            <div class="col-md-4">
                <br>
                <p class="text-light text-right" id="date"></p>
                <p class="text-light text-right" id="txt"></p>
            </div>
        </div>
    </div>
</footer> -->




    <!-- <script src="{{ asset('/js/date.js') }}" type="text/javascript" charset="utf-8" async defer></script> -->
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/wow.min.js') }}" type="text/javascript"></script>
</body>

</html>