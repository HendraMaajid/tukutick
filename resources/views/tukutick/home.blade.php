@extends('layouts.app2')

@section('title', 'Tukutick')

@section('style')
  <style>
    
    .bg-image {
      height: 100vh;
      overflow: hidden;
      background-image: url('{{ asset('assets/img/img_tukutick/pexels-jibarofoto-2014775.jpg') }}');
      background-size: cover;
      background-position: center;
    }
    .event-card {
      transition: all 0.3s ease;
      transform: translateY(0);
    }

    .event-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }

    .event-card:hover .event-image {
      transform: scale(1.05);
    }

    .event-card:hover .event-arrow {
      opacity: 1 !important;
      transition: opacity 0.3s ease;
    }

    .event-card:hover .card-title {
      color: #094067 !important;
      transition: color 0.3s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .display-4 {
        font-size: 2.5rem;
      }

      .event-image {
        height: 200px !important;
      }

      .card-body {
        padding: 1.25rem !important;
      }
    }

    /* Custom scrollbar for long descriptions */
    .card-text {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Pulse animation for date badge */
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    .event-card:hover .position-absolute.top-0.start-0 > div {
      animation: pulse 2s infinite;
    }

  /* Hover effects for process cards */
  .text-center.h-100:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
  }

  .text-center.h-100:hover .rounded-circle {
    transform: scale(1.1);
    transition: transform 0.3s ease;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .display-4 {
      font-size: 2.5rem;
    }

    .lead {
      font-size: 1.1rem;
    }
  }

  /* Custom button hover effects */
  .btn-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 193, 7, 0.3);
  }

  .btn-outline-light:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2);
  }

  .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        transform: translateY(-1px);
        transition: all 0.2s ease;
    }

    /* Smooth transitions */
    .form-control,
    .form-select,
    .btn {
        transition: all 0.2s ease;
    }

    /* Button hover effect */
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .col-md-2 .btn span {
            display: none !important;
        }
        
        .col-md-2 .btn {
            padding: 0.75rem;
        }
        
        /* Stack vertically on very small screens */
        .row.g-3 {
            --bs-gutter-x: 0.5rem;
        }
    }
    /* Placeholder styling */
    .form-control::placeholder {
        color: #6c757d;
        opacity: 0.8;
    }

    /* Date input styling improvement */
    input[type="date"]::-webkit-calendar-picker-indicator {
        border-radius: 3px;
        color: white;
        cursor: pointer;
    }
  </style>
  {{-- <style>
  .img-card {
  width: 100% !important;
  height: 200px !important;
  object-fit: cover !important;
  }

  /* Untuk Chrome, Safari, Edge */
  input[type="date"]::-webkit-calendar-picker-indicator {
  filter: invert(100%);
  cursor: pointer;
  }

  /* Untuk Firefox */
  input[type="date"] {
  filter: invert(0%);
  }


  .custom-select {
  position: relative;
  width: 100%;
  max-width: 300px;
  appearance: none;
  background-color: #ffffff;
  border: 1px solid #ced4da;
  padding: 6px 12px;
  cursor: pointer;
  padding: 0px 10px !important;
  }

  .custom-select option {
  color: #000000 !important;

  }

  .custom-select.opened {
  color: #000000 !important;
  }

  .search-form .input-group input[type="text"] {
  width: 300px;
  padding: 10px;
  border-radius: 5px;
  font-size: 16px;
  outline: none !important;
  transition: border-color 0.3s ease-in-out;
  }
  </style> --}}
@endsection

@section('content')
    <section id="home">
      <div class="w-100 d-flex align-items-center bg-image">
        <div class="d-flex flex-column w-50" style="padding: 0 150px;">
          <h1 class="mb-3 fs-1 fw-bold text-white">Welcome to Tukutick</h1>
          <p class="fs-5 text-white" style="color: #094067; text-align: justify ;">
          "Welcome to Tukutick – Your Ultimate Destination to Discover and Preorder Concert Tickets with Ease. Say Goodbye to
          Scalpers and Hello to Secure, Fair-Priced Tickets!"
          </p>
          <a href="{{ route('event.index') }}" class="btn btn-primary w-25 fw-bold" style="background-color: #094067; border-color: #094067;">Explore Events</a>
        </div>
      </div>
    {{-- <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
    @foreach($featuredEvents as $key => $event)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" 
    class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" 
    aria-label="Slide {{ $key + 1 }}"></button>
    @endforeach
    </div>

    <div class="carousel-inner">
    @foreach($featuredEvents as $key => $event)
    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
    <img src="{{ asset('storage/events/' . $event->gambar) }}" class="d-block w-100" alt="{{ $event->nama_event }}">
    <div class="carousel-caption d-none d-md-block">
    <h5>{{ $event->nama_event }}</h5>
    <p>{{ \Carbon\Carbon::parse($event->tgl_event)->format('d M Y') }}</p>
    </div>
    </div>
    @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
    </div> --}}
    </section>

    <!-- section search -->
    <section style="margin-top:-1.3rem;">
    {{-- <div class="search-form-container">
    <form class="search-form" action="{{ route('landing.search') }}" method="POST">
    @csrf
    <div class="input-group">
    <label for="">Search Event</label>
    <input type="text" placeholder="Search Event" value="" name="judul">
    </div>
    <div class="input-group">
    <label for="">Category</label>
    <select name="kategori" class="custom-select">
    <option value="" selected>All</option>
    @foreach ($kategori as $items)
    <option value="{{ $items->id_kategori }}">{{ $items->nama_kategori }}</option>
    @endforeach
    </select>
    </div>
    <div class="input-group">
    <label for="">Date</label>
    <input type="date" value="" name="tanggal" class="custom-date-input">
    </div>
    </form>
    </div> --}}
    </section>

    <!-- Section Upcoming Event -->

    <section id="event" >
    <div class="container-fluid bg-light py-5">
      <div class="container">
        <!-- Header Section -->
        <div class="text-center mb-5">
          <h1 class="display-4 fw-bold mb-3" style="color: #094067">Upcoming Events</h1>
          <p class="lead text-muted">Discover amazing events happening near you</p>
          <div class="d-inline-block" style="height: 4px; width: 60px; border-radius: 2px; background-color: #094067;"></div>
        </div>
        <!-- Search Form -->
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <form id="searchForm" action="{{ route('home.search') }}" method="POST" class="bg-white rounded-4 shadow-sm p-4 border">
                        @csrf
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <input type="text"
                                      class="form-control form-control-lg"
                                      placeholder="Search events..."
                                      name="judul"
                                      id="judulInput"
                                      value="{{ request('judul') }}">
                            </div>

                            <div class="col-md-3">
                                <select name="kategori" class="form-select form-select-lg" id="kategoriSelect">
                                    <option value="" selected>All Categories</option>
                                    @foreach ($kategori as $items)
                                        <option value="{{ $items->id_kategori }}" {{ request('kategori') == $items->id_kategori ? 'selected' : '' }}>
                                            {{ $items->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input type="date"
                                      class="form-control form-control-lg"
                                      name="tanggal"
                                      id="tanggalInput"
                                      value="{{ request('tanggal') }}">
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-lg w-100 d-flex align-items-center justify-content-center" style="background-color: #094067; color: white;">
                                    <i class="bi bi-search me-2"></i>
                                    <span class="d-none d-lg-inline">Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="eventsGrid" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($events as $event)
                <div class="col">
                    <a class="text-decoration-none" href="{{ route('event.show', $event->id_event) }}">
                        <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative event-card">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ asset('storage/events/' . $event->gambar) }}"
                                    class="card-img-top img-fluid event-image"
                                    alt="{{ $event->nama_event }}"
                                    style="height: 220px; object-fit: cover; transition: transform 0.3s ease;">

                                <div class="position-absolute top-0 start-0 m-3">
                                    <div class="bg-white rounded-3 shadow-sm p-2 text-center" style="min-width: 50px;">
                                        <div class="text-primary fw-bold small">{{ \Carbon\Carbon::parse($event->tgl_event)->format('M') }}</div>
                                        <div class="h5 fw-bold mb-0 text-dark">{{ \Carbon\Carbon::parse($event->tgl_event)->format('d') }}</div>
                                    </div>
                                </div>

                                <div class="position-absolute bottom-0 start-0 w-100 h-50"
                                    style="background: linear-gradient(transparent, rgba(0,0,0,0.3));"></div>
                            </div>

                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold text-dark mb-3 lh-base">{{ $event->nama_event }}</h5>

                                <p class="card-text text-muted mb-3" style="font-size: 0.9rem; line-height: 1.6;">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($event->deskripsi_event), 120) !!}
                                </p>

                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->tgl_event)->format('l, F j, Y') }}</span>
                                </div>
                            </div>

                            <div class="position-absolute bottom-0 end-0 m-3 opacity-0 event-arrow">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 35px; height: 35px;">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div id="emptyState" class="text-center py-5" style="{{ $events->isEmpty() ? '' : 'display: none;' }}">
            <div class="mb-4">
                <i class="bi bi-calendar-x display-1 text-muted"></i>
            </div>
            <h3 class="fw-bold text-muted mb-3">No Events Found</h3>
            <p class="text-muted">Check back later for upcoming events!</p>
        </div>

        <div id="loadingSpinner" class="text-center py-5" style="display: none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="text-muted mt-3">Loading events...</p>
        </div>
      <div style="margin-bottom: 100px"></div>
    </div>
    {{-- <div class="container" style="padding:7rem">
    <p class="h2 fw-bold mb-5">Upcoming Events</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($events as $event)
    <a class="text-decoration-none" href="{{route('event.show', $event->id_event)}}">
    <div class="col">
    <div class="card h-100 rounded-4">
    <img src="{{ asset('storage/events/' . $event->gambar) }}"
    class="card-img-top rounded-top-4 img-fluid img-card" alt="{{ $event->nama_event }}">
    <div class="card-body row">
    <div class="col-2">
    <p class="fw-bold" style="color:#3D37F1">{{ \Carbon\Carbon::parse($event->tgl_event)->format('M') }}
    </p>
    <p class="h5 fw-bolder" style="margin-top:-1.2rem">
    {{ \Carbon\Carbon::parse($event->tgl_event)->format('d') }}</p>
    </div>
    <div class="col-10">
    <h5 class="card-title fw-bold">{{ $event->nama_event }}</h5>
    <p id="card-description" class="card-text" data-full-text="{{ $event->deskripsi_event }}">
    {!! \Illuminate\Support\Str::limit($event->deskripsi_event, 100) !!}</p>
    </div>
    </div>
    </div>
    </div>
    </a>
    @endforeach
    </div>
    </div> --}}

    </section>
    <!-- Section About -->
    <section id="about" class="bg-light" style="padding-bottom: 120px">
      <!-- Mission Section -->
      <div class="py-5" style="background-color: #EEF7FF">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
              <h3 class="h2 fw-bold text-dark mb-4">Our Mission</h3>
              <p class="lead text-muted">TukuTick hadir untuk menciptakan ekosistem jual beli tiket yang adil dan transparan, memberikan kesempatan yang sama bagi semua pecinta musik dan entertainment untuk menikmati event favorit mereka.</p>
            </div>
          </div>

          <!-- How It Works -->
          <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3">
              <div class="text-center h-100">
                <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                  <i class="bi bi-clock-fill text-white h3 mb-0"></i>
                </div>
                <h5 class="fw-bold mb-3">Pre-Order System</h5>
                <p class="text-muted">Daftarkan diri Anda untuk event yang diinginkan dengan sistem pre-order yang mudah dan aman.</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="text-center h-100">
                <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                  <i class="bi bi-dice-3-fill text-white h3 mb-0"></i>
                </div>
                <h5 class="fw-bold mb-3">Fair Gacha System</h5>
                <p class="text-muted">Sistem gacha yang adil memberikan kesempatan yang sama untuk semua peserta tanpa diskriminasi.</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="text-center h-100">
                <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                  <i class="bi bi-shield-fill text-white h3 mb-0"></i>
                </div>
                <h5 class="fw-bold mb-3">Anti-Scalping</h5>
                <p class="text-muted">Mencegah praktik calo dengan sistem yang transparan dan pembayaran setelah menang gacha.</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="text-center h-100">
                <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                  <i class="bi bi-credit-card-fill text-white h3 mb-0"></i>
                </div>
                <h5 class="fw-bold mb-3">Pay When Win</h5>
                <p class="text-muted">Bayar hanya ketika Anda memenangkan gacha, tidak ada biaya tersembunyi atau pembayaran di muka.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Problem & Solution -->
      <div class="py-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <div class="pe-lg-4">
                <h3 class="h2 fw-bold text-dark mb-4">The Problem We Solve</h3>

                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3">
                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                      <i class="bi bi-x-circle-fill text-white"></i>
                    </div>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-2">Praktik Calo (Scalping)</h5>
                    <p class="text-muted mb-0">Calo membeli tiket dalam jumlah besar dan menjualnya dengan harga yang tidak wajar, merugikan fans sejati.</p>
                  </div>
                </div>

                <div class="d-flex mb-4">
                  <div class="flex-shrink-0 me-3">
                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                      <i class="bi bi-person-x-fill text-white"></i>
                    </div>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-2">Kesempatan Tidak Adil</h5>
                    <p class="text-muted mb-0">System first-come-first-served membuat yang memiliki koneksi internet cepat atau bot mendapat keuntungan.</p>
                  </div>
                </div>

                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                      <i class="bi bi-currency-dollar text-white"></i>
                    </div>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-2">Harga Tidak Transparan</h5>
                    <p class="text-muted mb-0">Harga tiket sering kali mengalami markup yang tidak masuk akal karena manipulasi pasar.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="rounded-4 p-5 text-white position-relative overflow-hidden" style="background-color: #13507c">
                <h3 class="h2 fw-bold mb-4">Our Solution</h3>

                <div class="mb-4">
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check-circle-fill text-warning me-3 h5 mb-0"></i>
                    <h5 class="fw-bold mb-0">Equal Opportunity</h5>
                  </div>
                  <p class="mb-0 ps-4">Sistem gacha memberikan kesempatan yang sama untuk semua peserta, tanpa memandang kecepatan internet atau koneksi.</p>
                </div>

                <div class="mb-4">
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check-circle-fill text-warning me-3 h5 mb-0"></i>
                    <h5 class="fw-bold mb-0">Transparent Pricing</h5>
                  </div>
                  <p class="mb-0 ps-4">Harga tiket tetap sesuai dengan harga resmi dari penyelenggara, tanpa markup berlebihan.</p>
                </div>

                <div>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check-circle-fill text-warning me-3 h5 mb-0"></i>
                    <h5 class="fw-bold mb-0">Risk-Free Pre-Order</h5>
                  </div>
                  <p class="mb-0 ps-4">Tidak perlu khawatir kehilangan uang, karena pembayaran hanya dilakukan setelah memenangkan gacha.</p>
                </div>

                <!-- Background decoration -->
                <div class="position-absolute top-0 end-0 opacity-10">
                  <i class="bi bi-stars" style="font-size: 8rem;"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
        const searchForm = $('#searchForm');
        const judulInput = $('#judulInput');
        const kategoriSelect = $('#kategoriSelect');
        const tanggalInput = $('#tanggalInput');
        const eventsGrid = $('#eventsGrid');
        const emptyState = $('#emptyState');
        const loadingSpinner = $('#loadingSpinner');

        // Function to render events
        function renderEvents(events) {
            eventsGrid.empty();
            if (events.length > 0) {
                emptyState.hide();
                events.forEach(function(event) {
                    const eventCard = `
                        <div class="col">
                            <a class="text-decoration-none" href="${event.route_show}">
                                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative event-card">
                                    <div class="position-relative overflow-hidden">
                                        <img src="${event.gambar}"
                                            class="card-img-top img-fluid event-image"
                                            alt="${event.nama_event}"
                                            style="height: 220px; object-fit: cover; transition: transform 0.3s ease;">
                                        <div class="position-absolute top-0 start-0 m-3">
                                            <div class="bg-white rounded-3 shadow-sm p-2 text-center" style="min-width: 50px;">
                                                <div class="text-primary fw-bold small">${event.tgl_event_month}</div>
                                                <div class="h5 fw-bold mb-0 text-dark">${event.tgl_event_day}</div>
                                            </div>
                                        </div>
                                        <div class="position-absolute bottom-0 start-0 w-100 h-50"
                                            style="background: linear-gradient(transparent, rgba(0,0,0,0.3));"></div>
                                    </div>
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold text-dark mb-3 lh-base">${event.nama_event}</h5>
                                        <p class="card-text text-muted mb-3" style="font-size: 0.9rem; line-height: 1.6;">
                                            ${event.deskripsi_event}
                                        </p>
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="bi bi-calendar-event me-2"></i>
                                            <span>${event.tgl_event_full}</span>
                                        </div>
                                    </div>
                                    <div class="position-absolute bottom-0 end-0 m-3 opacity-0 event-arrow">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 35px; height: 35px;">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                    eventsGrid.append(eventCard);
                });
            } else {
                emptyState.show();
            }
        }

        let searchTimeout;
        function performSearch() {
            clearTimeout(searchTimeout);

            searchTimeout = setTimeout(function() {
                // Show loading state
                loadingSpinner.show();
                eventsGrid.hide();
                emptyState.hide();

                // Get CSRF token from meta tag or form
                const csrfToken = $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val();

                $.ajax({
                    url: searchForm.attr('action'), // Use the form's action attribute
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    data: {
                        judul: judulInput.val(),
                        kategori: kategoriSelect.val(),
                        tanggal: tanggalInput.val(),
                        _token: csrfToken
                    },
                    success: function(response) {
                        loadingSpinner.hide();
                        eventsGrid.show();
                        
                        if (response.events) {
                            renderEvents(response.events);
                        } else {
                            console.error("No events data in response");
                            emptyState.show();
                        }
                    },
                    error: function(xhr, status, error) {
                        loadingSpinner.hide();
                        eventsGrid.show();
                        
                        console.error("AJAX Error: ", xhr.responseText);
                        console.error("Status: ", status);
                        console.error("Error: ", error);
                        
                        // Show error message to user
                        alert('Terjadi kesalahan saat mencari. Silakan coba lagi.');
                    }
                });
            }, 500); // Wait 500ms after user stops typing
        }

        // Event listeners for live search
        judulInput.on('input', performSearch); // Changed from 'keyup' to 'input'
        kategoriSelect.on('change', performSearch);
        tanggalInput.on('change', performSearch);

        // Prevent form submission to avoid page reload
        searchForm.on('submit', function(e) {
            e.preventDefault();
            performSearch();
            return false;
        });

        // Handle empty search - show all events
        function checkEmptySearch() {
            if (judulInput.val() === '' && kategoriSelect.val() === '' && tanggalInput.val() === '') {
                // If all fields are empty, load all events
                loadAllEvents();
            }
        }
        
        // Function to load all events (initial state)
        function loadAllEvents() {
            loadingSpinner.show();
            eventsGrid.hide();
            emptyState.hide();
            
            const csrfToken = $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val();
            
            $.ajax({
                url: "{{ route('home.events') }}", // Create this route for loading all events
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    loadingSpinner.hide();
                    eventsGrid.show();
                    
                    if (response.events) {
                        renderEvents(response.events);
                    } else {
                        emptyState.show();
                    }
                },
                error: function(xhr, status, error) {
                    loadingSpinner.hide();
                    eventsGrid.show();
                    console.error("Error loading events: ", error);
                }
            });
        }
        
        // Check for empty search on input change
        judulInput.on('input', function() {
            checkEmptySearch();
        });
        
        // Clear search functionality
        $(document).on('click', '.clear-search', function() {
            judulInput.val('');
            kategoriSelect.val('');
            tanggalInput.val('');
            loadAllEvents();
        });
    });
  </script>
@endsection