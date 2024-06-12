@extends('layouts.app')

@section('title', 'Pre-Orders')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Customer</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12  w-100">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Customer</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr class="text-center">
                      <th>No.</th>
                      <th>ID Cust</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Tanggal Lahir</th>
                      <th>No. Hp</th>
                    </tr>

                    @php
                      $nomor=1;
                    @endphp
                    @foreach ($customers as $customer)
                      <tr class="text-center">
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $customer->id_customer }}</td>
                        <td>{{ $customer->nama_customer }}</td>
                        <td>{{ $customer->username }}</td>
                        <td>{{ $customer->email_customer }}</td>
                        <td>{{ \Carbon\Carbon::parse($customer->tgl_lahir)->format('j-n-Y') }}</td>
                        <td>{{ $customer->no_hp_customer }}</td>
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