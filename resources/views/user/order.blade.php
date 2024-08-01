@extends('user.layout.main')
@section('content')

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url({{ url('user-template/images/img_bg_1.jpg') }});">
    <div class="overlay"></div>
    <div class="fh5co-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Order</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="fh5co-couple">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card" style="padding: 30px; border-radius:10px; box-shadow: 5px 5px 10px #aaa;">
					<h3 class="text-dark" id="order"><b>Order</b></h3>
                    <hr>
					<div class="card-body">
                        <form action="/order-process" method="post">
                            @csrf
                            <h4 style="margin: 20px 0 10px 0;">Nama Lengkap</h4>
                            <input type="text" name="nama_pemesan" class="form-control" style="height: 40px; @error('nama_pemesan') border:1px solid red; @enderror" value="{{ old('nama_pemesan') }}">
                            @error('nama_pemesan')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <h4 style="margin: 20px 0 10px 0;">No Handphone</h4>
                            <input type="text" name="no_hp_pemesan" class="form-control" style="height: 40px; @error('no_hp_pemesan') border:1px solid red; @enderror" pattern="[0-9]+" value="{{ old('no_hp_pemesan') }}">
                            @error('no_hp_pemesan')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <h4 style="margin: 20px 0 10px 0;">Email</h4>
                            <input type="text" name="email_pemesan" class="form-control" style="height: 40px; @error('email_pemesan') border:1px solid red; @enderror" value="{{ old('email_pemesan') }}">
                            @error('email_pemesan')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <h4 style="margin: 20px 0 10px 0;">Lokasi</h4>
                            <input type="text" name="lokasi" class="form-control" style="height: 40px; @error('lokasi') border:1px solid red; @enderror" value="{{ old('lokasi') }}">
                            @error('lokasi')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <h4 style="margin: 20px 0 10px 0;">Catatan</h4>
                            <input type="text" name="catatan" class="form-control" style="height: 40px;" value="{{ old('catatan') }}">
                            <h4 style="margin: 20px 0 10px 0;">Paket Produk</h4>
                            <input type="hidden" name="id_catalogue" value="{{ $catalogue->id }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ url('storage/image-catalogue/'.$catalogue->image) }}" style="width:100%; border-radius:10px;" alt="" srcset="">
                                </div>
                                <div class="col-md-9">
                                    <h3>{{ $catalogue->nama_produk }}</h3>
                                    <p>{{ $catalogue->deskripsi }}</p>
                                    <h3>Rp {{ number_format($catalogue->harga, 0) }}</h3>
                                </div>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="width: 200px;"> Pesan </button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection