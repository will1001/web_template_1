@extends('layouts.layoutform')

@section('content')



<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('edittemplate/1') }}" method="post" enctype="multipart/form-data" style="padding-top: 100px;">
          {{ csrf_field() }}
          Nama Desa:<br>
          <input type="text" name="nama_desa" value="{{ $template->nama_desa }}"><br><br>
          Ukuran Font Nama Desa:<br>
          <input type="text" name="font_size_nama_desa" value="{{ $template->font_size_nama_desa }}"><br><br>
          Alamat Desa:<br>
          <input type="text" name="alamat_desa" value="{{ $template->alamat_desa }}"><br><br>
          Email Desa:<br>
          <input type="text" name="email" value="{{ $template->email }}"><br><br>
          Nomor Telepon Desa:<br>
          <input type="text" name="no_tlp_desa" value="{{ $template->no_tlp_desa }}"><br><br>
          Background : <br><br>
          <input type="file" name="background" id="background">
          <br><br>
          Warna Navbar : 
          <input type="color" name="warna_navbar" id="warna_navbar" value="{{$template->warna_navbar}}">
          <br><br>
          <input type="submit" value="Submit">
        </form>
       @if ($errors->any())
        <h3 class="text-center text-danger">{{ implode('', $errors->all(':message')) }}</h3>
        @endif
    </div>
  </div>
</div>


@endsection



    
        
