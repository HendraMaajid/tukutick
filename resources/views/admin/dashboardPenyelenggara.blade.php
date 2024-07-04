@extends('layouts.app')
@section('title', 'Dashboard Penyelenggara')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-calendar-check"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Events</h4>
              </div>
              <div class="card-body">
                {{ $events->count() }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Transactions</h4>
              </div>
              <div class="card-body">
                Rp. {{ $totalRevenue }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-ticket-alt"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Tickets Sold</h4>
              </div>
              <div class="card-body">
                {{ $totalTicketsSold }}
              </div>
            </div>
          </div>
        </div>
      </div>

      <h2 class="section-title">Gacha Tickets</h2>

      <div class="row">
        @foreach ($events as $data)
          <div class="col-3">
            <div class="card">
            <div class="card-header">
              <h4>{{ $data->nama_event }}</h4>
            </div>
            <div class="card-body">
              @php
        $jml_po = \App\Models\Preorder::where('id_event', $data->id_event)->count();
        @endphp
              <p>Pre-Orders: {{ $jml_po }}</p>
              <p>Tickets: {{ $data->jml_ticket }}</p>
            </div>
            <div class="card-footer d-flex justify-content-center">
              @if ($data->jml_ticket > 0)
          <button class="btn btn-primary gacha-button"
          data-url="{{ route('gacha', ['id_event' => $data->id_event, 'jml_ticket' => $data->jml_ticket, 'jml_po' => $jml_po]) }}">
          Gacha
          </button>
        @else
        <button class="btn btn-secondary pe-none" style="cursor:not-allowed" disabled>Gacha</button>
      @endif
            </div>
            </div>
          </div>
    @endforeach
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const gachaButtons = document.querySelectorAll('.gacha-button');

  gachaButtons.forEach(button => {
    button.addEventListener('click', function() {
      const gachaUrl = button.getAttribute('data-url');

      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to proceed with the gacha?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: 'success',
            title: 'Gacha Successful',
            text: 'You have successfully performed the gacha!',
          }).then(() => {
            // Redirect to the gacha URL
            window.location.href = gachaUrl;
          });
        }
      });
    });
  });
});
</script>
@endsection