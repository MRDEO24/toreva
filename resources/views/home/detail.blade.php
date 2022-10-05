@extends('home.base')
@section('content')
<main class="main">
	<!-- Intro -->
	<section class="intro">
		<div class="intro__bg-wrap">
			<div class="overlay intro__bg js-image js-parallax js-scale-down" data-image="{{$gambars->path}}"></div>
		</div>
		<div class="container intro__container">
			<div class="row h-100 align-items-center align-items-center justify-content-center">
				<div class="col-12 col-xl-8 text-center">
					<span class="title title--overhead text-white js-lines">{{$paket->lokasi}}</span>
					<h1 class="title title--display-1 js-lines">{{$paket->nama_paket}}</h1>
				</div>
			</div>
		</div>
		<!-- Scroll To -->
		<a class="scroll-to" href="#content">Scroll<span class="scroll-to__line"></span></a>
	</section>
	<!-- /Intro -->

	<!-- Room base info -->
	<div class="bottom-panel bottom-panelRoom">
		<div class="bottom-panel__wrap">
			<div class="row h-100 align-items-center">
				<div class="col-12 col-md-12 col-xl-8">
					<div class="row room-details">
						<div class="col-4 room-details__item slash"><i class="icon-clock"></i>{{$paket->hari_paket}} Hari.</div>
						<div class="col-4 room-details__item slash"><i class="icon-bed"></i>2 Bed<span>rooms</span></div>
						<div class="col-4 room-details__item"><i class="icon-bath"></i>2 Bath<span>room</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Room base info -->

	<!-- Content -->
	<section id="content" class="container">
		<div class="row sticky-parent">
			<div class="col-md-12 col-xl-8 order-2 order-xl-1 mt-4 mt-sm-5">
				<!-- Description room -->
				<h3 class="title title--h3">Deskripsi</h3>
				<p>{{$paket->detail}}</p>

				<!-- Amenity -->
				<h3 class="title title--h3 mt-4 mt-sm-5">Preview</h3>
				<!-- <div class="row">
					    <ul class="list-unstyled list-feature col-12 col-md-4">
					        <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-parking.svg" alt="" />
								Free parking
							</li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-wifi.svg" alt="" />
								Fast Wi-Fi
							</li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-spa.svg" alt="" />
								SPA Services
							</li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-sport.svg" alt="" />
								Gym
							</li>
					    </ul>
					    <ul class="list-unstyled list-feature col-12 col-md-4">
					        <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-elevator.svg" alt="" />
								Elevator
						    </li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-tv.svg" alt="" />
								Cable TV
							</li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-kitchen.svg" alt="" />
								Kitchen
							</li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-pool.svg" alt="" />
								Pool
							</li>
					    </ul>
					    <ul class="list-unstyled list-feature col-12 col-md-4">
					        <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-coffee-maker.svg" alt="" />
								Coffee maker
							</li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-conditioner.svg" alt="" />
								Conditioning
							</li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-hair-dryer.svg" alt="" />
								Hair dryer
							</li>
						    <li class="list-feature__item">
							    <img class="icon icon--24" src="/assets/home/icons/icon-washer.svg" alt="" />
								Washer
							</li>
					    </ul>
					</div> -->

				<!-- Gallery slider -->
				<div class="slider-room ltr swiper-container mt-3">
					<div class="swiper-wrapper">
						@foreach($gambar as $g)
						<div class="swiper-slide">
							<div class="coverSlider js-image" data-image="{{$g->path}}"></div>
						</div>
						@endforeach
					</div>

					<!-- Navigation -->
					<div class="swiper-control swiper-control--bottom">
						<div class="slash">
							<div class="swiper-button-next swiper-button-square">
								<i class="icon-chevron-left"></i>
							</div>
							<div class="swiper-button-prev swiper-button-square">
								<i class="icon-chevron-right"></i>
							</div>
						</div>
					</div>
				</div>
				<!-- /Gallery slider -->


			</div>

			<!-- Sidebar Booking -->
			<div class="col-md-12 col-xl-4 order-1 order-xl-2">
				<div class="sidebar-booking sticky-column">
					<div class="sidebar-booking__priceWrap">
						<div class="priceWrap-title">Harga</div>
						<div class="priceWrap-price">Rp.{{number_format($paket->harga_dewasa)}} /<span> pack</span></div>
					</div>

					<form id="myForm" class="sidebar-booking__wrap" action="/order" method="post">
						@csrf
						<!-- Dates -->
						<input type="hidden" name="id_paket" value="{{$paket->id_paket}}">
						<div class="form-group">
							<label class="label" for="check-in">Tanggal</label>
							<div class="form-single">
								<div class="form-single">
									<input type="date" class="inputText" id="check-in" name="check_in" placeholder="Check in" required="required" autocomplete="off">

								</div>
								<!-- <div class="form-dual__right">
			                            <input type="text" class="inputText inputText__icon readonly js-datepicker" id="check-out" name="check_out" placeholder="Check out" required="required" autocomplete="off">
			                            <span class="input-icon icon-calendar"></span>
		                            </div> -->
							</div>
						</div>

						<div class="row">
							<!-- Persons -->
							<div class="col-12 col-sm-6 form-group">
								<label class="label" for="person-adult">Dewasa</label>
								<div class="js-quantity">
									<span class="qty-minus icon-minus"></span>
									<input type="number" class="inputText js-quantity-input readonly" id="person-adult" name="dewasa" value="0" min="1" max="10" required="required" autocomplete="off">
									<span class="qty-plus icon-plus"></span>
								</div>
							</div>
							<div class="col-12 col-sm-6 form-group">
								<label class="label" for="person-kids">Anak</label>
								<div class="js-quantity">
									<span class="qty-minus icon-minus"></span>
									<input type="number" class="inputText js-quantity-input readonly" id="person-kids" name="anak" value="0" min="0" max="10" autocomplete="off">
									<span class="qty-plus icon-plus"></span>
								</div>
							</div>


						</div>
						<div class="form-group">
							<label class="label" for="check-in">Atas Nama</label>
							<div class="form-single">
								<div class="form-single">
									<input type="text" class="inputText" id="check-in" name="nama_orang" placeholder="Nama Lengkap" required="required" autocomplete="off">

								</div>
								<!-- <div class="form-dual__right">
			                            <input type="text" class="inputText inputText__icon readonly js-datepicker" id="check-out" name="check_out" placeholder="Check out" required="required" autocomplete="off">
			                            <span class="input-icon icon-calendar"></span>
		                            </div> -->
							</div>
						</div>
						<div class="form-group">
							<label class="label" for="check-in">Email</label>
							<div class="form-single">
								<div class="form-single">
									<input type="email" class="inputText" id="check-in" name="email" placeholder="Email" required="required" autocomplete="off">

								</div>
								<!-- <div class="form-dual__right">
			                            <input type="text" class="inputText inputText__icon readonly js-datepicker" id="check-out" name="check_out" placeholder="Check out" required="required" autocomplete="off">
			                            <span class="input-icon icon-calendar"></span>
		                            </div> -->
							</div>
						</div>
						<div class="form-group">
							<label class="label" for="check-in">No Handphone</label>
							<div class="form-single">
								<div class="form-single">
									<input type="text" class="inputText" id="check-in" name="no_hp" placeholder="+628xxxx" required="required" autocomplete="off">

								</div>
								<!-- <div class="form-dual__right">
			                            <input type="text" class="inputText inputText__icon readonly js-datepicker" id="check-out" name="check_out" placeholder="Check out" required="required" autocomplete="off">
			                            <span class="input-icon icon-calendar"></span>
		                            </div> -->
							</div>
						</div>
						<div class="col-12 mt-1">
							<div onclick="kirim()" class="btn btn__medium w-100" ti>Pesan</div>
						</div>

						<span class="sidebar-booking__note"></span>
						<script>
							function kirim() {
								Swal.fire({

									text: "Sudah Yakin? Periksa kembali data jika belum yakin",
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Yakin',
									cancelButtonText: 'Tidak'
								}).then((result) => {
									if (result.isConfirmed) {
										document.getElementById("myForm").submit();
									}
								})
							}
						</script>
					</form>
				</div>
			</div>
			<!-- /Sidebar Booking -->
		</div>
	</section>
	<!-- /Content -->

	<!-- Map -->
	<!-- <div class="map-bottom" id="map"></div> -->

</main>
@endsection