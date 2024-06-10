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
                {{ $event->count() }}
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
        @foreach ($event as $data)
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
              <button class="btn btn-primary">Gacha</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</div>
@endsection