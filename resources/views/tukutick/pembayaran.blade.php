@extends('layouts.app2-detailEvent')
@section('title', 'Pembayaran')
@section('content')
<div class="d-flex p-3" style="background-color: #094067;">
  <a href="{{ Auth::guest() ? url('/') : route('home.index')}}" class="text-decoration-none btn-outline-white"
    style="padding: 0.75rem 2rem; font-size: 1rem;float-left">
    Back</a>
  <h1 class="h1 fw-bolder d-block mx-auto text-light">Pembayaran</h1>
</div>
<div class="container col-5 p-4 mt-5 mb-5 m-auto bg-light rounded-4 shadow">
  <h2 class="fs-2 fw-bold text-center mb-5" style="color:#094067">Form Pembayaran</h2>
  <div class="border-bottom mb-4">
    <h3 class="fw-bold">Informasi Pembayaran</h3>
  </div>
  <form action="{{ route('transaksi.store') }}" method="POST" id="payment-form">
    @csrf
    <div class="mb-5">
      <label for="metode_pembayaran" class="form-label fw-bold" style="color:#094067">Pilih Metode Pembayaran</label>
      <select class=" form-select shadow-sm" id="metode_pembayaran" name="metode_pembayaran" required>
        <option selected>Pilih...</option>
        <option value="1">Dana</option>
        <option value="2">Gopay</option>
        <option value="3">Shopee Pay</option>
        <option value="4">Ovo</option>
        <option value="5">Link Aja</option>
      </select>
    </div>
    <div class="border-bottom mb-4">
      <h3 class="fw-bold" style="color:#094067">Informasi Billing</h3>
    </div>
    <div class=" mb-3">
      <label for="namalengkap" class="form-label fw-bold" style="color:#094067">Nama Lengkap</label>
      <input type="text" class="form-control " value="{{ $customer->nama_customer }}" disabled />
    </div>
    <div class="mb-5">
      <label for="email" class="form-label fw-bold" style="color:#094067">Email</label>
      <input type="email" class="form-control" value="{{ $customer->email_customer }}" disabled />
    </div>
    <div class="mb-5">
      <label for="id_pemenang" class="form-label fw-bold" style="color:#094067" hidden>ID_Pemenang</label>
      <input type="number" name="id_pemenang" class="form-control" value="{{ $id_pemenang }}" hidden />
    </div>
    <div class="mb-5">
      <label for="jml_transaksi" class="form-label fw-bold" style="color:#094067" hidden>jml_transaksi</label>
      <input type="number" name="jml_transaksi" class="form-control" value="{{ $event->hrg_ticket }}" hidden />
    </div>
    <p class="fs-3 fw-bold mb-5" style="color:#094067">Total: {{ $event->hrg_ticket }}</p>
    <div class="d-flex justify-content-center mt-5 mb-xxl-5">
      <button id="submit-btn" type="submit" class="col-12 btn btn-primary rounded-pill">Bayar</button>
    </div>
  </form>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('submit-btn').addEventListener('click', function() {
  Swal.fire({
    icon: 'success',
    title: 'Payment Successful',
    text: 'Your payment has been successful!',
    confirmButtonText: 'OK'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('payment-form').submit();
    }
  });
});
</script>

@endsection