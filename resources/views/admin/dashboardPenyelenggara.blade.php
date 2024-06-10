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
                10
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
                Rp. 15.000.000,00
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
                1,201
              </div>
            </div>
          </div>
        </div>
      </div>

      <h2 class="section-title">Gacha Tickets</h2>
      <div class="row">
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h4>Konser NOAH</h4>
            </div>
            <div class="card-body">
              <p>Pre-Orders: 20</p>
              <p>Tickets: 5</p>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button class="btn btn-primary">Gacha</button>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h4>Konser NOAH</h4>
            </div>
            <div class="card-body">
              <p>Pre-Orders: 20</p>
              <p>Tickets: 5</p>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button class="btn btn-primary">Gacha</button>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h4>Konser NOAH</h4>
            </div>
            <div class="card-body">
              <p>Pre-Orders: 20</p>
              <p>Tickets: 5</p>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button class="btn btn-primary">Gacha</button>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h4>Konser NOAH</h4>
            </div>
            <div class="card-body">
              <p>Pre-Orders: 20</p>
              <p>Tickets: 5</p>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button class="btn btn-primary">Gacha</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection