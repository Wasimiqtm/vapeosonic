@extends('layouts.app')

@section('content')
<main id="mt-main">
				<!-- mt-mainslider4 add start here -->
				<div class="mt-mainslider4 add">
					<div class="container">
						<div class="row">
							<!-- banner slider start here -->
							<div class="banner-slider slick-initialized slick-slider">
								<!-- holder start here -->
								<div aria-live="polite" class="slick-list draggable" style="height: 648px;"><div class="slick-track" role="listbox" style="opacity: 1; width: 1230px; left: 0px;"><div class="holder slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 1230px;">
									<div class="img">
										<img src="{{asset('newdesign/images/sliders/img13.jpg')}}" alt="image description">
								
								</div><!-- holder end here -->
								<!-- holder start here -->
								<div class="holder right">
									<div class="img">
										<img src="{{asset('newdesign/images/sliders/img12.jpg')}}" alt="image description">
								
								</div><!-- holder end here -->
								<!-- holder start here -->
								<div class="holder">
									<div class="img">
										<img src="{{asset('newdesign/images/sliders/img11.jpg')}}" alt="image description">
									
								</div><!-- holder end here -->
							</div><!-- banner slider end here -->
						</div>
					</div></div></div>
				</div><!-- mt-mainslider4 add end here -->
				<div id="product-masonry">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<ul id="product-filter">
									<li class="active"><a href="#">AlL</a></li>
									<li><a href="#" data-filter=".fil1">Rugs & Flooring</a></li>
									<li><a href="#" data-filter=".fil2">Home & Living</a></li>
									<li><a href="#" data-filter=".fil3">Furniture</a></li>
									<li class="left"><a href="#" id="product-shuffle"><i class="fa fa-random" aria-hidden="true"></i> shuffle</a></li>
								</ul>
								<ul class="masonry-list" style="position: relative; height: 1233.55px;">
									<li class="fil1" style="position: absolute; left: 0px; top: 0px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img22.jpg')}}">
												<ul class="mt-stars">
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Bombi Chair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil2" style="position: absolute; left: 300px; top: 0px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img23.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Marvelous Modern 3 Seater</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>599,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil3" style="position: absolute; left: 600px; top: 0px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img67.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Puff  Armchair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>200,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil1" style="position: absolute; left: 900px; top: 0px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img82.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Poltroncina Genny</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil2" style="position: absolute; left: 0px; top: 404px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img83.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
												<span class="caption">
													<span class="best-price">Best Price</span>
												</span>
												<ul class="mt-stars">
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Plug 2001 Chair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil3" style="position: absolute; left: 600px; top: 404px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img84.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Paddock Armchair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>599,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil1" style="position: absolute; left: 900px; top: 404px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img85.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Torres Clave</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>200,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil2" style="position: absolute; left: 300px; top: 424px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img86.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Pan Armchair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil3" style="position: absolute; left: 900px; top: 789px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img88.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Munich Armchair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil1" style="position: absolute; left: 0px; top: 809px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img87.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
												<span class="caption"><span class="new">NEW</span></span>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Munich Armchair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil2" style="position: absolute; left: 600px; top: 809px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img89.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Puff  Armchair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>200,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
									<li class="fil3" style="position: absolute; left: 300px; top: 829px;">
										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<img alt="image description" src="{{asset('newdesign/images/products/img22.jpg')}}">
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">Bombi Chair</strong>
												<span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
											</div><!-- txt end here -->
										</div><!-- mt product1 end here -->
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection