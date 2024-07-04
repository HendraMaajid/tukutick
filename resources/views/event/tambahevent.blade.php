<!-- resources/views/event/tambahevent.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Event')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Event Baru</h1>
      @include('../layouts.app.successAlert')
      @include('../layouts.app.failedAlert')
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Formulir Tambah Kategori</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" id="eventForm">
          @csrf
          <div class="form-group row mb-4">
            <label for="nama_event" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
              Event</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" id="nama_event" name="nama_event" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="deskripsi_event" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi
              Event</label>
            <div class="col-sm-12 col-md-7">
              <textarea type="text" name="deskripsi_event" id="deskripsi_event" cols="30" rows="10"
                class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="gambar" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
            <div class="col-sm-12 col-md-7">
              <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="jam_event" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam
              Event</label>
            <div class="col-sm-12 col-md-7">
              <input type="time" class="form-control" id="jam_event" name="jam_event" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="tgl_event" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
              Event</label>
            <div class="col-sm-12 col-md-7">
              <input type="date" class="form-control" id="tgl_event" name="tgl_event" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="lokasi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" id="lokasi" name="lokasi" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="jml_ticket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah
              Ticket</label>
            <div class="col-sm-12 col-md-7">
              <input type="number" class="form-control" id="jml_ticket" name="jml_ticket" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="hrg_ticket" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga
              Ticket</label>
            <div class="col-sm-12 col-md-7">
              <input type="number" class="form-control" id="hrg_ticket" name="hrg_ticket" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="status" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
            <div class="col-sm-12 col-md-7">
              <select class="form-control" id="status" name="status" required>
                <option value="1">Aktif</option>
                <option value="0">Non-Aktif</option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="kategori_id" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
            <div class="col-sm-12 col-md-7">
              <select class="form-control" id="kategori_id" name="id_kategori" required>
                @foreach($kategori as $item)
          <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
        @endforeach
              </select>
            </div>
          </div>


          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary" id="createButton">Create</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection
@section('script')
<script>
tinymce.init({
  selector: 'textarea',
  plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  mergetags_list: [{
      value: 'First.Name',
      title: 'First Name'
    },
    {
      value: 'Email',
      title: 'Email'
    },
  ],
});

</script>
@endsection