@extends('admin.layout.main')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Create Catalogue</h3>
                    <hr>
                    <form action="{{ url('/admin/catalogue/') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h6>Nama Produk</h6>
                        <input type="text" name="nama_produk" class="form-control mb-3 w-50 @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}">
                        @error('nama_produk')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Deskripsi</h6>
                        <input type="text" name="deskripsi" class="form-control mb-3 w-75 @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}">
                        @error('deskripsi')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Harga</h6>
                        <input type="text" name="harga" pattern="[0-9]+" class="form-control mb-3 w-50 @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                        @error('harga')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Image</h6>
                        <input type="file" name="image" class="form-control mb-3 w-50 @error('harga') is-invalid @enderror">
                        @error('image')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection