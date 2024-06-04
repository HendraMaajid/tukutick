@extends('layouts.app2-detailEvent')

@section('title', 'Pemenang')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
<div class="d-flex p-3" style="background-color: #094067;">

  <a href="{{ Auth::guest() ? url('/') : route('home.index')}}" class="text-decoration-none btn-outline-white"
    style="padding: 0.75rem 2rem; font-size: 1rem;float-left">
    Back</a>


  <p class=" h1 fw-bolder d-block mx-auto text-light">Pemenang</p>
</div>
<div class="container p-5">
  <p class="h1 fw-bold mb-5">Hatsune Miku Magical Mirai</p>
  <p class="fs-5 fw-normal">Berikut merupakan list pemenang untuk pre-order tiket <span>&nbsp;Hatsune Miku
      Magical Mirai</span>.</p>
  <div class="col-10 mx-auto">
    <table id="example1" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th width="10%" class="text-light" style="background-color: #094067;">No.</th>
          <th width="60%" class="text-light" style="background-color: #094067;">Username</th>
          <th width="10%" class="text-light" style="background-color: #094067;">Id Customer</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Tiger Nixon</td>
          <td>System Architect</td>
          <td>Edinburgh</td>
        </tr>
        <tr>
          <td>Garrett Winters</td>
          <td>Accountant</td>
          <td>Tokyo</td>
        </tr>
        <tr>
          <td>Ashton Cox</td>
          <td>Junior Technical Author</td>
          <td>San Francisco</td>
        </tr>
        <tr>
          <td>Cedric Kelly</td>
          <td>Senior Javascript Developer</td>
          <td>Edinburgh</td>
        </tr>
        <tr>
          <td>Airi Satou</td>
          <td>Accountant</td>
          <td>Tokyo</td>
        </tr>
        <tr>
          <td>Brielle Williamson</td>
          <td>Integration Specialist</td>
          <td>New York</td>
        </tr>
        <tr>
          <td>Herrod Chandler</td>
          <td>Sales Assistant</td>
          <td>San Francisco</td>
        </tr>
        <tr>
          <td>Rhona Davidson</td>
          <td>Integration Specialist</td>
          <td>Tokyo</td>
        </tr>
    </table>
  </div>

</div>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
$(document).ready(function() {
  $('#example1').DataTable();
});
</script>

@endsection