
@extends('layouts.app')

@section('content')

<main id="mt-main">
  <section class="mt-contact-banner mt-banner-22" style="background-image: url({{ asset('newdesign/images/img-76.jpg') }});">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="text-center">Wish List</h1>
          <!-- Breadcrumbs of the Page -->
          <nav class="breadcrumbs">
            <ul class="list-unstyled">
              <li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
              <li>Wish List</li>
            </ul>
          </nav>
          <!-- Breadcrumbs of the Page end -->
        </div>
      </div>
    </div>
  </section>
  <div class="paddingbootom-md hidden-xs"></div>
  <!-- Mt Product Table of the Page -->
  <div class="mt-product-table paddingtop-md paddingbootom-md">
    <div class="container">
      @forelse($wishlist_records as $wishlist)
      @if(@$wishlist->product)
      @php
      $product = $wishlist->product;
      @endphp
      <div class="row border">
        <div class="col-xs-12 col-sm-2">
          <div class="img-holder">
            <img src="{{ $product->default_image_url }}" alt="image description">
          </div>
        </div>
        <div class="col-xs-12 col-sm-5">
          <strong class="product-name">{{ $product->name }}</strong>
        </div>
        <div class="col-xs-12 col-sm-2">
          <strong class="product-name"><i class="fa fa-eur"></i> {{ $product->discountedPrice }}</strong>
        </div>
        <div class="col-xs-12 col-sm-2">
          <form action="#" class="coupon-form">
            <fieldset>
              <button type="submit" style="margin-top: 15px;">APPLY</button>
            </fieldset>
          </form>
        </div>
        <div class="col-xs-12 col-sm-1">
          <button class="btn btn-danger btn-sm remove-from-cart" onclick="removeWishlist({{$product->id}})"><i class="fa fa-trash-o"></i></button>
        </div>
      </div>
      @endif
      @empty
      <div class="row border">
        <div class="col-xs-12">
          <p>No Records Found</p>
        </div>
      </div>
      @endforelse
    </div>
  </div><!-- Mt Product Table of the Page end -->
  <div class="paddingbootom-md hidden-xs"></div>
</main>



      @endsection

<div class="wishlist-content">
    <table class="table-wishlist">
        <thead>
            <tr>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Stock Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($wishlist_records as $wishlist)
            @if(@$wishlist->product)
            @php
                $product = $wishlist->product;
            @endphp
            <tr>
                <td>
                    <div class="delete">
                        <!-- <a href="javascript:void(0)" title="" onclick="removeWishlist({{$wishlist->product->id}})"><img src="{{asset('front_assets/images/icons/delete.png')}}" alt=""></a> -->
                        <button class="btn btn-danger btn-sm remove-from-cart" onclick="removeWishlist({{$product->id}})"><i class="fa fa-trash-o"></i></button>
                    </div>
                    <div class="product">
                        <a href="{{ url('products/'.Hashids::encode($product->id)) }}" class="image">
                            <img src="{{ $product->default_image_url }}" alt="">
                        </a>
                        <div class="name">
                            {{$product->name}} <br />{{$product->code}}
                        </div>
                    </div>
                </td>
                <td>
                    <div class="price">
                        <span class="sale">£{{ $product->discountedPrice }}</span>
                        @if($product->discount_type>0)
                            <span class="regular">£{{ number_format($product->price,2) }}</span>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="status-product">
                        @if(@$product->store_products[0]->quantity>0)
                            <span style="background-color: green;">In stock</span>
                        @else
                            <span>Out of stock</span>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="add-cart">
                        <a href="javascript:void(0)" title="" onclick="addToCart({{$product->id}})">
                            <img src="{{asset('front_assets/images/icons/add-cart.png')}}" alt="">Add to Cart
                        </a>
                    </div>
                </td>
            </tr>

            @endif
        @empty
            <tr><td colspan="4">No Records Found</td></tr>
        @endforelse
        </tbody>
    </table><!-- /.table-wishlist -->
</div><!-- /.wishlist-content -->
