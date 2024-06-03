@extends('layouts.app2-detailEvent')

@section('title', 'detail event')


@section('content')
<div class="d-flex p-3" style="background-color: #094067;">
  <a href="{{route('home.index')}}" class="text-decoration-none btn-outline-white"
    style="padding: 0.75rem 2rem; font-size: 1rem;float-left">
    Back</a>
  <p class=" h1 fw-bolder d-block mx-auto text-light">Hatsune Miku Magical Mirai</p>

</div>
<section style="max-width: 100%; height: 100vh; overflow: hidden;">
  <img src="{{ asset('storage/events/miku.svg') }}" alt="">
</section>
<div class="w-100 h-100 p-lg-5" style="margin-top:-1rem">
  <p class="h1 fw-bolder">Hatsune Miku Magical Mirai</p>
  <div class="row d-flex justify-content-start border-bottom mb-4">
    <div class="col-2 d-flex">
      <i class="fa-regular fa-calendar fs-5 p-1"></i>
      <p class="fs-5 fw-bold ms-1">29 Juni 2024</p>
    </div>
    <div class="col-2 d-flex ">
      <i class="fa-solid fa-location-dot fs-5 p-1"></i>
      <p class="fs-5 fw-bold ms-1">Gelora Bung Karno</p>
    </div>
  </div>
  <div class="mt-3">
    <p class="h3 fw-bold">Deskripsi</p>
    <p>A live show and exhibition, connecting with Hatsune Miku through creativity!
      Hatsune Miku “Magical Mirai”
      Hatsune Miku "Magical Mirai" is a combined event of 3DCG live concert of virtual singers such as Hatsune Miku, and
      an exhibition where you will be able to experience the creative culture surrounding Hatsune Miku.
      By making Hatsune Miku and her friends a creative hub, we are hoping to make space for people to gather and have
      fun tied together with the keyword “creativity”.
      Held every year since 2013.

      A live show and exhibition, connecting with Hatsune Miku through creativity!
      Hatsune Miku “Magical Mirai”
      Hatsune Miku "Magical Mirai" is a combined event of 3DCG live concert of virtual singers such as Hatsune Miku, and
      an exhibition where you will be able to experience the creative culture surrounding Hatsune Miku.
      By making Hatsune Miku and her friends a creative hub, we are hoping to make space for people to gather and have
      fun tied together with the keyword “creativity”.
      Held every year since 2013.A live show and exhibition, connecting with Hatsune Miku through creativity!
      Hatsune Miku “Magical Mirai”
      Hatsune Miku "Magical Mirai" is a combined event of 3DCG live concert of virtual singers such as Hatsune Miku, and
      an exhibition where you will be able to experience the creative culture surrounding Hatsune Miku.
      By making Hatsune Miku and her friends a creative hub, we are hoping to make space for people to gather and have
      fun tied together with the keyword “creativity”.
      Held every year since 2013.

      A live show and exhibition, connecting with Hatsune Miku through creativity!
      Hatsune Miku “Magical Mirai”
      Hatsune Miku "Magical Mirai" is a combined event of 3DCG live concert of virtual singers such as Hatsune Miku, and
      an exhibition where you will be able to experience the creative culture surrounding Hatsune Miku.
      By making Hatsune Miku and her friends a creative hub, we are hoping to make space for people to gather and have
      fun tied together with the keyword “creativity”.
      Held every year since 2013.

      A live show and exhibition, connecting with Hatsune Miku through creativity!
      Hatsune Miku “Magical Mirai”
      Hatsune Miku "Magical Mirai" is a combined event of 3DCG live concert of virtual singers such as Hatsune Miku, and
      an exhibition where you will be able to experience the creative culture surrounding Hatsune Miku.
      By making Hatsune Miku and her friends a creative hub, we are hoping to make space for people to gather and have
      fun tied together with the keyword “creativity”.
      Held every year since 2013.</p>
  </div>
  <div class="mt-5">
    <p class="h3 fw-bold">Detail Event</p>
    <div class="container mt-3" style="margin-left: -10px">
      <div class="table-responsive">
        <table class="table table-bordered table-custom">
          <tbody style="border-radius: 10px">
            <tr>
              <th id="row" scope="row" class="text-light" style="background-color:#094067;">Tanggal Event</th>
              <td class="ps-3">Sabtu, 29 Juni 2024</td>
            </tr>
            <tr>
              <th id="row" scope="row" class="text-light" style="background-color:#094067">Waktu</th>
              <td class="ps-3">19.30 WIB</td>
            </tr>
            <tr>
              <th id="row" scope="row" class="text-light" style="background-color:#094067">Lokasi</th>
              <td class="ps-3">Stadio Gelora Bung Karno, Jakarta</td>
            </tr>
            <tr>
              <th id="row" scope="row" class="text-light" style="background-color:#094067">Pre-Order</th>
              <td class="ps-3">29 April 2024 - 29 Mei 2024</td>
            </tr>
            <tr>
              <th id="row" scope="row" class="text-light" style="background-color:#094067">Harga Tiket</th>
              <td class="ps-3">S seat (Rp 500.000,00), A seat (Rp 250.000,00)</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="mt-5">
    <p class="h3 fw-bold">Seat Map</p>
    <img src="{{ asset('assets/img/img_tukutick/img_seat.svg') }}" alt="" class="mt-2">
  </div>
  <div class="mt-5">
    <p class="h3 fw-bold mt-3 mb-3">Tata Cara Pre-Order</p>
    <ul style="list-style: none;margin-left: -30px;">
      <li>
        <p class="fw-bold">1. Masuk ke Website dan Login</p>
        <p style="margin-top:-15px">Pengguna membuka website aplikasi tiket dan login ke akun mereka. Jika belum
          memiliki akun,
          pengguna harus
          melakukan pendaftaran terlebih dahulu.
        </p>
      </li>
      <li style="margin-top:-10px">
        <p class="fw-bold">2. Pilih Acara</p>
        <p style="margin-top:-15px">Setelah login, pengguna diarahkan ke halaman utama yang menampilkan berbagai acara.
          Pengguna memilih acara yang ingin dihadiri.

        </p>
      </li>
      <li style="margin-top:-10px">
        <p class="fw-bold">3. Lihat Detail Acara</p>
        <p style="margin-top:-15px">Pengguna mengklik acara yang dipilih untuk melihat detailnya, seperti tanggal,
          lokasi, jenis tiket yang tersedia, dan harga tiket.

        </p>
      </li>
      <li style="margin-top:-10px">
        <p class="fw-bold">4. Pilih Tiket dan Pre-Order</p>
        <p style="margin-top:-15px">Pengguna memilih jenis tiket yang diinginkan (misalnya, S, A).
          Pengguna mengklik tombol "Pre-Order" untuk melanjutkan ke halaman berikutnya.
        </p>
      </li>
      <li style="margin-top:-10px">
        <p class="fw-bold">5. Isi Informasi Pemesan</p>
        <p style="margin-top:-15px">Pengguna mengisi informasi yang diperlukan untuk pre-order, seperti nama, alamat
          email, dan nomor telepon.
        </p>
      </li>
      <li style="margin-top:-10px">
        <p class="fw-bold">6. Menunggu Pengumuman Pemenang</p>
        <p style="margin-top:-15px">Pengguna setelah melakukan pre order harus menunggu pengumuman apakah pengguna
          tersebut beruntung mendapatkan tiket atau tidak. Bagi yang beruntung akan mendapatkan email untuk melanjutkan
          pembayaran

        </p>
      </li>
      <li style="margin-top:-10px">
        <p class="fw-bold">7. Melakukan Transaksi</p>
        <p style="margin-top:-15px">Pengguna memilih metode pembayaran yang tersedia. Pengguna memasukkan detail
          pembayaran dan mengonfirmasi pembayaran.

        </p>
      </li>
      <li style="margin-top:-10px">
        <p class="fw-bold">8. Penerimaan E-Ticket</p>
        <p style="margin-top:-15px">PTiket elektronik (e-ticket) dikirim ke email pengguna atau dapat diakses melalui
          akun pengguna di aplikasi. Pengguna bisa melihat atau mendownload e-ticket dari dashboard akun mereka.

        </p>
      </li>
    </ul>
  </div>
  <div class="">
    <div class="container mt-5 d-flex justify-content-center gap-5 mb-5">
      <a href="#" class="btn-outline-blue text-decoration-none">
        Pengumuman
      </a>
      <a href="#" class="btn-blue text-decoration-none">
        Pre-Order
      </a>
    </div>
  </div>
</div>

@endsection