@extends('layouts.app')

@section('title', 'List Kategori')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Kategori List</h1>
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
    </div>
    <div class="section-body">
      <a href="{{route('kategori.create')}}" class="btn btn-primary mb-4">Tambah Kategori</a>
      <div class="row">
        <div class="col-12  w-100">
          <div class="card">
            <div class="card-header">
              <h4>List Kategori</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr>
                      <th>No.</th>
                      <th>Nama Kategori</th>
                      <th>Dibuat</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach($kategori as $item)
                    <tr>
                      <td>{{ ($kategori->currentPage() - 1) * $kategori->perPage() + $loop->iteration }}</td>
                      <td>{{ $item->nama_kategori }}</td>
                      <td>{{ $item->created_at->format('d M Y') }}</td>
                      <td>
                        <a href="{{ route('kategori.edit', $item->id_kategori) }}"
                          class="btn btn-warning btn-sm">Update</a>
                        <form action="{{ route('kategori.destroy', $item->id_kategori) }}" method="POST"
                          style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm ml-2"
                            onclick="return confirm('Are you sure you want to delete this kategori?')">Delete</button>
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
                {{ $kategori->links('vendor.pagination.bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection