@extends('layouts.app')

@section('title', 'Update Event')

@section('content')
<div class="main-content">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Update Event</div>

        <div class="card-body">
          @include('../layouts.app.successAlert')
          <form method="POST" action="{{ route('event.update', $event->id_event) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="nama_event" class="form-label">Nama Event</label>
              <input type="text" class="form-control @error('nama_event') is-invalid @enderror" id="nama_event"
                name="nama_event" value="{{ old('nama_event', $event->nama_event) }}" required>
              @error('nama_event')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="deskripsi_event" class="form-label">Deskripsi Event</label>
              <textarea class="form-control @error('deskripsi_event') is-invalid @enderror" id="deskripsi_event"
                name="deskripsi_event" rows="3"
                required>{{ old('deskripsi_event', $event->deskripsi_event) }}</textarea>
              @error('deskripsi_event')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="gambar" class="form-label">Gambar</label>
              <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
              @if ($event->gambar)
              <img src="{{ asset('storage/events/' . $event->gambar) }}" alt="{{ $event->nama_event }}"
                class="img-thumbnail mt-2" width="150">
              @endif
              @error('gambar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="jam_event" class="form-label">Jam Event</label>
              <input type="time" class="form-control @error('jam_event') is-invalid @enderror" id="jam_event"
                name="jam_event" value="{{ old('jam_event', $event->jam_event) }}" required>
              @error('jam_event')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="tgl_event" class="form-label">Tanggal Event</label>
              <input type="date" class="form-control @error('tgl_event') is-invalid @enderror" id="tgl_event"
                name="tgl_event" value="{{ old('tgl_event', $event->tgl_event) }}" required>
              @error('tgl_event')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="lokasi" class="form-label">Lokasi</label>
              <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                value="{{ old('lokasi', $event->lokasi) }}" required>
              @error('lokasi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="jml_ticket" class="form-label">Jumlah Ticket</label>
              <input type="number" class="form-control @error('jml_ticket') is-invalid @enderror" id="jml_ticket"
                name="jml_ticket" value="{{ old('jml_ticket', $event->jml_ticket) }}" required>
              @error('jml_ticket')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="hrg_ticket" class="form-label">Harga Ticket</label>
              <input type="number" class="form-control @error('hrg_ticket') is-invalid @enderror" id="hrg_ticket"
                name="hrg_ticket" value="{{ old('hrg_ticket', $event->hrg_ticket) }}" required>
              @error('hrg_ticket')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="">Pilih Status</option>
                <option value="1" {{ old('status', $event->status) == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('status', $event->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="id_kategori" class="form-label">Kategori</label>
              <select class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori"
                name="id_kategori" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kategori)
                <option value="{{ $kategori->id_kategori}}"
                  {{ old('id_kategori', $event->id_kategori) == $kategori->id_kategori ? 'selected' : '' }}>
                  {{ $kategori->nama_kategori }}</option>
                @endforeach
              </select>
              @error('id_kategori')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="id_penyelenggara" class="form-label">Penyelenggara</label>
              <select class="form-control @error('id_penyelenggara') is-invalid @enderror" id="id_penyelenggara"
                name="id_penyelenggara" required>
                <option value="">Pilih Penyelenggara</option>
                @foreach($penyelenggara as $penyelenggara)
                <option value="{{ $penyelenggara->id_penyelenggara }}"
                  {{ old('id_penyelenggara', $event->id_penyelenggara) == $penyelenggara->id_penyelenggara ? 'selected' : '' }}>
                  {{ $penyelenggara->nama_penyelenggara }}</option>
                @endforeach
              </select>
              @error('id_penyelenggara')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection