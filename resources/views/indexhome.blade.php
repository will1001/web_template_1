<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/responsive.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lemon">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <style>
      body{
        background-image: url({{$template[0]->background}});
      }
      #logotext{
        font-size: {{$template[0]->font_size_nama_desa}}px;
      }

    </style>



    <title>{{ $template[0]->nama_desa }}</title>
  </head>
  <body onload="startTime()">
    <!-- Image and text -->



<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
   <a class="navbar-brand" href="#" @click="currentView='indexpage';activate(0);isHidden = false">
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
      <li class="nav-item">
        <a class="nav-link" href="#" @click="currentView='bidangpemerintahan';activate(1);isHidden = true" :class="{ active : active_el == 1 }">Bidang PEMERINTAHAN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" @click="currentView='panduanpenduduk';activate(2);isHidden = true" :class="{ active : active_el == 2 }">Panduan PENDUDUK</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" @click="currentView='halamanbisnis';activate(3);isHidden = true" :class="{ active : active_el == 3 }">Halaman BISNIS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" @click="currentView='untukpengunjung';activate(4);isHidden = true" :class="{ active : active_el == 4 }">Untuk PENGUNJUNG</a>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          LOGIN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if (Route::has('register'))
            <a class="dropdown-item" href="{{ url('register') }}">Daftar</a>
          @endif
          <a class="dropdown-item" href="{{ url('login') }}">Login</a>
        </div>
      </li>
    </ul>
  </div>
   </div>
</nav>
    <component  :is="currentView" class="wow fadeIn" @clicked="updatecurrentview" keep-alive></component>
    <section id="kotak3" v-if="!isHidden">
                <div class="container">
                <div class="row">
                    <div class="col-4 col-xs-4 col-sm-4 col-md-2 offset-md-1">
                        <div class="inner text-center">
                            <a href="#" @click="currentView='lembagaindex';isHidden = true"><i class="fas fa-sitemap"></i><br>
                            <h4><strong>LEMBAGA</strong></h4></a>
                        </div>
                    </div>
                    <div class="col-4 col-xs-4 col-sm-4 col-md-2">
                        <div class="inner text-center">
                            <a href="{{url('/organisasi')}}"><i class="fa-2x fas fa-users"></i><br>
                            <h4><strong>SOTK</strong></h4></a>
                        </div>
                    </div>
                    <div class="col-4 col-xs-4 col-sm-4 col-md-2">
                        <div class="inner text-center">
                            <a href="https://goo.gl/maps/ru5HSKJND5t"><i class="fas fa-map-marked-alt"></i><br>
                            <h4><strong>PETA</strong></h4></a>
                        </div>
                    </div>
                    <div class="col-4 col-xs-4 col-sm-4 col-md-2">
                        <div class="inner text-center">
                            <a href="#" @click="currentView='agenda';isHidden = true"><i class="fas fa-calendar-alt"></i><br>
                            <h4><strong>AGENDA</strong></h4></a>
                        </div>
                    </div>
                    <div class="col-4 col-xs-4 col-sm-4 col-md-2">
                        <div class="inner text-center">
                            <a href="#" @click="currentView='statistikindex';isHidden = true"><i class="fas fa-chart-bar"></i><br>
                            <h4><strong>DATA</strong></h4></a>
                        </div>
                    </div>
                </div>
            </div>
            </section>
</div>



<template id="indexpage">
    <div>
            <section id="kotak1">
                <div class="container">
                <div class="row">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4">
                        <a href="#" @click="showselayangpandang()" :value="value">
                          <div class="tentang_desa inner text-left">
                            <h2>Selayang Pandang</h2>
                            <p>Desa Pringgajurang terletak di ke Kecamatan Montong Gading, Kabupaten Lombok Timur, NTB. Desa ini berada tidak jauh dari objek Wisata Otak Kokok-Joben. Desa ini dapat diakses dari Bandara Internasional Lombok, Pelabuhan Lembar, Kota Matar . . .</p>
                        </div>
                        </a>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4">
                        <div class="berita_terbaru inner text-center">
                            <div id="carouselExampleControls" class="carousel slide my-carousel" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <h2 class="text-left">Berita Terbaru</h2>
                                    <h3><a href="{{ url('beritadesa') }}">{{ substr($beritas[0]->judulberita,0,100) }}</a></h3>
                                    <br>
                                    <p class="text-right footsign">admin,{{ date("d F Y", strtotime($beritas[0]->created_at)) }}</p>
                                </div>
                                @foreach($beritas as $key => $berita)
                                @if($key > 0)
                                <div class="carousel-item">
                                  <h2 class="text-left">Berita Terbaru</h2>
                                    <h3><a href="{{ url('beritadesa') }}">{{ substr($berita->judulberita,0,100) }}</a></h3>
                                    <br>
                                    <p class="text-right footsign">admin,{{ date("d F Y", strtotime($berita->created_at)) }}</p>
                                </div>
                             @endif
                             @endforeach
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4">
                        <div class="pengumuman inner text-center">
                                <div id="carouselExampleControls2" class="carousel slide my-carousel" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <h2 class="text-left">{{ $pengumumans[0]->judulpengumuman }}</h2>
                                    <p><a class="text-dark" href="{{ url('detailpengumuman/' .  $pengumumans[0]->judulpengumuman) }}">{{ substr($pengumumans[0]->deskripsi,0,100) }} . . .</a></p>
                                </div>
                                @foreach($pengumumans as $key => $pengumuman)
                                @if($key > 0)
                                <div class="carousel-item">
                                  <h2 class="text-left">{{ $pengumuman->judulpengumuman }}</h2>
                                    <p><a class="text-dark" href="{{ url('detailpengumuman/' .  $pengumuman->judulpengumuman) }}">{{ substr($pengumuman->deskripsi,0,100) }}</a></p>
                                </div>
                             @endif
                             @endforeach
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         

            <section id="kotak2">
                <div class="container">
                <div class="row">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4">
                        <div class="outter">
                            <a href="{{ url('/barangdesa') }}">
                                <img src="/images/ntp-pangan.jpg" alt="">
                            <div class="inner1 d-flex flex-last">
                                <h3 class="mt-auto">PASAR ONLINE</h3>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-2">
                        <div class="outter2">
                            <a href="{{url('transparansi/apbd')}}">
                                <img src="/images/Screenshot from 2018-10-16 17-11-07.jpg" alt="">
                            <div class="inner2 d-flex flex-last">
                                <h3 class="mt-auto">DANA DESA</h3>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4">
                        <div class="outter">
                            <a href="{{url('statistik')}}">
                                <img src="/images/Grafik-Bonus-Demografi.jpg" alt="">
                            <div class="inner1 d-flex flex-last">
                                <h3 class="mt-auto">STATISTIK</h3>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-2">
                        <div class="outter2">
                            <a href="{{url('galery')}}">
                                <img src="/images/kopi.jpg" alt="">
                            <div class="inner2 d-flex flex-last">
                                <h3 class="mt-auto">GALERY</h3>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </section>

            
        </div>
</template>


<template id="bidangpemerintahan">
    <div>
        <div class="container" style="padding-top: 40px;">
            <div class="row">
                <div class="col-md-4">
                    <div class="kotak1bidangpemerintahan">
                        <ul>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(5);currentViewBidangPemerintahan='Pemerintahan'" :class="{ active : active_elcomp == 5 }">Pemerintahan</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(6);currentViewBidangPemerintahan='Kesejahteraan'" :class="{ active : active_elcomp == 6 }">Kesejahteraan</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(7);currentViewBidangPemerintahan='Pelayanan'" :class="{ active : active_elcomp == 7 }">Pelayanan</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(8);currentViewBidangPemerintahan='Tata_Usaha_dan_Umum'" :class="{ active : active_elcomp == 8 }">Tata Usaha dan Umum</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(9);currentViewBidangPemerintahan='Keuangan'" :class="{ active : active_elcomp == 9 }">Keuangan</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(10);currentViewBidangPemerintahan='Perencanaan'" :class="{ active : active_elcomp == 10 }">Perencanaan</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(11);currentViewBidangPemerintahan='Kewilayahan'" :class="{ active : active_elcomp == 11 }">Kewilayahan</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(12);currentViewBidangPemerintahan='Pembangunan'" :class="{ active : active_elcomp == 12 }">Pembangunan</a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="kotak2bidangpemerintahan">
                      <component  :is="currentViewBidangPemerintahan" class="wow fadeIn"  keep-alive></component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<template id="panduanpenduduk">
         <div class="container" style="padding-top: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="kotakpanduanpenduduk">
                        <h1>Panduan Penduduk</h1>
                        <!-- <form action="{{url('caripanduanpenduduk')}}" method="post" accept-charset="utf-8">
                              {{ csrf_field() }}
                              <input type="text"  id="search" name="search" placeholder="cari panduan" >
                              <input type="submit" value="Search" id="tombol_search_panduan">
                          </form> -->

                          <div class="cari">
                            <input type="text" name="Cari" class="cari_text"
                               v-model="caritext"
                               placeholder="Cari Panduan"/>
                          </div>
                          <ul>
                            <li v-for="panduan in caripanduans"><a v-bind:href="panduan.link" target="_blank">@{{ panduan.title }}</a></li>
                          </ul>
                        
                    </div>
                </div>
            </div>
        </div>
</template>

<template id="halamanbisnis">
    <div class="container" style="padding-top: 40px;">
        <div class="row pasaronlineslideshow">
            <div class="col-md-12">
                <div class="kotak1halamanbisnis">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row">
                            @foreach($barangdesas as $barangdesa)
                                                <div class="col-xs-6 col-6 col-sm-6 col-md-3">
                                                    <a href="{{ url('detailbarangdesa/' .  $barangdesa->id ) }}" class="tombol_produk">
                                                    <div class="card">
                                                      <img class="card-img-top" src="{{$barangdesa->urlgambar}}" alt="Card image cap">
                                                      <div class="card-body text-left">
                                                        <h5 class="card-title">{{ substr($barangdesa->nama,0,23) }}</h5>
                                                        <p class="card-text">Rp. {{$barangdesa->harga}}</p>
                                                      </div>
                                                    </div>
                                                </a>
                                                </div>
                                                @endforeach
                          </div>
                    </div>
                    <div class="carousel-item">
                      <div class="row">
                        @foreach($barangdesas2 as $barangdesa)
                                            <div class="col-xs-6 col-6 col-sm-6 col-md-3">
                                                <a href="{{ url('detailbarangdesa/' .  $barangdesa->id ) }}" class="tombol_produk">
                                                <div class="card">
                                                  <img class="card-img-top" src="{{$barangdesa->urlgambar}}" alt="Card image cap">
                                                  <div class="card-body text-left">
                                                    <h5 class="card-title">{{ substr($barangdesa->nama,0,23) }}</h5>
                                                    <p class="card-text">Rp. {{$barangdesa->harga}}</p>
                                                  </div>
                                                </div>
                                            </a>
                                            </div>
                                            @endforeach
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="row">
                        @foreach($barangdesas3 as $barangdesa)
                                            <div class="col-xs-6 col-6 col-sm-6 col-md-3">
                                              <a href="{{ url('detailbarangdesa/' .  $barangdesa->id ) }}" class="tombol_produk">
                                                <div class="card">
                                                  <img class="card-img-top" src="{{$barangdesa->urlgambar}}" alt="Card image cap">
                                                  <div class="card-body text-left">
                                                    <h5 class="card-title">{{ substr($barangdesa->nama,0,23) }}</h5>
                                                    <p class="card-text">Rp. {{$barangdesa->harga}}</p>
                                                  </div>
                                                </div>
                                                </a>
                                            </div>
                                            @endforeach
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="kotak2Ahalamanbisnis">
                <h2>Pelaku Usaha :</h2>
                <ul>
                    <li>UD Ondak Jaya (Las dan Teknologi tepat guna)</li>
                    <li>UD Kurnia (Print dan Photocopy)</li>
                </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kotak2Bhalamanbisnis">
                <h2>Panduan Bisnis</h2>
                <ul>
                    <li><a href="#">Panduan mungurus UD,CV,dan PT</a></li>
                    <li><a href="#">Panduan mengurus SIUP,dan TDP</a></li>
                    <li><a href="#">Panduan Membayar Pajak Secara Online</a></li>
                </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="kotak3Ahalamanbisnis">
                <h2>Potensi Penanaman Modal</h2>
                <ul>
                    <li><a target="_blank" href="#">Potensi Air</a></li>
                    <li><a target="_blank" href="#">Potensi Pertanian</a></li>
                    <li><a target="_blank" href="#">Potensi Wisata</a></li>
                    <li><a target="_blank" href="#">Potensi Peternakan</a></li>
                </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kotak3Bhalamanbisnis">
                <h2>Lowongan Kerja</h2>
                <ul>
                    <li><a target="_blank" href="https://id.indeed.com/">https//id.indeed.com/</a></li>
                    <li><a target="_blank" href="https://freelancer.com/">https//freelancer.com/</a></li>
                    <li><a target="_blank" href="https://glassdoor.com/">https//glassdoor.com/</a></li>
                    <li><a target="_blank" href="https://idealist.com/">https//idealist.com/</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<template id="untukpengunjung">
    <div class="container" style="padding-top: 40px;">
        <div class="row">
            <div class="col-md-4">
                <div class="kotak1Pengunjung">
                    <h3>Local Life</h3>
                    <iframe src="https://youtube.com/embed/alkEQnLee5w" width="100%" height="100%" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="kotak2APengunjung">
                        <h3>Tempat Wisata Terdekat</h3>
                        <ul>
                          <li>Zona Ekowisata Loang Pantung</li>
                          <li>Taman Nasional Gunung Rinjani</li>
                          <li>Air terjun Otak Kokok - Joben</li>
                          <li>Tete Batu</li>
                          <li>Danau Biru</li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="kotak2BPengunjung">
                        <h3>Sekolah</h3>
                        <ul>
                          <li>SDN 1 Pringgajurang</li>
                          <li>MI NW Pringgajurang</li>
                          <li>SDN 2 Pringgajurang</li>
                          <li>SDN 3 Pringgajurang</li>
                          <li>SMPN 3 Montong Gading</li>
                          <li>MTs NW Pringgajurang</li>
                          <li>MA NW Filkhoir Desa Pringgajurang</li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="kotak3APengunjung">
                            <h3>Sarana Ibadah</h3>
                            <ul>
                              <li>Masjid Hidayatussalikin Desa Pringgajurang</li>
                              <li>Masjid Pengembur</li>
                              <li>Masjid Kayulian</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="kotak3BPengunjung">
                        <h3>Pondok Pesantren</h3>
                        <ul>
                          <li>Pondok Pesantren Al Ikhsan Desa Pringgajurang</li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="kotak4Pengunjung">
                    <h3>Homestay</h3>
                    <img src="/images/photo6296362974822115431.jpg" alt="" width="100%" height="100%">
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="kotak5Pengunjung">
                        <h3>Taman Bermain</h3>
                        <ul>
                          <li>TK PKK Rinjani Pringgajurang</li>
                          <li>Embung Desa Pringgajurang</li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="kotak6Pengunjung">
                            <h3>Warung Makan</h3>
                            <ul>
                              <li>Warung Soto Pringgajurang</li>
                              <li>Nasi Kotaraja</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<template id="lembagaindex">
    <div>
        <div class="container" style="padding-top: 40px;">
            <div class="row">
                <div class="col-md-4">
                    <div class="kotak1bidangpemerintahan">
                        <ul>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(5);currentViewlembagaidex='LKMD'" :class="{ active : active_elcomp == 5 }">LKMD</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(6);currentViewlembagaidex='BPD'" :class="{ active : active_elcomp == 6 }">BPD</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(7);currentViewlembagaidex='PKK'" :class="{ active : active_elcomp == 7 }">PKK</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(8);currentViewlembagaidex='Karang_Taruna'" :class="{ active : active_elcomp == 8 }">Karang Taruna</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(9);currentViewlembagaidex='GAPOKTAN'" :class="{ active : active_elcomp == 9 }">GAPOKTAN</a></li>
                        <li><a class="bidangpemerintahan_link" href="#" :active_elcomp="active_elcomp" @click="testing(10);currentViewlembagaidex='POKDARWIS'" :class="{ active : active_elcomp == 10 }">POKDARWIS</a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="kotak2bidangpemerintahan">
                      <component  :is="currentViewlembagaidex" class="wow fadeIn"  keep-alive></component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<template id="statistikindex">
         <div class="container" style="padding-top: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="kotakpanduanpenduduk">
                        <h1>Data Desa</h1>
                        <!-- <form action="{{url('caripanduanpenduduk')}}" method="post" accept-charset="utf-8">
                              {{ csrf_field() }}
                              <input type="text"  id="search" name="search" placeholder="cari panduan" >
                              <input type="submit" value="Search" id="tombol_search_panduan">
                          </form> -->
                          <div class="cari">
                            <input type="text" name="Cari" class="cari_text"
                               v-model="caritext"
                               placeholder="Cari Data"/>
                          </div>
                          <ul>
                            <li v-for="datadesa in caridatadesas"><a v-bind:href="datadesa.link" target="_blank">@{{ datadesa.title }}</a></li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
</template>



{{-- //sub componen pemerintahan --}}
<template id="Pemerintahan">
    <div class="bidangpanel">
    <div style="overflow: auto;max-height: 400px;position: relative;">
      <table>
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Status</th>
        </tr>
      </thead>
      <tbody id="tbodytabel">
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>

      </tbody>
    </table>
    </div>
    </div>
</template>

<template id="Kesejahteraan">
     <div class="bidangpanel">
    <div style="overflow: auto;max-height: 400px;position: relative;">
      <table>
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Status</th>
        </tr>
      </thead>
      <tbody id="tbodytabel">
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>

      </tbody>
    </table>
    </div>
    </div>
</template>
<template id="Pelayanan">
     <div class="bidangpanel">
    <div style="overflow: auto;max-height: 400px;position: relative;">
      <table>
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Status</th>
        </tr>
      </thead>
      <tbody id="tbodytabel">
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>

      </tbody>
    </table>
    </div>
    </div>
</template>
<template id="Tata_Usaha_dan_Umum">
     <div class="bidangpanel">
    <div style="overflow: auto;max-height: 400px;position: relative;">
      <table>
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Status</th>
        </tr>
      </thead>
      <tbody id="tbodytabel">
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>

      </tbody>
    </table>
    </div>
    </div>
</template>
<template id="Keuangan">
     <div class="bidangpanel">
    <div style="overflow: auto;max-height: 400px;position: relative;">
      <table>
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Status</th>
        </tr>
      </thead>
      <tbody id="tbodytabel">
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>

      </tbody>
    </table>
    </div>
    </div>
</template>
<template id="Perencanaan">
     <div class="bidangpanel">
    <div style="overflow: auto;max-height: 400px;position: relative;">
      <table>
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Status</th>
        </tr>
      </thead>
      <tbody id="tbodytabel">
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>

      </tbody>
    </table>
    </div>
    </div>
</template>
<template id="Kewilayahan">
     <div class="bidangpanel">
    <div style="overflow: auto;max-height: 400px;position: relative;">
      <table>
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Status</th>
        </tr>
      </thead>
      <tbody id="tbodytabel">
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>

      </tbody>
    </table>
    </div>
    </div>
</template>
<template id="Pembangunan">
     <div class="bidangpanel">
    <div style="overflow: auto;max-height: 400px;position: relative;">
      <table>
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Status</th>
        </tr>
      </thead>
      <tbody id="tbodytabel">
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>
        <tr>
          <td>asdfghj</td>
          <td>asdfghj</td>
          <td>asdfghj</td>
        </tr>

      </tbody>
    </table>
    </div>
    </div>
</template>

<template id="LKMD">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">LKMD</h3>
      </div>
    </div>
  </div>
</template>
<template id="BPD">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">BPD</h3>
      </div>
    </div>
  </div>
</template>
<template id="PKK">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">PKK</h3>
      </div>
    </div>
  </div>
</template>
<template id="Karang_Taruna">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">Karang Taruna</h3>
      </div>
    </div>
  </div>
</template>
<template id="GAPOKTAN">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">GAPOKTAN</h3>
      </div>
    </div>
  </div>
</template>
<template id="POKDARWIS">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">POKDARWIS</h3>
      </div>
    </div>
  </div>
</template>

<template id="selayangpandang">
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 selayangpandangbody">
          <h1 class="text-uppercase text-center">Selayang Pandang</h1>
          <p>
          Desa Pringgajurang terletak di ke Kecamatan Montong Gading, Kabupaten Lombok Timur, NTB. Desa ini berada tidak jauh dari objek Wisata Otak Kokok-Joben. Desa ini dapat diakses dari Bandara Internasional Lombok, Pelabuhan Lembar, Kota Mataram, dan kota-kota lainnya melalui jalan darat yang sudah beraspal halus. Secara geografis, desa ini termasuk wilayah yang berada di dataran tinggi dengan pendapatan terbesar masyarakat dari sektor pertanian. Bentang alam yang masih asri dengan latar belakang Gunung Rinjani yang indah, menjadikan desa ini begitu menenangkan.

          Mulai tahun 2019, Desa Pringgajurang sudah menerapkan sistem informasi desa berbasis website. Dengan sistem ini, proses pendataan, perizinan, pengontrolan kinerja pegawai, transparansi, dan pengurusan administrasi lainnya dapat dilakukan secara online. Setiap kepala keluarga memiliki account sendiri yang memungkinkan mereka tetap memperbaharui data induk kependudukan mereka secara mandiri. Selai itu, sistem website desa ini dilengkapi dengan pasar online yang memungkinkan masyarakat menjajakan dagangannya. Fitur ini juga berfungsi sebagai data kolektor yang dapat memetakan potensi desa secara akurat. Selain itu, melalui website desa ini, penduduk dapat mengurus surat menyurat secara mandiri sehingga proses pengurusan administrasi menjadi jauh lebih cepat.

          Nikmati ketenangan dan keramahan kami. Temukan lokasi, makanan, produk, dan aktivitas favorit anda disini.Selamat Berselancar
        </p>
        </div>
      </div>
    </div>
  </section>
</template>

<template id="agenda">
<div class="container" style="padding-top: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="kotakagenda">
                        <h1 class="text-center">Agenda Desa</h1>
                          <div style="overflow: auto;max-height: 400px;position: relative;margin: 5px 25px;">
                            <table>
                            <thead>
                              <col width="1000px">
                              <col width="1000px">
                              <col width="1000px">
                              <tr>
                                        <th>No</th>
                                        <th>Nama Agenda</th>
                                        <th>Tanggal</th>
                              </tr>
                            </thead>
                            <tbody id="tbodytabel">
                              @php
                                $no=1
                              @endphp
                            @foreach($agendas as $agendas)
                              <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$agendas->agenda}}</td>
                                <td>{{$agendas->tgl_agenda}}</td>
                            @endforeach
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-4 text-light text-left infofooter">
                <p class="text-left"><i class="text-light fas fa-map-marker"></i> {{$template[0]->alamat_desa}}</p>
                <p class="text-left"><i class="text-light fas fa-phone"></i> {{$template[0]->no_tlp_desa}}</p>
                <p class="text-left"><i class="text-light fas fa-envelope"></i> {{$template[0]->email}}</p>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-4 Copyrightfooter">
                <br>
                <br>
                <br>
                <p class="text-light text-center">&copy; Copyright 2019 by <a class="text-light" href="https://winchy.tech">Winchy.tech</a></p>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-4">
                <br>
                <div class="tanggalfooter">
                <p class="text-light text-right" id="date"></p>
                <p class="text-light text-right" id="txt"></p>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/bootstrap-swipe-carousel.js"></script>
    <script src="{{ asset('/js/date.js') }}" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script>
    <script src="{{ asset('/vue/VueIndex.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/wow.min.js') }}" type="text/javascript"></script>
    
<script>
  const carouselEl = $('.my-carousel');

// Bootstrap carousel needs to be loaded first
carouselEl.carousel().swipeCarousel({
  sensitivity: 'high' // low, medium or high
});
</script>

  </body>
</html>