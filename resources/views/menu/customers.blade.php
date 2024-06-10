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
                    <tr class="text-center">
                      <td>1</td>
                      <td>12</td>
                      <td>Budi</td>
                      <td>Budigaming</td>
                      <td>budi@gmail.com</td>
                      <td>12-12-2012</td>
                      <td>081234567890</td>
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