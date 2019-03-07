<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/css/responsiveadminkades.css">
    <link rel="stylesheet" type="text/css" href="/css/table.css">

    <style>
      .bg-light,.tomboledit,#sidebar,.tomboladd,.tombolexportdatapenduduk:hover,.tombolhapus,#tombol_search,a#tombolbuatsurat {
        background-color: {{$template[0]->warna_navbar}}!important;
       }

       section table th{
        color: {{$template[0]->warna_navbar}}!important;
       }
    </style>

    <title>{{ $template[0]->nama_desa }}</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container-fluid">
   <a class="navbar-brand" href="{{ url('/') }}" @click="currentView='indexpage';activate(0);isHidden = false">
    <img src="/images/kabupaten-lombok-timur-ntb.png" width="40" height="auto" class="d-inline-block align-top" alt="">
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
      @guest
              <li>
                  <a href="{{ url('masuk') }}">{{ __('Login') }}</a>
              </li>
        @else
              @guest
                          <li>
                              <a href="{{ url('masuk') }}">{{ __('Login') }}</a>
                          </li>
                    @else
                          <li class="nav-item dropdown">
                               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-down" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
          @endguest
       </ul>
     </div>
   </div>
    </nav>


<div class="row" id="app">
  <div class="col-md-2">
      <nav id="sidebar" class="navbar navbar-expand-lg">
        <div class="text-center w-100" >
          <a  @click="swapIcon();" class="btn w-100 navbar-toggler" data-toggle="collapse" href="#collapsesidebar" role="button" aria-expanded="false" aria-controls="collapsesidebar">
    <div :is="currentIcon"  keep-alive></div>
  </a>
        </div>
<div class="collapse navbar-collapse" id="collapsesidebar">
        
         <ul class="sidebar_ul pd-2 text-uppercase text-left">
              <li class="nav-item">
                <a class="nav-link" @click="swapComponent('kosong');activate(1);" :class="{ active : active_el == 1 }" href="#">Data Penduduk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click="swapComponent('tabelberita');activate(2);" :class="{ active : active_el == 2 }" href="#">Data Berita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click="swapComponent('tabelpengumuman');activate(3);" :class="{ active : active_el == 3 }" href="#">Data Pengumuman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click="swapComponent('tabelakunlogindesa');activate(4);" :class="{ active : active_el == 4 }" href="#">Data Login web</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click="swapComponent('tabelSOTK');activate(5);" :class="{ active : active_el == 5 }" href="#">Data SOTK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click="swapComponent('buatsurat');activate(6);" :class="{ active : active_el == 6 }" href="#">Buat Surat</a>
              </li>

              <li class="nav-item">
                <a class="nav-link setkopsurat" @click="currentView='';" href="{{url('formsettingkopsurat')}}" >Setting Kop Surat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click="currentView='';" href="{{url('formuploadapbd/apbd')}}">Upload APBD Desa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click="currentView='';" href="{{url('formuploadapbd/rkp')}}">Upload RKP Desa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click="currentView='';" href="{{url('formuploadapbd/rpjm')}}">Upload RPJM Desa</a>
              </li>
       </ul>
     </div>
      </nav>
  </div>
  <div class="col-md-10 text-center">
    <!-- <component  :is="currentView" class="wow fadeIn"  keep-alive></component> -->
    <div :is="currentComponent" class="wow fadeIn"  keep-alive></div>
    <tabeldatapenduduk class="wow fadeIn"></tabeldatapenduduk>

</div>
</div>


<template id="tabeldatapendudukkita">
    <div>
      <section   class="section-padding">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Tabel data Penduduk Desa Pringgajurang</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-12 col-sm-6 col-md-6">
            <select id="pilihankadus" @change="showperdusun($event.target.value)">
                 <option selected="true" disabled="disabled">Dusun</option>
                 @foreach ($kode_area_dusuns as $kode_area_dusun)
                    <option value="{{ $kode_area_dusun->id_dusun }}">{{ $kode_area_dusun->Nama_Dusun }}</option>
                 @endforeach
            </select>
          </div>
          <div v-for="datadata in datapendudukjson">
            <pre>
              @{{datadata}}
            </pre>
            
          </div>


          <div class="col-xs-12 col-12 col-sm-6 col-md-6 search-posisi">
            <button id="tombol_search">Search</button>  
            <div class="search">
            <input type="text"  id="search" name="search" placeholder=". . .">              
            </div>
            <select id="filter">
                 <option selected="true" disabled="disabled">Cari Berdasarkan</option>
                  <option value="Nama">Nama</option>
                  <option value="NIK">NIK</option>
                  <option value="Nomor_kk">Nomor KK</option>
                  <option value="Pendidikan">Pendidikan</option>
                  <option value="Status_Perkawinan">status Perkawinan</option>
                  <option value="Golongan_Darah">Golongan Darah</option>
            </select>
          </div>
        </div>

      <div class="row">
      <div class="col-md-12">      
      <div style="overflow: auto;max-height: 400px;position: relative;  ">
      <table id="tabeldatakadus">
      <thead>
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <col width="1000px">
        <tr>
                  <!-- <th rowspan="2">No</th> -->
                  <th rowspan="2">Alamat</th>
                  <th rowspan="2">RW</th>
                  <th rowspan="2">RT</th>
                  <th rowspan="2">Nama</th>
                  <th rowspan="2">Nomor KK</th>
                  <th rowspan="2">Nomor NIK</th>
                  <th rowspan="2">Jenis Kelamin</th>
                  <th rowspan="2">Tempat Lahir</th>
                  <th rowspan="2">Tanggal Lahir</th>
                  <th rowspan="2">Usia</th>
                  <th rowspan="2">Agama</th>
                  <th rowspan="2">Pendidikan</th>
                  <th rowspan="2">Jenis Pekerjaan</th> 
                  <th rowspan="2">Status Perkawinan</th> 
                  <th rowspan="2">Status Hubungan Dalam Keluarga</th> 
                  <th rowspan="2">Kewarganegaraan</th> 
                  <th rowspan="2">Nama Ayah</th> 
                  <th rowspan="2">Nama Ibu</th> 
                  <th rowspan="2">Golongan Darah</th> 
                  <th rowspan="2">Akta Lahir</th> 
                  <th rowspan="2">Nomor Dokumen Paspor</th>
                  <th rowspan="2">Tanggal Akhir Paspor</th>  
                  <th rowspan="2">Nomor Dokumen KITAS</th>             
                  <th rowspan="2">NIK Ayah</th> 
                  <th rowspan="2">NIK Ibu</th> 
                  <th rowspan="2">No Akta Perkawinan</th> 
                  <th rowspan="2">Tanggal Perkawinan</th> 
                  <th rowspan="2">No Akta Perceraian</th> 
                  <th rowspan="2">Tanggal Perceraian</th> 
                  <th rowspan="2">Cacat</th> 
                  <th rowspan="2">Cara KB</th> 
                  <th rowspan="2">Hamil</th> 
                  <th rowspan="2">Status kependudukan</th> 
                  <th rowspan="2">Keterangan</th>  
                  <th rowspan="2">Tempat Mendapatkan Air Bersih</th>  
                  <th rowspan="2">Status Gizi Balita</th>  
                  <th rowspan="2">Kebiasaan Berobat Bila Sakit</th>   
                  <!-- <th colspan="5">Pendapatan Perkapita</th>    -->
                  <!-- <th colspan="5">Pendapatan Rill Keluarga</th>    -->
                  <th rowspan="2">Jumlah Penghasilan Perbulan</th>   
                  <th rowspan="2">Jumlah Pengeluaran Perbulan</th>   
                  <th rowspan="2">Sumber Air Minum</th>   
                  <th rowspan="2">Kualitas Air Minum</th>   
                  <th rowspan="2">Kualitas Ibu Hamil</th>   
                  <th rowspan="2">Kualitas Bayi</th>   
                  <th rowspan="2">Tempat Persalinan</th>   
                  <th rowspan="2">Portolongan Persalinan</th>   
                  <th rowspan="2">Cakupan Imunisasi</th>   
                  <th rowspan="2">Perilaku Hidup Bersih</th>   
                  <th rowspan="2">Pola Makan</th>
                  <th rowspan="2">Penyakit yang di derita</th>
                  <th rowspan="2">Foto KTP</th>  
                  <th rowspan="2">Foto KK</th>       
                  <th rowspan="2">edit</th> 
                  <th rowspan="2">hapus</th> 
        </tr>
     <!--    <tr>
    <th scope="col">Pertanian</th>
    <th scope="col">Perkebunan</th>
    <th scope="col">Peternakan</th>
    <th scope="col">Perikanan</th>
    <th scope="col">Kerajinan</th>
    <th scope="col">Pendapatan kepala keluarga</th>
    <th scope="col">Pendapatan selain kepala keluarga
</th>
  </tr> -->
      </thead>
       <tbody id="tbodytabel" v-model="iddusun">
        <tr></tr>
        <tr v-for="data_penduduk in datapendudukjson.slice(0,3)" >
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ no }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Alamat'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['RW'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['RT'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Nama'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Nomor_KK'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['NIK'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['jenis_kelamin'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Tempat_Lahir'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Tanggal_Lahir'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Usia'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['agama'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['pendidikan'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['jenis_pekerjaan'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['status_perkawinan'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['status_hubungan_dalam_keluarga'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['kewarganegaraan'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Nama_Ayah'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Nama_Ibu'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['golongan_darah'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Akta_Lahir'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['No_Paspor'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Tanggal_akhir_Paspor'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['No_KITAS'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['NIK_Ayah'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['NIK_Ibu'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['No_Akta_Perkawinan'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Tanggal_Perkawinan'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['No_Akta_Perceraian'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Tanggal_Perceraian'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Cacat'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Cara_KB'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Hamil'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Status_kependudukan'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['Keterangan'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['tempat_mendapatkan_air_bersih'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['status_gizi_balita'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ data_penduduk['kebiasaan_berobat_bila_sakit'] }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{""  }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ ""}}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" >@{{ "" }}</td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" ><a :href="'formeditdatapendudukkades/'+data_penduduk['NIK']+'/'+data_penduduk['Id_Dusun']">edit</a></td>
          <td v-if="data_penduduk['Id_Dusun']=iddusun" ><a :href="'deletedatapendudukkades/'+data_penduduk['NIK']+'/'+data_penduduk['Id_Dusun']">hapus</a></td>

        <!-- </tr> -->
      </tbody>
    </table>
          </div>
          <a href="#" @click="prevpage(pagination)" v-bind="pagination" class="previous">&laquo; Previous</a>
          <a href="#" @click="nextpage(pagination)" v-bind="pagination" class="next">Next &raquo;</a>
          <a href="{{url('formadddatapendudukkades')}}" class="tomboladd">Tambah Data</a>
        </div>
        </div>
      </div>
    </section>
    </div>
</template>

<template id="buatsurat">
  <div>
    <section id="buatsurat"  class="section-padding">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-left">
        <br><br><br>
         <select id="pilihsurat">
                 <option selected="true" disabled="disabled">Surat</option>
                    <option value="surat_ket_domisili">Surat Keterang Domisili</option>
                    <option value="surat_ket_pindah_penduduk">Surat Keterangan Pindah</option>
                    <option value="surat_ket_nikah">Surat Keterangan Nikah</option>
                    <option value="surat_izin_keramaian">Surat Izin Keramaian</option>
                    <option value="surat_kehendak_nikah">Surat Kehendak Nikah</option>
                    <option value="surat_ket_wali">Surat Keterangan Wali</option>
                    <option value="surat_ket_wali_hakim">Surat Keterangan Wali Hakim</option>
                    <option value="surat_persetujuan_mempelai">Surat Persetujuan Mempelai</option>
                    <option value="surat_bio_penduduk">Surat Bio Penduduk</option>
                    <option value="surat_izin_pengangkutan_kayu">Surat izin pengangkutan kayu</option>
                    <option value="surat_izin_pengangkutan_tanah_urug">Surat izin pengangkutan Tanah Urug</option>
                    <option value="surat_ket_beda_identitas_kis">Surat Keterangan Beda Identitas KIS</option>
                    <option value="surat_ket_beda_nama">Surat Keterangan Beda Nama</option>
                    <option value="surat_ket_catatan_kriminal">Surat Keterangan Catatan Kriminal</option>
                    <option value="surat_ket_cerai">Surat Keterangan Cerai</option>
                    <option value="surat_ket_domisili_usaha">Surat Keterangan Domisili Usaha</option>
                    <option value="surat_ket_harga_tanah">Surat Keterangan Harga Tanah</option>
                    <option value="surat_ket_jamkesos">Surat Keterangan Jamkesos</option>
                    <option value="surat_ket_kehilangan">Surat Keterangan Kehilangan</option>
                    <option value="surat_ket_jual_beli">Surat Keterangan Jual Beli</option>
                    <option value="surat_ket_kelakuan_baik">Surat Keterangan Kelakuan Baik</option>
                    <option value="surat_ket_kepemilikan_kendaraan">Surat Kepemilikan Kendaraan</option>
                    <option value="surat_ket_kepemilikan_tanah">Surat Kepemilikan Tanah</option>
                    <option value="surat_ket_kurang_mampu">Surat Keterangan Kurang Mampu</option>
                    <option value="surat_ket_luar_daerah">Surat Keterangan Luar daerah</option>
                    <option value="surat_ket_luar_negeri">Surat Keterangan Luar Negeri</option>
                    <option value="surat_ket_penduduk">Surat Keterangan Luar Penduduk</option>
                    <option value="surat_ket_tidak_memiliki_jamkesos">Surat Keterangan Tidak Memiliki JAMKESOS</option>
                    <option value="surat_ket_usaha">Surat Keterangan Usaha</option>
                    <option value="surat_ket_yatim">Surat Keterangan Yatim</option>
            </select>
          <input  type="text" name="NIKsurat" placeholder="NIK" id="NIKsurat">
        <a href="#" id="tombolbuatsurat">Buat Surat</a>
      </div>
    </div>
  </div>
  
</section>
  </div>
</template>


<template id="tabelberita">
  <div>
    <section id="tabelberita" class="section-padding  gray-bg">
      <div class="container-fluid">
         <h1>Tabel data Berita Desa</h1>
        <div class="row">
          <div class="col-md-12">
             <div style="overflow: auto;max-height: 400px;position: relative;  ">
                <table id="tabeldatakadus">
                <thead>
                  <col width="1000px">
                  <col width="1000px">
                  <col width="1000px">
                  <col width="1000px">
                  <tr>
                    <th>Judul Berita</th>
                    <th>Deskripsi</th>
                    <th>edit</th> 
                    <th>hapus</th> 
                  </tr>
                </thead>
                 <tbody>
                  @foreach($beritas as $berita)
                    <tr>
                      <td>{{ $berita->judulberita }}</td>
                      <td>{{ substr($berita->deskripsi,0,100) }}</td>
                      <td><a href={{ url('formeditberita/' .  $berita->id ) }}>edit</a></td>
                      <td><a href={{ url('deleteberita/' .  $berita->id ) }}>hapus</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
              <a href="{{url('formaddberita')}}" class="tomboladd">Buat Berita Baru</a>
              
                </div>
              </div>
            </div>
    </section>
  </div>
</template>

<template id="tabelpengumuman">
  <div>
    <section id="tabelpengumuman">
      <div class="container-fluid">
        <h1>Tabel data Pengumuman Desa</h1>
        <div class="row">
          <div class="col-md-12">
            <div style="overflow: auto;max-height: 400px;position: relative;  ">
                <table id="tabeldatakadus">
                <thead>
                  <col width="1000px">
                  <col width="1000px">
                  <col width="1000px">
                  <col width="1000px">
                  <tr>
                    <th>Judul Pengumuman</th>
                    <th>Deskripsi</th>
                    <th>edit</th> 
                    <th>hapus</th> 
                  </tr>
                </thead>
                 <tbody>
                  @foreach($pengumumandesas as $pengumumandesa)
                    <tr>
                      <td>{{ $pengumumandesa->judulpengumuman }}</td>
                      <td>{{ substr($pengumumandesa->deskripsi,0,100) }}</td>
                      <td><a href={{ url('formeditpengumuman/' .  $pengumumandesa->id ) }}>edit</a></td>
                      <td><a href={{ url('deletepengumuman/' .  $pengumumandesa->id ) }}>hapus</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
                <a href="{{url('formaddpengumuman')}}" class="tomboladd">Buat Pengumuman Baru</a>                      
                
          </div>
        </div>
      </div>
    </section>
  </div>
</template>


<template id="tabelSOTK">
  <div>
    <section id="profildesaadmin" class="section-padding">
      <div class="container">
        <div class="text-center">
           <h2>SOTK</h2>
         </div>
        <div class="row">
          <div class="col-md-12">
            <div style="overflow: auto;max-height: 400px;position: relative;  ">
                <table id="tabeldatakadus">
                <thead>
                  <col width="1000px">
                  <col width="1000px">
                  <col width="1000px">
                  <col width="1000px">
                  <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>edit</th> 
                    <th>hapus</th> 
                  </tr>
                </thead>
                 <tbody>
                  @foreach($SOTKs as $SOTK)
                    <tr>
                      <td>{{ $SOTK->Nama }}</td>
                      <td>{{ $SOTK->Jabatan }}</td>
                      <td><a href="{{ $SOTK->urlgambar }}">Lihat</a></td>
                      <td><a href={{ url('formeditSOTK/' .  $SOTK->id ) }}>edit</a></td>
                      <td><a href={{ url('deleteSOTK/' .  $SOTK->id ) }}>hapus</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
                <a href="{{url('formaddSOTK')}}" class="tomboladd">Tambah Data</a>                      
                
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<template id="tabelakunlogindesa">
  <div>
    <section id="dataakundesa" class="section-padding tabel5kolom  gray-bg">
      <div class="container-fluid">
         <h1>Tabel Data Akun Login Web Desa</h1>
        <div class="row">
          <div class="col-md-12">
            <div style="overflow: auto;max-height: 400px;position: relative;  ">
                <table id="tabeldatakadus">
                <thead>
                  <col width="1000px">
                  <col width="1000px">
                  <col width="1000px">
                  <col width="1000px">
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th> 
                    <th>Aktifasi</th> 
                    <th>hapus</th> 
                  </tr>
                </thead>
                 <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email}}</td>
                      <td>{{ $user->status}}</td>
                      <td><a href={{ url('aktifasiakun/' .  $user->id ) }}>aktifasi</a></td>
                      <td><a href={{ url('deleteakun/' .  $user->id ) }}>hapus</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
              
                </div>
              </div>
            </div>
    </section>
  </div>
</template>


     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="js/bootstrap-swipe-carousel.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script> -->
    <!-- <script type="text/javascript" src="{{asset('/js/script.js')}}"></script> -->
    <script src="{{ asset('/js/wow.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('/vue/vueadmin.js')}}"></script> -->
    
  </body>
</html>