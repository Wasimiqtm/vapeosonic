@extends('layouts.app')

@section('content')


<main id="mt-main">
				<!-- Mt Product Detial of the Page -->
				<section class="mt-product-detial wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<!-- Slider of the Page -->
                                <div class="slider">
									<!-- Comment List of the Page -->
									<ul class="list-unstyled comment-list">
										<li><a href="#"><i class="fa fa-heart"></i>27</a></li>
										<li><a href="#"><i class="fa fa-comments"></i>12</a></li>
										<li><a href="#"><i class="fa fa-share-alt"></i>14</a></li>
									</ul>
									<!-- Comment List of the Page end -->
									<!-- Product Slider of the Page -->
									<div class="product-slider">
									@foreach($images as $image)
										<div class="slide">
											<img src="{{ $image->image_url }}" alt="image descrption">
										</div>
										 @endforeach
									</div>
									<!-- Product Slider of the Page end -->
									<!-- Pagg Slider of the Page -->
									<ul class="list-unstyled slick-slider pagg-slider">
									@foreach($images as $image)
										<li><div class="img"><img src="{{ $image->image_url }}" alt="image description"></div></li>
										@endforeach
									</ul>
									<!-- Pagg Slider of the Page end -->
								</div>
								<!-- Slider of the Page end -->
								<!-- Detail Holder of the Page -->
								<div class="detial-holder">
									<!-- Breadcrumbs of the Page -->
									<ul class="list-unstyled breadcrumbs">

                                    @if($product->category_products->count()>0)
                            @if(@$product->category_products[0]->category->name)
                                <li class="trail-item">
                                    <a href="#" id="">{{ $product->category_products[0]->category->name }}<i class="fa fa-angle-right"></i></a>
                                   
                                </li>
                            @endif
                            @if(@$product->category_products[1]->category->name)
                                <li class="trail-end">
                                    <a href="{{url('products?order=asc&page=1&category_id='.@$product->category_products[1]->category->id)}}" title="">{{ $product->category_products[1]->category->name }}</a>
                                </li>
                            @endif
                        @endif
										 
									</ul>

									<!-- <ul class="list-unstyled breadcrumbs">
										<li><a href="#">Chairs <i class="fa fa-angle-right"></i></a></li>
										<li>Products</li>
									</ul> -->
									<!-- Breadcrumbs of the Page end -->
									<h2>{{$product->name}}</h2>
									<!-- Rank Rating of the Page -->
									<div class="rank-rating">
										<ul class="list-unstyled rating-list">
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o"></i></a></li>
										</ul>
										<span class="total-price">Reviews (12)</span>
									</div>
									<!-- Rank Rating of the Page end -->
									<ul class="list-unstyled list">
										<li><a href="#"><i class="fa fa-share-alt"></i>SHARE</a></li>
										<li><a href="#"><i class="fa fa-exchange"></i>COMPARE</a></li>
										<li><a href="#"><i class="fa fa-heart"></i>ADD TO WISHLIST</a></li>
									</ul>
									<div class="txt-wrap">
                                        <p>{!! $product->meta_description !!}</p>
									</div>

									

                                   
									<div class="text-holder">

                                    <span class="price">{{$product->price}} </span>
									</div>
									<!-- Product Form of the Page -->
									<form action="#" class="product-form">
										<fieldset>
											<div class="row-val">
												<label for="qty">qty</label>
												<input type="number" id="qty" class="qty" placeholder="1">
											</div>
		
											<div class="row-val" id="add-to-cart">
												<button type="submit">ADD TO CART</button>
											</div>
										</fieldset>
									</form>
									<!-- Product Form of the Page end -->
								</div>
								<!-- Detail Holder of the Page end -->
							</div>
						</div>
					</div>
				</section><!-- Mt Product Detial of the Page end -->
				<div class="product-detail-tab wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<ul class="mt-tabs text-center text-uppercase">
									<li><a href="#tab1" class="active">DESCRIPTION</a></li>
									<li><a href="#tab2" class="">INFORMATION</a></li>
									<li><a href="#tab3" class="" id="reviewCount">REVIEWS (12)</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab1" class="active">
										<p>{!! $product->full_detail !!}</p>
									</div>
                                    <div id="tab2" class="js-tab-hidden">
										<p>{!! $product->tecnical_specs !!}</p>
									</div>
									
									<div id="tab3" class="js-tab-hidden">
										<div class="product-comment">
											<div id="comment">

											</div>
											 
											
											<form  method="POST" class="p-commentform">
											 
												<fieldset>
													<h2>Add  Comment</h2>
													<div class="mt-row">
														<label>Rating</label>
														<ul class="mt-star">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
													</div>
													<div class="mt-row">
														<label>Name</label>
														<input type="text" name="name-author"  class="form-control">
													</div>
													<div class="mt-row">
														<label>E-Mail</label>
														<input type="text" name="email-author" class="form-control">
													</div>
													<div class="mt-row">
														<label>Review</label>
														<textarea class="form-control" name="review-text"></textarea>
													</div>
													<button type="button" class="btn-type4" id="addreview">ADD REVIEW</button>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- related products start here -->
				<div class="related-products wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
							<h2>RELATED PRODUCTS</h2>
								<div class="row">
									<div class="col-xs-12">
										<!-- mt product1 center start here -->
										<div class="mt-product1 mt-paddingbottom20">
											<div class="box">
												<div class="b1">
													<div class="b2">
														
														<a href=""><img src="{{$product->images}}" alt="image description"></a>
														<!-- <span class="caption">
															<span class="new">NEW</span>
														</span> -->
														<ul class="mt-stars">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
														<ul class="links">
															<li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a></li>
															<li><a href="#"><i class="icomoon icon-heart-empty"></i></a></li>
															<li><a href="#"><i class="icomoon icon-exchange"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="txt">
												<strong class="title"><a href="product-detail.html">Puff Chair</a></strong>
												<span class="price"><i class="fa fa-eur"></i> <span>287,00</span></span>
											</div>
										</div><!-- mt product1 center end here -->
										<!-- mt product1 center end here -->
									</div>
								</div>
							</div>
						</div>
					</div><!-- related products end here -->
				</div>
			</main>

			

@endsection
@section('scripts')
<script type="text/javascript">
        var productID = "{{$product->id}}";
        var authType ="{{Auth::user()?Auth::user()->type:''}}";
        var mark_up =parseInt("{{Auth::user()?Auth::user()->mark_up:0}}");
        var varientData =parseInt("{{$product->is_variants?$product->is_variants:0}}");
        var product_attributes =parseInt("{{$product->product_attributes?$product->product_attributes->count():0}}");
        var countAttributes = [];
         console.log(product_attributes);
        $(document).ready(function() {
            getProductReviews(productID);
            $("#addreview").on("click",function(){

                if($("textarea[name='review-text']").val() !='' && $("input[name='name-author']").val() !='' ) {
                    $.ajax({
                        url: '{{ url('add-product-review') }}',
                        method: "POST",
                        data: {
                            product_id: productID,
                            name: $("input[name='name-author']").val(),
                            email: $("input[name='email-author']").val(),
                            description: $("textarea[name='review-text']").val()
                        },
                        success: function (response) {

                            toastr.success(response.message);
                            getProductReviews(productID);
                        }
                    });
                }else{
                    toastr.error("Please Provide Name and Description");
                }
            })
            $(".variants select").on("change",function(){

                var id = $(this).data('id');
                var product_id = $('#product_id').val();
                var variant_id = $(this).val();
                var val = $(this).find('option:selected').text();
                $("#product-variant-"+id).val(val);

                show_loader();
                if(id==1 && variant_id>0){
                    countAttributes = countAttributes.filter(item => item.id !== id);
                    countAttributes.push({id:id});
                    var child_variant_id = $("#product-variant-2").val();
                    $.ajax({
                        url: '{{ url('get-product-variants') }}',
                        method: "POST",
                        data: {id: id, product_id:product_id, child_variant_id:child_variant_id, variant_id:variant_id, val: val},
                        success: function (response) {
                            hide_loader();
                            if(variant_id==0){
                                $(".variant-main-2").hide();
                            }
                            var variants = response.variants;
                            if(variants.length>0){
                                $(".variant-main-2").show();
                                $(".variant-main-2 select").html('<option value="0">Select '+variants[0].variant.name+'</option>');
                                for (x in variants) {
                                    $(".variant-main-2 select").append('<option value='+variants[x].variant_id+'>'+variants[x].name+'</option>');
                                }
                            }
                            activeVariantProduct(response.product);


                        }
                    });
                }else if(id==2 && variant_id>0){
                    countAttributes = countAttributes.filter(item => item.id !== id);
                    countAttributes.push({id:id});
                    var parent_variant_id = $("#product-variant-1").val();
                    $.ajax({
                        url: '{{ url('get-product-variants') }}',
                        method: "POST",
                        data: {id: id, product_id:product_id, parent_variant_id:parent_variant_id, variant_id:variant_id, val: val},
                        success: function (response) {
                            hide_loader();
                            activeVariantProduct(response.product);
                        }
                    });
                }else {

                    var prdQuantity = $(this).find('option:selected').attr('prd-default');

                    if(prdQuantity>0) {
                        $("#available").text('In stock');
                        $("#available").css('background-color', 'green');
                        $(".qty").attr('max',prdQuantity);
                        $(".quanlity").show();
                        $(".add-to-cart").attr('disabled',false);
                    }
                    hide_loader();
                }


            });

            function activeVariantProduct(product){

                if(typeof(product) != "undefined" && product !== null) {
                    $(".title_name").text(product.name);
                    $("#add-to-cart").attr("data-id",product.id);
                    $(".wishlist").attr("onclick","addRemoveWishlist("+product.id+")");

                    if(product.is_variants==1){
                        var price = product.price;

                        $(".regular").text('£'+parseFloat(price).toFixed(2));
                        if(product.discount_type=="1"){
                            var discount = ((parseInt(price)*product.discount)/100);
                            price = parseFloat(price)-discount;
                        }else if(product.discount_type=="2"){
                            price = parseInt(price)-product.discount;
                        }
                    }else{
                        var price =0;

                        var actual_price = product.discountedPrice;
                        if(product.is_main_price==1){
                            price = product.product.price;
                        }else{
                            price = product.price;
                        }
                        if(authType !='' && authType =='wholesaler'){

                        var percent =( mark_up/100);
                        percent = product.cost * percent;
                            var productCost = parseFloat(product.cost);
                            price = parseFloat(percent) + productCost;

                        }else if(authType !='' && authType =='dropshipper'){
                            price = product.discountedPrice;
                        }else{



                            if(product.product.discount_type ==="1"){
                                var discount = ((parseFloat(price)*parseInt(product.product.discount))/100);

                                price = parseFloat(price)-discount;
                            }else if(product.product.discount_type=="2"){
                                price = parseInt(price)-product.product.discount;
                            }
                        }

                        $(".regular").text('£'+parseFloat(actual_price).toFixed(2));
                        $(".sale").text('£'+parseFloat(price).toFixed(2));


                    }

                    $(".sale").text('£'+parseFloat(price).toFixed(2));

                    $(".flex-control-thumbs li").each(function(){
                        if($(this).find('img').attr('src')==product.image_thumb)
                            $(this).find('img').click();
                    });

                    if(product.store_products.length>0){
                        if(product.store_products[0].quantity>0){
                            $("#available").text('In stock');
                            $("#available").css('background-color','green');
                            $(".qty").attr('max',product.store_products[0].quantity);
                            $(".quanlity").show();
                            $("#add-to-cart").attr('disabled',false);
                        }
                    }else{
                        $("#available").text('Out of stock');
                        $("#available").css('background-color','red');
                        $(".quanlity").hide();
                        $("#add-to-cart").attr('disabled',true);
                    }

                }
            }

            //update cart
            $("#add-to-cart").click(function (e) {
                e.preventDefault();
                if($(this).attr('disabled') =='disabled'){
                    return false;
                }

                if(product_attributes !== countAttributes.length){
                    error_message('Select Variant to add to cart');
                    return  false
                }
                var id = $(this).attr('data-id');
                var qty = $('.qty').val();
                // show_loader();
                $.ajax({
                    url: '{{ url('cart-add') }}',
                    method: "POST",
                    data: {id: id, quantity: qty},
                    success: function (response) {
                        if(response.status){
                            $('#cartTotal').text(response.cartTotal);
                            $('#cartPrice').text('£'+response.cartPrice);
                            // hide_loader();
                            success_message("Item successfully added to your cart");
                        } else {
                            error_message(response.message);
                        }
                    }
                });
            });



        });

        function addRemoveWishlist(product_id){
            var url = "{{ url('products/get-products') }}";
            var current_url     = window.location.href;
            var post_url        = "{{url('add-to-wishlist')}}";
            var current_url_split = current_url.split('?');
            var category_id = getParams('category_id', current_url);
            var page_number = getParams('page', current_url);
            if(!page_number){
                page_number = 1;
            }
            var records =  getParams('records', current_url);
            if(!records){
                records = 12;
            }
            var ordering=  getParams('order', current_url);
            if(!ordering){
                ordering = 'asc';
            }

            if(current_url_split.length>1){
                url = url+'?'+current_url_split[1];
            }else{
                url = url+'?page='+page_number+'&category_id='+category_id;
            }

            var login_check = "{{Auth::check()}}";

            favoriteRequest(product_id, url, records, ordering, login_check, post_url, true);
        }

        function getProductReviews(id) {

            $.ajax({
                url: '{{ url('get-product-review') }}',
                method: "POST",
                data: {
                    product_id: id,

                },
                success: function (response) {
				 
                    $("#comment").html('');
					$("#reviewCount").text(`REVIEW (${response.data.length})`)
                    if(response.data.length>0){
                        var html = '';

                        $.each(response.data,(index,value)=>{

							html+=`<div class="mt-box">
												<div class="mt-hold">
													<ul class="mt-star">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-o"></i></li>
													</ul>
													<span class="name">${value.name}</span>
													<time datetime="2016-01-01">${value.dated}</time>
												</div>
												<p>${value.description}</p>
											</div>`;
                            
                        });
						
                        $("#comment").append(html);
                    }
                }
            });
        }

        function updateWishlistDropdown() {
    $/*.ajax({
        type: 'GET',
        url: '{{--{{  route("update-wishlist") }}--}}',
        dataType: 'json',
        success: function (response) {
            var wishlist_records = response.wishlist_records;
            var wishlistDropdown = $('.icon-heart .mt-side-widget');

            // Clear the existing content
            wishlistDropdown.empty();

            // Append the wishlist items
            $.each(wishlist_records, function (index, record) {
                wishlistDropdown.append('<div class="cart-row">' +
                    '<a href="#" class="img"><img src="' + record.product.product_images[0].image_url + '" alt="image" class="img-responsive"></a>' +
                    '<div class="mt-h">' +
                    '<span class="mt-h-title"><a href="#">' + record.product.name + '</a></span>' +
                    '<span class="price"><i class="fa fa-eur" aria-hidden="true"></i> ' + record.product.price + '</span>' +
                    '</div>' +
                    '<a href="#" class="close fa fa-times" onclick="removeFromWishlist(' + record.product.id + ')"></a>' +
                    '</div>');
            });
        },
        error: function () {
            // Handle errors if any
        }
    });*/
}

    </script>
@endsection