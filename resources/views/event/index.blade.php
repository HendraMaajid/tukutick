<!-- resources/views/event/index.blade.php -->

@extends('layouts.app')

@section('title', 'List Event')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Daftar Event</h1>
      @include('../layouts.app.successAlert')
    </div>
    <div class="section-body">
      <a href="{{route('event.create')}}" class="btn btn-primary mb-4">Tambah Event</a>
      <div class="row">
        <div class="col-12  w-100">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Daftar Event</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr>
                      <th>No.</th>
                      <th>Nama Event</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Jam Event</th>
                      <th>Tanggal Event</th>
                      <th>Lokasi</th>
                      <th>Jumlah Ticket</th>
                      <th>Harga Ticket</th>
                      <th>Status</th>
                      <th>Kategori</th>
                      <th>Penyelenggara</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach($event as $item)
                    <tr>
                      <td>{{ ($event->currentPage() - 1) * $event->perPage() + $loop->iteration }}</td>
                      <td>{{ $item->nama_event }}</td>
                      <td>{{ $item->deskripsi_event }}</td>
                      <td><img src="{{ asset('storage/events/' . $item->gambar) }}" alt="{{ $item->nama_event }}"
                          width="100"></td>
                      <td>{{ $item->jam_event }}</td>
                      <td>{{ $item->tgl_event }}</td>
                      <td>{{ $item->lokasi }}</td>
                      <td>{{ $item->jml_ticket }}</td>
                      <td>{{ $item->hrg_ticket }}</td>
                      <td>{{ $item->status }}</td>
                      <td>{{ $item->kategori->nama_kategori }}</td>
                      <td>{{ $item->penyelenggara->nama_penyelenggara }}</td>
                      <td>
                        <a href="{{ route('event.edit', $item->id_event) }}" class="btn btn-warning btn-sm">Update</a>
                        <a href="" class="btn btn-info btn-sm">Pemenang</a>
                        <a href="" class="btn btn-secondary btn-sm">Pre
                          Order</a>
                        <form action="{{ route('event.destroy', $item->id_event) }}" method="POST"
                          style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                      </td>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <div class="card-footer text-right">
                <!-- Pagination Links -->
                {{ $event->links('vendor.pagination.bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection