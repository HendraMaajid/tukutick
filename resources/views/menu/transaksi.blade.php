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

                    <tr class="text-center">

                      <td>1</td>
                      <td>12</td>
                      <td>Budi</td>
                      <td>20.000</td>
                      <td>23-2-2023 12:00</td>

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