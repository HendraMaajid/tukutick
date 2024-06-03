<!-- resources/views/winners/index.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Pemenang')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Daftar Pemenang</h1>
      @include('../layouts.app.successAlert')
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12 w-100">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Daftar Pemenang</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pemenang</th>
                      <th>Nama Event</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($winners as $winner)
                    <tr>
                      <td>{{ ($winners->currentPage() - 1) * $winners->perPage() + $loop->iteration }}</td>
                      <td>{{ $winner->nama_pemenang }}</td>
                      <td>{{ $winner->event->nama_event }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <!-- Pagination Links -->
              {{ $winners->links('vendor.pagination.bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
