@extends('layouts.layouthalamanlain')

@section('content')



    <section id="barang-desa">
      <div class="container">
      <h1 class="text-center">Pasar Online Desa Pringgajurang</h1>
      <div class="row">
          <div class="col-xs-6 col-6 col-sm-6 col-md-6">
              <form action="{{url('caribarangdesa')}}" method="post" accept-charset="utf-8">
                  {{ csrf_field() }}
                  <input type="text"  id="search" name="search" placeholder="Masukan Nama Barang" ></input>
                  <input type="submit" value="Search" id="tombol_search_barang">
              </form>
          </div>
      </div>
        <div class="row">
            @foreach($barangdesas as $barangdesa)
            <div class="col-xs-6 col-6 col-sm-6 col-md-2" id="kotakbarang">
              <a href="{{ url('detailbarangdesa/' .  $barangdesa->id ) }}">
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
    </section>



@endsection