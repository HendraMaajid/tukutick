@extends('layouts.app2-detailEvent')
@section('title', 'Pembayaran')
@section('style')
@endsection

@section('content')
<div class="d-flex p-3" style="background-color: #094067;">
  <a href="{{route('home.index')}}" class="text-decoration-none btn-outline-white"
    style="padding: 0.75rem 2rem; font-size: 1rem;float-left">
    Back</a>
  <h1 class="h1 fw-bolder d-block mx-auto text-light">Profile</h1>
</div>
<div class="container w-full vh-100 p-5 mx-auto ">
  <div class="w-75 d-flex justify-content-between col img-thumbnail rounded-4 m-auto mt-5">
    <div class="col-3">
      <!-- Check if the user has a profile picture -->
      @if ($customer->user->profile_picture)
        <img src="{{ asset('storage/profile_pictures/' . $customer->user->profile_picture) }}" class="rounded-start-4" width="300" alt="Profile Picture">
      @else
        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-start-4" width="300" alt="Default Avatar">
      @endif
    </div>
    <div class="col-8 p-3">
      <p class="fs-5 fw-bold">Halo {{ $customer->nama_customer }}</p>
      <div class="d-flex justify-content-start col">
        <p class="col-3 fs-5">Nama</p>
        <p class="me-3 fs-5">:</p>
        <p class="col-4 fs-5">{{ $customer->nama_customer }}</p>
      </div>
      <div class="d-flex justify-content-start col">
        <p class="col-3 fs-5">Username</p>
        <p class="me-3 fs-5">:</p>
        <p class="col-4 fs-5">{{ $customer->username }}</p>
      </div>
      <div class="d-flex justify-content-start col">
        <p class="col-3 fs-5">Tanggal Lahir</p>
        <p class="me-3 fs-5">:</p>
        <p class="col-4 fs-5">{{ \Carbon\Carbon::parse($customer->tgl_lahir)->locale('id')->isoFormat('D MMMM YYYY') }}</p>
      </div>
      <div class="d-flex justify-content-start col">
        <p class="col-3 fs-5">Email</p>
        <p class="me-3 fs-5">:</p>
        <p class="col-4 fs-5">{{ $customer->email_customer }}</p>
      </div>
      <div class="d-flex justify-content-start col">
        <p class="col-9"></p>
        <button class="col-3 btn btn-primary rounded-pill" type="button" data-toggle="modal"
          data-target="#profileModal">Edit
          Profile</button>
      </div>
    </div>
  </div>

  <!-- Modal Popup untuk Update Profile -->
  <div class="modal" id="profileModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header d-flex justify-content-between">
          <h5 class="modal-title">Update Profile</h5>
          <button type="button" class="close border-0 bg-light" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal Body dengan form -->
        <!-- Modal Body dengan form -->
        <div class="modal-body">
          <form method="POST" action="{{ route('profil.update', ['profil' => $customer->id_customer]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nama">Nama :</label>
              <input type="text" class="form-control" id="nama" name="nama_customer" value="{{ $customer->nama_customer }}">
            </div><br>
            <div class="form-group">
              <label for="username">Username :</label>
              <input type="text" class="form-control" id="username" name="username" value="{{ $customer->username }}" disabled>
              <input type="hidden" name="username" value="{{ $customer->username }}">
            </div><br>
            <div class="form-group">
              <label for="imageUpload">Profile Picture:</label>
              <input type="file" class="form-control-file" id="imageUpload" name="profile_picture" accept="image/*">
            </div><br>
            <div class="form-group">
              <label for="tanggalLahir">Tanggal Lahir:</label>
              <input type="date" class="form-control" id="tanggalLahir" name="tgl_lahir" value="{{ $customer->tgl_lahir }}">
            </div><br>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email_customer" value="{{ $customer->email_customer }}">
            </div>
            <div class="m-auto pt-5 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Fungsi untuk menampilkan modal popup
function showProfileModal() {
  $('#profileModal').modal('show');
}

// Fungsi untuk mengambil data dari formulir dan melakukan update
function updateProfile() {
  // Ambil nilai dari input
  var namaLengkap = $('#namaLengkap').val();
  var alamat = $('#alamat').val();
  var Tanggal Lahir = $('#Tanggal Lahir').val();
  var tanggalLahir = $('#tanggalLahir').val();
  var email = $('#email').val();

  // Lakukan proses update profil (misalnya kirim ke server)
  // ...

  // Tutup modal setelah update
  function hideProfileModal() {
    $('#profileModal').modal('hide');
  }
}
</script>
@endsection