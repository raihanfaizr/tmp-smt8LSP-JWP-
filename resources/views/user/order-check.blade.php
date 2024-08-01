@extends('user.layout.main')
@section('content')

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url({{ url('user-template/images/img_bg_1.jpg') }});">
    <div class="overlay"></div>
    <div class="fh5co-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Order Check</h1>
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
					<h3 class="text-dark" id="order-check"><b>Order Check</b></h3>
                    <hr>
					<div class="card-body">
                        <form action="/order-check#order-check" method="get">
                            <h4 style="margin: 20px 0 10px 0;">Masukkan kode order</h4>
                            <input type="text" name="order_code" class="form-control" style="height: 40px;" value="{{ $data === 'y' ? $order->order_code : '' }}">
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="width: 200px;"> Check </button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>

        @if (session('success'))
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 30px; border-radius:10px; box-shadow: 5px 5px 10px #aaa;">
                        <h3>Harap simpan kode pesanan dibawah untuk mengecek pesanan anda ^^</h3>
                    </div>
                </div>
            </div>
        @endif

        @if ($data === 'y')
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 30px; border-radius:10px; box-shadow: 5px 5px 10px #aaa;">
                        <h3 class="text-dark" id="order-check"><b>Order Data</b></h3>
                        <hr>
                        <h4><b>Order Code : </b><span class="badge" style="background-color: #000; color:#fff; font-size:20px;">{{ $order->order_code }}</span></h4>
                        <h4><b>Nama : </b>{{ $order->nama_pemesan }}</h4>
                        <h4><b>Phone : </b>{{ $order->no_hp_pemesan }}</h4>
                        <h4><b>Email : </b>{{ $order->email_pemesan }}</h4>
                        <h4><b>Lokasi : </b>{{ $order->lokasi }}</h4>
                        <h4><b>Catatan : </b>{{ $order->catatan }}</h4>
                        <h4><b>Status Pesanan : </b><span class="badge" style="background-color: {{ $order->order_status == 'accepted' ? 'green': ($order->order_status == 'rejected' ? 'red' : '') ; }};">{{ $order->order_status }}</span></h4>
                        <hr>
                        <h4><b>Produk :</b></h4>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ url('storage/image-catalogue/'.$product->image) }}" alt="" srcset="" style="width: 100%; border-radius: 10px;">
                            </div>
                            <div class="col-md-9">
                                <h3>{{ $product->nama_produk }}</h3>
                                <p>{{ $product->deskripsi }}</p>
                                <h3>Rp {{ number_format($product->harga, 0) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

	</div>
</div>

@endsection