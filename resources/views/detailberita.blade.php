
@extends('layouts.layouthalamanlain')

@section('content')
<section id="detail_berita">
      <div class="container">
      <h1 class="text-center">{{ $beritas->judulberita }}</h1>
      

      <div class="row">
        <div class="col-md-12">
          @if($beritas->urlgambar != null)
            <img src="{{ $beritas->urlgambar }}" alt="">
            @endif
            @if($beritas->urlvideo != null)
               <iframe
                src="https://www.youtube.com/embed/{{$beritas->urlvideo}}">
               </iframe>
            @endif
            <p style="white-space: pre-line;white-space: pre-wrap;">{{$beritas->deskripsi }}</p><br>
             
        </div>

      </div>

     



    </div>
    </section>


  @endsection

