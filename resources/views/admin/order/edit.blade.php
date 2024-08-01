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
                    <h3 class="card-title">Edit Order</h3>
                    <hr>
                    <form action="{{ url('/admin/order/'.$order->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <h6>Nama</h6>
                        <input type="text" name="nama_pemesan" class="form-control mb-3 w-50 @error('nama_pemesan') is-invalid @enderror" value="{{ $order->nama_pemesan }}">
                        @error('nama_pemesan')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>No HP</h6>
                        <input type="text" name="no_hp_pemesan" class="form-control mb-3 w-50 @error('no_hp_pemesan') is-invalid @enderror" value="{{ $order->no_hp_pemesan }}">
                        @error('no_hp_pemesan')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Email</h6>
                        <input type="text" name="email_pemesan" class="form-control mb-3 w-50 @error('email_pemesan') is-invalid @enderror" value="{{ $order->email_pemesan }}">
                        @error('email_pemesan')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Lokasi</h6>
                        <input type="text" name="lokasi" class="form-control mb-3 w-50 @error('lokasi') is-invalid @enderror" value="{{ $order->lokasi }}">
                        @error('lokasi')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Catatan</h6>
                        <input type="text" name="catatan" class="form-control mb-3 w-75 @error('catatan') is-invalid @enderror" value="{{ $order->catatan }}">
                        @error('catatan')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Produk</h6>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ url('storage/image-catalogue/'.$catalogue->image) }}" alt="" srcset="" style="width: 100%; border-radius: 10px;">
                            </div>
                            <div class="col-md-10">
                                <h3>{{ $catalogue->nama_produk }}</h3>
                                <p>{{ $catalogue->deskripsi }}</p>
                                <h3>Rp {{ number_format($catalogue->harga, 0) }}</h3>
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection