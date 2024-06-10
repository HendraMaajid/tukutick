@extends('layouts.app')

@section('title', 'Pre-Orders')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pre-Order</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12  w-100">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Daftar Pre-Order</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr class="text-center">
                      <th>No.</th>
                      <th>ID Pemenang</th>
                      <th>Username</th>
                      <th>Nama Event</th>
                    </tr>

                    @php
                      $nomor=1;
                    @endphp

                    @foreach ($pemenang as $data)
                      <tr class="text-center">
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $data->id_pemenang }}</td>
                        <td>{{ $data->customer->nama_customer }}</td>
                        <td>{{ $data->event->nama_event }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <div class="card-footer text-right">
                <!-- Pagination Links -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
@endsection