@forelse($wishlist_records as $wishlist)
    @if(@$wishlist->product)
        @php
            $product = $wishlist->product;
        @endphp
<div class="row border">
    <div class="col-xs-12 col-sm-2">
        <div class="img-holder">
            <a href="{{ url('products/'.Hashids::encode($product->id)) }}" class="image">
                <img src="{{ $product->default_image_url }}" alt="">
            </a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-5">
        <strong class="product-name">  {{$product->name}}</strong>
    </div>
    <div class="col-xs-12 col-sm-2">
        @if(@$product->store_products[0]->quantity>0)
            <strong class="product-name">In stock</strong>
        @else
            <span>Out of stock</span>
        @endif

    </div>
     <div class="col-xs-12 col-sm-2">
         <strong class="product-name"><i class="fa fa-gbp"></i>{{ $product->discountedPrice }}</strong>


    </div>

    <div class="col-xs-12 col-sm-1">
        <a href="javascript:void(0)" onclick="removeWishlist('{{$product->id}}')"><i class="fa fa-close"></i></a>
    </div>
</div>

    @endif
@empty
    <div class="row border"><span >No Records Found</span></div>
@endforelse
