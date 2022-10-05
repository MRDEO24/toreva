<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8" />
	<title>{{$nama_halaman}}</title>

	<!-- Meta Data -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="author" content="ArtTemplates" />
	<!-- <meta name="description" content="Sochi — A Modern Hotel Booking Sketch Template" /> -->

	<!-- Twitter data -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@ArtTemplates">
	<meta name="twitter:title" content="Sochi">
	<!-- <meta name="twitter:description" content="Sochi — A Modern Hotel Booking Sketch Template"> -->
	<meta name="twitter:image" content="/assets/home/images/social.html">

	<!-- Open Graph data -->
	<meta property="og:title" content="ArtTemplate" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="your url website" />
	<meta property="og:image" content="/assets/home/images/social.html" />
	<meta property="og:description" content="Sochi — A Modern Hotel Booking Sketch Template" />
	<meta property="og:site_name" content="Sochi" />

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/home/images/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/home/images/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/home/images/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="57x57" href="/assets/home/images/favicons/apple-touch-icon-57x57.png">
	<link rel="shortcut icon" href="/assets/home/images/favicons/favicon.png" type="image/png">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="/assets/home/styles/style.css" />
	<link rel="stylesheet" type="text/css" href="/assets/home/demo/style-demo.css" />
	<link rel="stylesheet" href="/assets/dist/sweetalert2.min.css">
	<script src="{{url('assets/dist/sweetalert2.all.min.js')}}"></script>
	<style>
		html {
			scroll-behavior: smooth;
		}

		@media print {
			.noPrint {
				display: none;
			}
		}
	</style>

	<style>
		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, .15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.rtl table {
			text-align: right;
		}

		.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body>
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader__wrap">
			<div class="preloader__progress"><span></span></div>
		</div>
	</div>

	<!-- Header -->
	@if($type == 1)
	<header class="header">
		<nav class="navbar navbar-white navbar-overlay">
			<a class="logo-link" href="/">
				<img class="logotype" src="/assets/home/logo.png" alt="Sochi">
			</a>
			<div class="navbar__menu">
				<button class="hamburger" type="button">
					<span></span>
					<span></span>
				</button>

				<ul class="nav">
					<li class="nav__item _is-current"><a class="nav__link" href="/package"><span data-hover="Package">Package</span></a></li>
					@if($nama_halaman == 'Welcome to Toreva')
					<li class="nav__item"><a class="nav__link" href="#about"><span data-hover="About Us">About Us</span></a></li>
					<li class="nav__item" style="cursor:pointer" id="cek"><a class="nav__link"><span data-hover="Cek Pembayaran">Cek Pembayaran</span></a></li>
					<!-- <li class="nav__item"><a class="nav__link" href="#testimony"><span data-hover="Testimony">Testimony</span></a></li> -->
					@else
					<li class="nav__item"><a class="nav__link" href="/#about"><span data-hover="About Us">About Us</span></a></li>
					<li class="nav__item" style="cursor:pointer" id="cek"><a class="nav__link"><span data-hover="Cek Pembayaran">Cek Pembayaran</span></a></li>
					<!-- <li class="nav__item"><a class="nav__link" href="/#testimony"><span data-hover="Testimony">Testimony</span></a></li> -->
					@endif
					<!-- <li class="nav__item"><a class="nav__link" href="blog.html"><span data-hover="Blog">Blog</span></a></li>
					<li class="nav__item"><a class="nav__link" href="contact.html"><span data-hover="Contact Us">Contact Us</span></a></li> -->
					<li class="nav__item"><a class="btn btn__medium" href="#"><i class="btn-icon-left icon-bookmark"></i>Lihat Paket</a></li>
				</ul>
			</div>

			<div class="navbar__btn">
				<a class="btn btn__medium" href="/package"><i class="btn-icon-left icon-bookmark"></i>Lihat Paket</a>
			</div>
		</nav>
	</header>
	@else
	<header class="header">
		<nav class="navbar">
			<a class="logo-link" href="/">
				<img class="logotype" src="/assets/home/logo.png" alt="Toreva" style="filter: invert(100%);">
			</a>
			<div class="navbar__menu">
				<button class="hamburger" type="button">
					<span></span>
					<span></span>
				</button>
				<ul class="nav">
					<li class="nav__item"><a class="nav__link" href="/package"><span data-hover="Package">Package</span></a></li>
					@if($nama_halaman == 'Welcome to Toreva')
					<li class="nav__item"><a class="nav__link" href="#about"><span data-hover="About Us">About Us</span></a></li>
					<li class="nav__item" style="cursor:pointer" id="cek"><a class="nav__link"><span data-hover="Cek Pembayaran">Cek Pembayaran</span></a></li>
					<!-- <li class="nav__item"><a class="nav__link" href="#testimony"><span data-hover="Testimony">Testimony</span></a></li> -->
					@else
					<li class="nav__item"><a class="nav__link" href="/#about"><span data-hover="About Us">About Us</span></a></li>
					<li class="nav__item" style="cursor:pointer" id="cek"><a class="nav__link"><span data-hover="Cek Pembayaran">Cek Pembayaran</span></a></li>
					<!-- <li class="nav__item"><a class="nav__link" href="/#testimony"><span data-hover="Testimony">Testimony</span></a></li> -->
					@endif
					<!-- <li class="nav__item"><a class="nav__link" href="blog.html"><span data-hover="Blog">Blog</span></a></li>
					<li class="nav__item is-current"><a class="nav__link" href="contact.html"><span data-hover="Contact Us">Contact Us</span></a></li> -->
					<li class="nav__item"><a class="btn btn__medium" href="#"><i class="btn-icon-left icon-bookmark"></i>Lihat Paket</a></li>
				</ul>
			</div>
			<div class="navbar__btn">
				<a class="btn btn__medium" href="/package"><i class="btn-icon-left icon-bookmark"></i>Lihat Paket</a>
			</div>
		</nav>
	</header>
	<!-- /Header -->
	@endif

	<!-- Content -->
	@yield('content')
	<!-- /Content -->

	<!-- Footer -->
	<footer class="footer noPrint">
		<div class="footer__left">
			<ul class="footer__info">
				<li>©{{'2020 - '.date('Y')}} Toreva Travel</li>
			</ul>
		</div>
		<ul class="footer__social">
			<li><a href="https://www.facebook.com/muhammad.raihanarrasyid" target="_blank"class="social-link"><i class="icon-facebook-alt"></i></a></li>
			<li><a href="https://www.instagram.com/mrd.eo_24/" target="_blank"class="social-link"><i class="icon-instagram"></i></a></li>
			<li><a href="https://wa.me/6283102479629" target="_blank" class="social-link"><img src="/assets/home/wa.png" style="height: 20px;" alt=""></a></li>
		</ul>
	</footer>

	<!-- Button Live Chat -->
	<div class="btn-floating js-show-to-scroll" onclick="topFunction()"><i class="icon-arrow-up"></i></div>
	<script>
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
	<!-- Demo Menu -->

	<!-- Demo Menu -->

	<!-- JavaScripts -->
	<script src="/assets/home/js/jquery-3.4.1.min.js"></script>
	<script src="/assets/home/js/plugins.min.js"></script>
	<script src="/assets/home/js/common.js"></script>

	<script src="/assets/home/demo/plugins-demo.js"></script>
	<script>
		$('#cek').click(function() {
			Swal.fire({
				title: 'Masukkan kode pesanan anda',
				input: 'text',
				
				showCancelButton: true,
				confirmButtonText: 'Cek kode',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Tidak',
				showLoaderOnConfirm: true,
				
				allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {
				if (result.isConfirmed) {
					location.replace("/checking/" + result.value);
				}
			})
		});
	</script>
	<script>
		$('#OpenImgUpload1').click(function() {
			$('.kurayami1').trigger('click');
		});

		function previewImage(id) {
			document.getElementById("image-preview" + id).style.display = "block";
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("image-source" + id).files[0]);

			oFReader.onload = function(oFREvent) {
				document.getElementById("image-preview" + id).src = oFREvent.target.result;
			};
		};
	</script>
</body>

<!-- Mirrored from netgon.net/artstyles/sochi/home_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 15:29:33 GMT -->

</html>