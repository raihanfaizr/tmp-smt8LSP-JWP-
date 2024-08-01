@extends('user.layout.main')
@section('content')

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{ url('user-template/images/img_bg_1.jpg') }});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="display-t">
					<div class="display-tc animate-box" data-animate-effect="fadeIn">
						<h1 style="font-size:80px;">Wedding Organizer Jewepe</h1>
						<h2>Your future wedding dreams.</h2>
						{{-- <div class="simply-countdown simply-countdown-one"></div> --}}
						<p><a href="#product" class="btn btn-default btn-sm">Pesan Sekarang</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div id="fh5co-couple">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
				<h2 id="product">Our Products</h2>
			</div>
		</div>
		<div class="row justify-content-md-center">
			@foreach ($catalogue as $item)	
				<div class="col-md-3 align-self-center">
					<div class="card" style="padding: 10px; border-radius:10px; box-shadow: 5px 5px 5px #ddd;">
						<img class="card-img-top" src="{{ url('storage/image-catalogue/'.$item->image) }}" alt="Card image cap" style="width:100%; height:180px; border-radius:10px; object-fit:cover;">
						<br><br>
						<div class="card-body">
						<h3 class="card-title">{{ $item->nama_produk }}</h3>
						<p class="card-text">{{ $item->deskripsi }}</p>
						<h3>{{ number_format($item->harga,2) }}</h3>
						<a href="/order?product={{ $item->id }}" class="btn btn-primary">Pesan</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

<footer id="fh5co-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
				<h2>Contact us</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12 text-center">
				<h4 class="text-muted"><b>Whatsapp :</b> {{ $settingWeb->contact }}<br></h4>
				<h4 class="text-muted"><b>Email :</b> {{ $settingWeb->email }}<br></h4>
				<h4 class="text-muted"><b>Instagram :</b> {{ $settingWeb->instagram }}<br></h4>
				<br><br>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
				<h2>Maps</h2>
			</div>
		</div>
		<div class="col-6 mx-5">
			{!! $settingWeb->maps !!}
		</div>

	</div>
</footer>

@endsection