@extends('layouts.app')
@section('title', 'Dashboard Admin')
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
                <h4>Categories</h4>
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
              <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Customer</h4>
              </div>
              <div class="card-body">
                1203
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-user-tie"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Organizer</h4>
              </div>
              <div class="card-body">
                12
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection