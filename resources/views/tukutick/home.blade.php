@extends('layouts.app2')

@section('title', 'Tukutick')

@section('content')
<section id="home">
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('assets/img/img_tukutick/NOAH.png')}}" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('assets/img/img_tukutick/coldplay.jpg')}}" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('assets/img/img_tukutick/miku.svgp')}}" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<!-- Section About -->
<section id="about" style="background-color:#FFFFEC; height:100vh">
  <div class="container p-5">
    <div class="h2 fw-bold ms-4 ps-5 my-4">About</div>
    <div class="row mt-4 justify-content-around ">
      <div class="col-4">
        <img src="{{asset('assets/img/img_tukutick/about-img.svg')}}" alt="">
      </div>
      <p class="col-6 p-3" style="color:#3094067">
        Selamat datang di <span class="text-danger">TukuTick</span>, platform pemesanan tiket acara yang menghadirkan
        pengalaman tak
        terlupakan dalam mengakses event-event kesukaan Anda!<span class="text-danger">TukuTick</span> diciptakan dengan
        satu
        tujuan utama: mempermudah pengguna dalam menemukan, memesan, dan menikmati beragam acara kesenian
        dan hiburan tanpa ribet.
        <br><br>
        Di <span class="text-danger">TukuTick</span>, kami memahami bahwa setiap momen di kehidupan Anda layak untuk
        dirayakan dengan cara
        yang istimewa. Itulah mengapa kami menawarkan beragam pilihan acara mulai dari konser musik,
        pertunjukan teater, festival budaya, hingga acara olahraga, semuanya hanya dalam genggaman Anda.
        <br><br>
        Apa yang membedakan <span class="text-danger">TukuTick</span> dari yang lain adalah kemudahan dan kecepatan
        dalam proses pemesanan.
        Dengan antarmuka yang ramah pengguna, Anda dapat dengan cepat menjelajahi berbagai acara, melihat
        detail lengkapnya, dan memesan tiket hanya dalam beberapa klik. Kami juga menyediakan berbagai opsi
        pembayaran yang aman dan fleksibel untuk memastikan pengalaman transaksi yang lancar.
      </p>
    </div>
  </div>
</section>

<!-- section search -->
<section style="margin-top:-1.3rem;">
  <div class="search-form-container">
    <form class="search-form" action="" method="">
      <div class="input-group">
        <label for="">Search Event</label>
        <input type="text" placeholder="Search Event" value="Konser pop">
      </div>
      <div class="input-group">
        <label for="">Category</label>
        <select>
          <option value="All" selected>All</option>
        </select>
      </div>
      <div class="input-group">
        <label for="">Date</label>
        <select>
          <option value="Any date" selected>Any date</option>
        </select>
      </div>
    </form>
  </div>
</section>

<!-- Section Upcoming Event -->

@php
  use App\Models\Event;

  $events = Event::all();
@endphp
<section id="event" class="" style="background-color:#EEF7FF;margin-top:-4rem;">
  <div class="container" style="padding:7rem">
    <p class="h2 fw-bold mb-5">Upcoming Events</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach($events as $event)
      <a class="text-decoration-none" href="{{route('event.show', $event->id_event)}}">
      <div class="col">
        <div class="card h-100 rounded-4">
        <img src="{{ asset('storage/events/' . $event->gambar) }}" class="card-img-top rounded-top-4"
          alt="{{ $event->nama_event }}">
        <div class="card-body row">
          <div class="col-2">
          <p class="fw-bold" style="color:#3D37F1">{{ \Carbon\Carbon::parse($event->tgl_event)->format('M') }}
          </p>
          <p class="h5 fw-bolder" style="margin-top:-1.2rem">
            {{ \Carbon\Carbon::parse($event->tgl_event)->format('d') }}</p>
          </div>
          <div class="col-10">
          <h5 class="card-title fw-bold">{{ $event->nama_event }}</h5>
          <p class="card-text">{!! $event->deskripsi_event !!}</p>
          </div>
        </div>
        </div>
      </div>
      </a>
    @endforeach
    </div>
  </div>

</section>

@endsection