<!-- resources/views/penyelenggara/index.blade.php -->

@extends('layouts.app')

@section('title', 'List Penyelenggara')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Daftar Penyelenggara</h1>
      @include('../layouts.app.successAlert')
    </div>
    <div class="section-body">
      <a href="{{route('penyelenggara.create')}}" class="btn btn-primary mb-4">Tambah Penyelenggara
        Baru</a>
      <div class="row">
        <div class="col-12  w-100">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Master Penyelenggara</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr>
                      <th>No</th>
                      <th>Nama Penyelenggara</th>
                      <th>Alamat Kantor</th>
                      <th>Kontak</th>
                      <th>Lisensi</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach($penyelenggara as $penyel)
                    <tr>
                      <td>{{ ($penyelenggara->currentPage() - 1) * $penyelenggara->perPage() + $loop->iteration }}</td>
                      <td>{{ $penyel->nama_penyelenggara }}</td>
                      <td>{{ $penyel->alamat_kantor }}</td>
                      <td>{{ $penyel->kontak }}</td>
                      <td>
                        <a href="{{ asset('storage/lisensi/' . $penyel->lisensi) }}" target="_blank">Download PDF</a>
                      </td>

                      <td>
                        <a href="{{ route('penyelenggara.edit', $penyel->id_penyelenggara) }}"
                          class="btn btn-warning btn-sm">Update</a>
                        <form action="{{ route('penyelenggara.destroy', $penyel->id_penyelenggara) }}" method="POST"
                          style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this penyelenggara?')">Delete</button>
                        </form>
                      </td>

                      </form>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <div class="card-footer text-right">
                <!-- Pagination Links -->
                {{ $penyelenggara->links('vendor.pagination.bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection