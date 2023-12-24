
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
                                <li><a onclick="addToCart({{$product->id}})"><i class="icon-handbag"></i><span>Add to Cart</span></a></li>
                                <li><a onclick="addRemoveWishlist({{$product->id}})"><i class="icomoon icon-heart-empty"></i></a></li>
                                <li><a href="#"><i class="icomoon icon-exchange"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="txt">
                    <strong class="title"><a href="product-detail.html">{{$product->name}}</a></strong>
                    <span class="price"><i class="fa fa-gbp"> </i> <span>{{$product->price}}</span>
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
