@extends('home.base')
@section('content')
<main class="main">
	<section class="container section section-first">
		<div class="row">
			<div class="col-12">
				<h1 class="title title--h1 js-lines">All Package</h1>
			</div>


			@foreach($allpaket as $p)
			<div class="col-12 col-md-6 col-lg-4 js-scroll-show">
				<!-- ItemRoom extended -->
				<div class="itemRoom itemRoom__extended">
					<figure class="itemRoom__img-wrap">
						<a class="itemRoom__link" href="/detail/{{$p->id_paket}}">
							@foreach($gambar as $g)
							@if($g->id_paket == $p->id_paket)
							<img class="cover lazyload" src="{{$g->path}}" alt="room" />
							@endif
							@endforeach
						</a>
						<div class="itemRoom__details">
							<h4 class="title title--h4">{{$p->nama_paket}}</h4>
							<div class="itemRoom__price">Rp.{{number_format($p->harga_dewasa)}}<span> pack</span></div>
						</div>
					</figure>

					<div class="itemRoom__details-extended">
						<div class="item-extended"><i class="icon-map-pin"></i>{{$p->lokasi}}</div>
						<div class="item-extended mr-4"><i class="icon-clock"></i>{{$p->hari_paket}} Hari</div>
						<div class="item-extended"><i class="icon-bed"></i>2 Bedrooms</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</section>
</main>
@endsection