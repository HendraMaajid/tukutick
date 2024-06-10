@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transaksi</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12  w-100">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Daftar Transaksi</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr class="text-center">
                      <th>No.</th>
                      <th>ID Transaksi</th>
                      <th>Username</th>
                      <th>Jumlah Transaksi</th>
                      <th>Waktu Pembayaran</th>
                    </tr>

                    @php
                      $nomor=1;
                    @endphp

                    @foreach ($transaksi as $data)
                      <tr class="text-center">
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $data->id_transaksi }}</td>
                        <td>{{ $data->pemenang->customer->nama_customer }}</td>
                        <td>{{ $data->jml_transaksi }}</td>
                        <td>{{ $data->created_at->format('j-n-Y H.i') }}</td>
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