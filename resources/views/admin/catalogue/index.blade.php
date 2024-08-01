@extends('admin.layout.main')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
    </div>
  @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Catalogue</h3>
                    <hr>
                    <a href="/admin/catalogue/create" class="btn btn-success mb-2">Tambah Produk</a>
                    <table id="example" class="table stripe" style="width:100%">
                      <thead>
                          <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Image</th>
                              <th class="text-center">Nama Produk</th>
                              <th class="text-center">Deskripsi</th>
                              <th class="text-center" style="width: 160px;">Harga</th>
                              <th class="text-center" style="width: 140px;">Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($catalogue as $item)
                          <tr>
                              <td class="text-center">{{ $no++ }}</td>
                              <td class="text-center">
                                <img src="{{ url('storage/image-catalogue/'. $item->image) }}" srcset="" style="width:100px; height:100px; object-fit:contain;">
                              </td>
                              <td>{{ $item->nama_produk }}</td>
                              <td>{{ $item->deskripsi }}</td>
                              <td class="text-center">Rp. {{ number_format($item->harga, 2) }}</td>
                              <td class="text-center">
                                <a href="/admin/catalogue/{{ $item->id }}/edit/" class="btn btn-sm btn-primary">Edit</a>
                                <form action="/admin/catalogue/{{ $item->id }}" method="post" style="display: inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                    Delete
                                  </button>
                                </form>
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>	
  new DataTable('#example');
</script>

@endsection