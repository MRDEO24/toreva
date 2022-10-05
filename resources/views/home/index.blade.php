@extends('home.base')

@section('content')
@if(session('status'))
<script>
    let text = "{{session('status')}}";
    Swal.fire({
        text: text,
        icon: 'error',
        confirmButtonText: 'Tutup'
    });
</script>
@endif
<main class="main">
        <!-- Slider -->
        <section class="intro-slider ltr">
		    <div class="container intro__container">
			<br><br>
			    <div class="row h-100 align-items-center text-center">
		            <div class="col-12 intro-slider__caption swiper-container">
                        <div class="swiper-wrapper">
			                <!-- Caption 1 -->
			                <div class="swiper-slide">
					            <h1 class="title js-text-wave">Teyvat</h1>
						        <p class="description down-up"><span>You have arrived in Teyvat — a fantasy world where the seven elements flow and converge. In the distant past, the Archons granted mortals unique elemental abilities.</span></p>
					        </div>
			                <!-- Caption 2 -->
			                <div class="swiper-slide">
					            <h1 class="title js-text-wave">Mondstadt</h1>
						        <p class="description down-up"><span>A city of freedom that lies in the northeast of Teyvat. From amongst mountains and wide-open plains, carefree breezes carry the scent of dandelions — a gift from the Anemo God, Barbatos.</span></p>
				            </div>
			                <!-- Caption 3 -->
			                <div class="swiper-slide">
						        <h1 class="title js-text-wave">Liyue</h1>
						        <p class="description down-up"><span>A bountiful harbor that lies in the east of Teyvat. Mountains stand tall and proud alongside the stone forest, that, together with the open plains and lively rivers, make up Liyue's bountiful landscape, which shows its unique beauty through each of the four seasons.</span></p>
					        </div>
				        </div>
		            </div>
			    </div>
			</div>
		
		    <div class="intro-slider__image swiper-container overlay">
                <div class="swiper-wrapper">
			        <!-- Image 1 -->
			        <div class="swiper-slide">
					    <div class="coverSlider js-parallax js-image" data-image="/assets/home/images/image_header_01.jpg"></div>
				    </div>
			        <!-- Image 2 -->
			        <div class="swiper-slide">
					    <div class="coverSlider js-parallax js-image" data-image="/assets/home/images/image_header_02.jpg"></div>
				    </div>
			        <!-- Image 3 -->
			        <div class="swiper-slide">
					    <div class="coverSlider js-parallax js-image" data-image="/assets/home/images/image_header_03.jpg"></div>
				    </div>
		        </div>
		    </div>
			
		    <!-- Navigation buttons -->
		    <div class="slider-navigation container">
                <div class="slider-prev icon-chevron-left"></div>
                <div class="slider-next icon-chevron-right"></div>
		    </div>
			
			<!-- Scroll To -->
		    <a class="scroll-to" href="#about">Scroll<span class="scroll-to__line"></span></a>
        </section>
        <!-- /Slider -->
	
		

	    <!-- Section About Us -->
	    <section id="about" class="container section">
		<br>
	        <div class="row">
		        <div class="col-12 col-lg-5">
			        <span class="title title--overhead js-lines">About Us</span>
			        <h1 class="title title--h1 js-lines">Explore the View of Teyvat.</h1>
			    </div>
				<div class="col-12 col-lg-6 offset-lg-1 offset-top">
				    <p class="paragraph js-scroll-show">Iklim subtropis yang lembab, pegunungan tinggi, vegetasi eksotis, pantai tak berujung, taman nasional, arsitektur bersejarah, situs atraksi menarik, festival seni, dan lingkungan multikultural yang semarak menjadikan Sochi tujuan resor terkemuka.</p>
				    <p class="paragraph js-scroll-show">Toreva menawarkan banyak hal bagi siapa saja yang menyukai alam, olahraga, sejarah, rekreasi pantai yang cerah, dan petualangan aktif.</p>
				</div>

                <div class="col-fullwidth gallery-three">
					<!-- <figure class="gallery-three__left">
			            <img class="cover about-image-portrait" src="assets/home/images/about_image_02.jpg" alt="about" />
		            </figure> -->
					<figure class="gallery-three__center">
			            <img class="cover about-image-portrait js-parallax-img" src="assets/home/images/image_header_04.jpg" alt="about" />
		            </figure>
					<!-- <figure class="gallery-three__right">
			            <img class="cover about-image-portrait" src="assets/home/images/image_header_03.jpg" alt="about" />
		            </figure> -->
				</div>
		    </div>
		</section>
		
		<!-- Section Rooms -->
		<section class="container section">	
	        <div class="row align-items-end">
		        <div class="col-12 col-md-12 col-lg-8">
			        <!-- <span class="title title--overhead js-lines">Ro</span> -->
			        <h1 class="title title--h1 js-lines">Top Package</h1>
			    </div>
				<div class="col-12 col-md-12 col-lg-4 text-lg-right d-none d-md-block">
				    <a class="btn-link header-btn-more" href="rooms.html">Lihat Semua</a>
				</div>
			</div>
			
			<!-- Grid -->
                         
			<div class="row">
				<div class="col-12">
				    <div class="swiper-container js-rooms">
						<div class="swiper-wrapper">
				            <!-- ItemRoom -->
							@php 
								$i = 0; 
							@endphp
							
                            @foreach($allpaket as $p)
				            <div class="itemRoom itemRoom__portrait swiper-slide">
					            <!-- <span class="badge">Popular</span> -->
					            <figure class="itemRoom__img-wrap">
						            <a class="itemRoom__link" href="/detail/{{$p->id_paket}}">
									@foreach($gambar as $g)
									@if($g->id_paket == $p->id_paket)
							            <img class="cover" src="{{$g->path}}" alt="room" />
									@endif
									@endforeach
							        </a>
						        </figure>
						        <div class="itemRoom__details">
						            <h4 class="title title--h4">{{$p->nama_paket}}</h4>
							        <div class="itemRoom__price">Rp.{{$p->harga_dewasa}}<span>/pack</span></div>
						        </div>	
					        </div>
                            @endforeach
					    </div>
						
						<!-- Pagination  -->
                        <div class="swiper-pagination"></div>
					</div>	
				</div>
            </div>			
	    </section>
		
		<!-- Section Testimonials -->
		<!-- <section id="testimony" class="section section-testimonials section-gray">
		    <div class="container" >
			    <div class="row">
				    <div class="col-12">
			            <span class="title title--overhead js-lines">Testimonials</span>
			            <h1 class="title title--h1 js-lines">What clients <br><span class="text-accent">say about us.</span></h1>
			        </div>
					
					<div class="col-12">
					    
					    <div class="swiper-container js-testimonials">
						    <div class="swiper-wrapper">
							    
                                <div class="testimonials-item swiper-slide">
								    <h4 class="title title--h4">Best hotel!</h4>
									<p class="testimonials-item__caption">— The hotel has everything you need. On the ground floor there is a lobby bar, on the second floor there is a zone with an indoor pool and sauna, on the seventh floor there is a restaurant and spa-salon. The rooms are cleaned every day.</p>
								    <div class="author-wrap">
									    <div class="author-picture"><img class="cover" src="assets/home/images/person.jpg" alt="Jacob Lane" /></div>
										<div>
										    <div class="author-name">Jacob Lane</div>
										    <div class="author-country">from USA</div>
										</div>
									</div>
								</div>
							    
                                <div class="testimonials-item swiper-slide">
								    <h4 class="title title--h4">Comfortable hotel.</h4>
									<p class="testimonials-item__caption">— Well, what can I say, every year, day and hour, this place is being transformed for the better. The staff is completely competent and friendly, Everything around is blooming, pleasing, nourishing and making the holiday bright.</p>
								    <div class="author-wrap">
									    <div class="author-picture"><img class="cover" src="assets/home/images/person2.jpg" alt="Victoria Wilson" /></div>
										<div>
										    <div class="author-name">Victoria Wilson</div>
										    <div class="author-country">from France</div>
										</div>
									</div>
								</div>
							    
                                <div class="testimonials-item swiper-slide">
								    <h4 class="title title--h4">The modern.</h4>
									<p class="testimonials-item__caption">— The modern 5 * Hotel Sochi Center is an ideal solution for combining business and leisure. Stylish design and exceptional service will satisfy the desires of any guest. 150 rooms with balcony (non-smoking), sea view, trendy restaurant.</p>
								    <div class="author-wrap">
									    <div class="author-picture"><img class="cover" src="assets/home/images/person3.jpg" alt="Max Edwards" /></div>
										<div>
										    <div class="author-name">Max Edwards</div>
										    <div class="author-country">from Germany</div>
										</div>
									</div>
								</div>
							    
                                <div class="testimonials-item swiper-slide">
								    <h4 class="title title--h4">Best hotel!</h4>
									<p class="testimonials-item__caption">— The hotel has everything you need. On the ground floor there is a lobby bar, on the second floor there is a zone with an indoor pool and sauna, on the seventh floor there is a restaurant and spa-salon. The rooms are cleaned every day.</p>
								    <div class="author-wrap">
									    <div class="author-picture"><img class="cover" src="assets/home/images/person.jpg" alt="Jacob Lane" /></div>
										<div>
										    <div class="author-name">Jacob Lane</div>
										    <div class="author-country">from USA</div>
										</div>
									</div>
								</div>
							    
                                <div class="testimonials-item swiper-slide">
								    <h4 class="title title--h4">Comfortable hotel.</h4>
									<p class="testimonials-item__caption">— Well, what can I say, every year, day and hour, this place is being transformed for the better. The staff is completely competent and friendly, Everything around is blooming, pleasing, nourishing and making the holiday bright.</p>
								    <div class="author-wrap">
									    <div class="author-picture"><img class="cover" src="assets/home/images/person2.jpg" alt="Victoria Wilson" /></div>
										<div>
										    <div class="author-name">Victoria Wilson</div>
										    <div class="author-country">from France</div>
										</div>
									</div>
								</div>
							    
                                <div class="testimonials-item swiper-slide">
								    <h4 class="title title--h4">The modern.</h4>
									<p class="testimonials-item__caption">— The modern 5 * Hotel Sochi Center is an ideal solution for combining business and leisure. Stylish design and exceptional service will satisfy the desires of any guest. 150 rooms with balcony (non-smoking), sea view, trendy restaurant.</p>
								    <div class="author-wrap">
									    <div class="author-picture"><img class="cover" src="assets/home/images/person3.jpg" alt="Max Edwards" /></div>
										<div>
										    <div class="author-name">Max Edwards</div>
										    <div class="author-country">from Germany</div>
										</div>
									</div>
								</div>
                            </div>
							
							
                            <div class="swiper-pagination"></div>
						</div>
						
					</div>
				</div>
			</div>
        </section> -->
		
	    <!-- Section CTA -->
	    <section class="container section">
	        <div class="row cta-simply">
			    <div class="col-12 col-lg-7">
			        <h2 class="title title--h2 js-lines">Make deal for adventure.</h2>
				    <p class="paragraph js-lines">Pesan paket Anda sekarang juga dan mulailah petualangan menakjubkan Anda yang penuh dengan penemuan dan pengalaman bersama Toreva.</p>
					<a href="rooms.html" class="btn btn__large js-scroll-show">Pesan Sekarang<i class="btn-icon-right icon-arrow-special"></i></a>
				</div>
			</div>
	    </section>
	</main>
@endsection