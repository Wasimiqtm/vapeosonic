@if($listType ==='grid')
    <ul class="mt-productlisthold list-inline" id="partial_records">


        @forelse($products as $product)
                <?php $slug = (!empty($product->slug)) ? $product->slug : Hashids::encode($product->id); ?>

            <li>
                <!-- mt product1 large start here -->
                <div class="mt-product1 large">
                    <div class="box">
                        <div class="b1">
                            <div class="b2">
                                <a href="{{ url('products/'.$slug) }}"><img src="{{ $product->default_image_url }}"
                                                                            alt="image description"></a>
                                <ul class="mt-stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                <ul class="links">
                                    <li><a onclick="addToCart({{$product->id}})"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                    </li>
                                    <li><a onclick="addRemoveWishlist({{$product->id}})"><i
                                                    class="icomoon icon-heart-empty"></i></a></li>
                                    <li><a href="#"><i class="icomoon icon-exchange"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="txt">
                        <strong class="title"><a href="{{ url('products/'.$slug) }}">{{$product->name}}</a></strong>
                        <span class="price">
                        @if(Auth::check() && Auth::guard('web')->check() && Auth::user()->type != 'retailer')
                                @if(Auth::user()->type == 'wholesaler')
                                        <?php $totalPercent = ($product->cost * Auth::user()->mark_up / 100); ?>

                                    <i class="fa fa-gbp"> </i>
                                    <span>{{number_format(($product->cost + $totalPercent),2,'.','') }}</span>

                                @else

                                    <i class="fa fa-gbp"> </i> <span>{{  $product->discountedPrice }}</span>
                                @endif
                            @else
                                @if($product->discount_type>0)
                                    <!---<i class="fa fa-gbp"> </i> <span>{{ number_format($product->price,2) }}</span> !--->

                                @endif
                                <i class="fa fa-gbp"> </i> <span>{{ $product->discountedPrice }}</span>

                            @endif

                    </span>

                    </div>
                </div><!-- mt product1 center end here -->
            </li>

        @empty

            <li>No Records Found</li>
        @endforelse

    </ul><!-- mt productlisthold end here -->
    <!-- mt pagination start here -->

    {{$products->links()}}
@else

    @forelse($products as $product)
            <?php $slug = (!empty($product->slug)) ? $product->slug : Hashids::encode($product->id); ?>

        <div class="product-post">
            <!-- img holder start here -->
            <div class="img-holder">
                <a href="{{ url('products/'.$slug) }}"><img src="{{ $product->default_image_url }}"
                                                            alt="image description"></a>
            </div><!-- img holder end here -->
            <!-- txt holder start here -->
            <div class="txt-holder">
                <!-- align left start here -->
                <div class="align-left">
                    <strong class="title"><a href="{{ url('products/'.$slug) }}">{{$product->name}}</a></strong>
                    <span class="price"><i class="fa fa-gbp"></i>  {{$product->price}}</span>
                    <p>{!! $product->detail !!}</p>
                </div><!-- align left end here -->
                <!-- align right start here -->
                <div class="align-right">
                    <ul class="list-unstyled rating-list">
                        <li class="active"><a href="#"><i class="fa fa-star"></i></a></li>
                        <li class="active"><a href="#"><i class="fa fa-star"></i></a></li>
                        <li class="active"><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                        <li>Reviews (12)</li>
                    </ul>
                    <a href="#" class="btn-cart" onclick="addToCart({{$product->id}})">ADD TO CART</a>
                    <ul class="list-unstyled nav">
                        <li><a href="#" onclick="addRemoveWishlist({{$product->id}})"><i class="fa fa-heart"></i> ADD TO
                                WISHLIST</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> COMPARE</a></li>
                    </ul>
                </div><!-- align right end here -->
            </div><!-- txt holder end here -->
        </div>
    @empty

        <div>No Records Found</div>
    @endforelse



    {{$products->links()}}
@endif
