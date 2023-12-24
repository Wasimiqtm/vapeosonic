@extends('layouts.app')

@section('content')

			<main id="mt-main">
				<!-- mt-mainslider4 add start here -->
				<div class="mt-mainslider4 add">
					<div class="container">
						<div class="row">
							<!-- banner slider start here -->
							<div class="banner-slider">
								
								<!-- holder start here -->
								<div class="holder">
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
					</div>
				</div><!-- mt-mainslider4 add end here -->
				<div id="product-masonry">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<ul id="product-filter">

									<li class="active" class="get_products" data-id="all" data-param="all"><a href="#">AlL</a></li>
									@foreach($categories as $category)
									<li><a href="#" class="get_products" data-param="{{$category->id}}" data-filte=".fil1">{{$category->name}}</a></li>
									@endforeach
									<li class="left"><a href="#" id="product-shuffle"><i class="fa fa-random" aria-hidden="true"></i> shuffle</a></li>
								
								</ul>
								<ul class="masonry-list" id="appendCategory" style=" position: relative; height: 300.594px;">
									@foreach($subCategories as $category)
									   
									<li class="">

										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
												<a href="">
												
												<img alt="image description" src="{{$category->image_url}}">
												</a>
												<ul class="mt-stars">
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
												<ul class="links">
													
													<li><a href="{{url('products?category='.$category->id.'-'.string_replace($category->name).'&view-type=grid')}}" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">{{$category->name}}</strong>
												<!-- <span class="price"><i class="fa fa-eur"></i> <span>{{$category->price}}</span></span> -->
											</div><!-- txt end here -->
											
										</div><!-- mt product1 end here -->
									</li>
									 
									@endforeach
								 
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</main>

			@endsection

			@section('scripts')

<script type="text/javascript">



	$(document).ready(function() {

		const url = "{{ url('get-all-subcategories') }}";
	 

		$(".get_products").click(function (e) {
			e.preventDefault();
			var param = $(this).attr('data-id');
			show_loader();
			getHomeProducts(url, param);
		});
	});
		</script>
		@endsection