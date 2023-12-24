@forelse($wishlist_records as $wishlist)
    @if(@$wishlist->product)
        @php
            $product = $wishlist->product;
        @endphp
<div class="cart-row">
    <a href="{{ url('products/'.Hashids::encode($product->id)) }}" class="img"><img src="{{ $product->default_image_url }}" alt="image" class="img-responsive"></a>
    <div class="mt-h">
        <span class="mt-h-title"><a href="{{ url('products/'.Hashids::encode($product->id)) }}"> {{$product->name}}</a></span>
        <span class="price"><i class="fa fa-gbp" aria-hidden="true"></i>{{ $product->discountedPrice }}</span>
    </div>
    <a href="javascript:void(0)" class="close fa fa-times" onclick="removeHomeWishlist({{$product->id}},{{auth()->user()->id}})"></a>
</div>


    @endif
@empty
    <div class="row border"><span >No Records Found</span></div>
@endforelse
