<!-- Mt Process Section of the Page -->
<div class="mt-process-sec">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-unstyled process-list">
                    <li class="active">
                        <span class="counter">01</span>
                        <strong class="title">Shopping Cart</strong>
                    </li>
                    <li>
                        <span class="counter">02</span>
                        <strong class="title">Check Out</strong>
                    </li>
                    <li>
                        <span class="counter">03</span>
                        <strong class="title">Order Complete</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- Mt Process Section of the Page end -->
<!-- Mt Product Table of the Page -->
<div class="mt-product-table">
    <div class="container">
        <div class="row border">
            <div class="col-xs-12 col-sm-6">
                <strong class="title">PRODUCT</strong>
            </div>
            <div class="col-xs-12 col-sm-2">
                <strong class="title">PRICE</strong>
            </div>
            <div class="col-xs-12 col-sm-2">
                <strong class="title">QUANTITY</strong>
            </div>
            <div class="col-xs-12 col-sm-2">
                <strong class="title">TOTAL</strong>
            </div>
        </div>
        @forelse($cartContents as $product)
        <div class="row border">
            <div class="col-xs-12 col-sm-2">
                <div class="img-holder">
                    <img src="{{ getProductDefaultImage($product->id) }}" alt="image description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <strong class="product-name"> {{$product->name}}</strong>
            </div>
            <div class="col-xs-12 col-sm-2">
                <strong class="price"><i class="fa "></i> {{$product->quantity . ' x £' . $product->price." "}}</strong>
            </div>
            <div class="col-xs-12 col-sm-2">
                <div class="quanlity">
                            <span class="btn-down" data-id="product{{$product->id}}" data-product="{{$product->id}}"></span>
                            <input type="text" name="number" class="qty product{{$product->id}}"  data-product="{{$product->id}}" data-quantity="{{getProductQuantity($product->id)}}" value="{{$product->quantity}}" min="1" max="{{getProductQuantity($product->id)}}" placeholder="Quantity" onkeyup="checkToUpdateCart(this)">
                            <span class="btn-up"  data-id="product{{$product->id}}" data-product="{{$product->id}}"></span>
                        </div>

            </div>
            <div class="col-xs-12 col-sm-2">
                <strong class="price"><i class="fa fa-gbp"></i>  {{$product->price * $product->quantity}}</strong>
                <a href="javascript:void(0)" class="remove-from-cart" data-id="{{$product->id}}"><i class="fa fa-close"></i></a>
            </div>
        </div>
        @empty
            <div  class="row border"><span>No Record Found</span></div>
        @endforelse


    </div>
</div><!-- Mt Product Table of the Page end -->
<!-- Mt Detail Section of the Page -->


@if(Auth::user()->type == 'dropshipper')

        @php
        $vatAmount =number_format(($originalPrice*$vatCharges)/100,2);
            $subTotal=number_format($subTotal+(($subTotal)*$vatCharges)/100,2)
        @endphp
    </tr>
@endif
@php $shippinCharge=0; $shippingeTax=0; $disc=0;@endphp
@if(Auth::user()->type == 'retailer')

    @php
        $vatAmount = 0;
            $pVat = (($subTotal)*$vatCharges)/100;
            $subTotal=number_format($subTotal,2);

    @endphp
@endif

<tr>
    @if(Auth::user()->type == 'dropshipper')
        @php
           $shippinCharge =  number_format(@$total_shipment_charges,2);

        @endphp
    @elseif(Auth::user()->type == 'wholesaler')

    @else

    @endif
</tr>

@if(Auth::user()->type == 'dropshipper')
    @php
        $shippingeTax = number_format(($total_shipment_charges*$vatCharges)/100,2);
            $total_shipment_charges=number_format($total_shipment_charges+(($total_shipment_charges)*$vatCharges)/100,2);
    @endphp
@endif

@if(Auth::user()->type == 'retailer')
        <?php
        $disc = $originalPrice - $subTotal;

        ?>

@endif

@if(Auth::user()->type == 'wholesaler')

        @php
            $discountAmount = number_format($originalPrice - $subTotal,2);
            $vatAmount = number_format(($subTotal*$vatCharges)/100,2);
            $subTotal=number_format($subTotal+($subTotal*$vatCharges)/100,2) @endphp

@endif

</tbody>
<section class="mt-detail-sec style1">
    <div class="container">
        <div class="row">
<!--            <div class="col-xs-12 col-sm-6">
                <h2>CALCULATE SHIPPING</h2>
                <form action="#" class="bill-detail">
                    <fieldset>
                        <div class="form-group">
                            <select class="form-control">
                                <option value="1">Select Country</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option value="1">State / Country</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option value="1">Zip / Postal Code</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="update-btn" type="submit">UPDATE TOTAL <i class="fa fa-refresh"></i></button>
                        </div>
                    </fieldset>
                </form>
            </div>-->
            <div class="col-xs-12 col-sm-6">
                <h2>CART TOTAL</h2>
                <ul class="list-unstyled block cart">
                    <li>
                        <div class="txt-holder">
                            <strong class="title sub-title pull-left">Product Total</strong>
                            <div class="txt pull-right">
                                <span><i class="fa fa-gbp"></i> {{$product->price * $product->quantity}}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="txt-holder">
                            <strong class="title sub-title pull-left">Credit Awarded</strong>
                            <div class="txt pull-right">
                                <span><i class="fa fa-gbp"></i> {{$getRewardDetails['checkout_reward_points']}}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="txt-holder">
                            <strong class="title sub-title pull-left">Vat</strong>
                            <div class="txt pull-right">
                                <span><i class="fa fa-gbp"></i> {{number_format($vatAmount,2)}}</span>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="txt-holder">
                            <strong class="title sub-title pull-left">SHIPPING</strong>
                            <div class="txt pull-right">
                                <strong>Free Shipping</strong>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="txt-holder">
                            <strong class="title sub-title pull-left">Wallet Discount</strong>
                            <div class="txt pull-right">
                                <span><i class="fa fa-gbp"></i> {{$getRewardDetails['user_reward_points']}}</span>
                            </div>
                        </div>
                    </li>
                    <li style="border-bottom: none;">
                        <div class="txt-holder">
                            <strong class="title sub-title pull-left">CART TOTAL</strong>
                            <div class="txt pull-right">
                                <span><i class="fa fa-gbp"></i> {{($subTotal - $getRewardDetails['user_reward_points'] > 0) ? $subTotal - $getRewardDetails['user_reward_points'] : 0}}</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="{{url('make-payment')}}" class="process-btn">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Mt Detail Section of the Page end -->


<script type="text/javascript">
    $(document).ready(function() {

        $(".quanlity span.btn-down").click(function(){
            var productId = $(this).attr('data-id');
            var input = $(".quanlity input."+productId);
            var id = $(this).attr('data-product');
            input.val(parseInt(input.val())-1);
            if(parseInt(input.val())<parseInt(input.attr("max"))){
                updateCartItems(id,input.val());
            }else{
                error_message("You have added maximum "+input.attr("max")+" quantity");
            }


        });
        $(".quanlity span.btn-up").click(function(){
            var productId = $(this).attr('data-id');
            var input = $(".quanlity input."+productId);
            var id = $(this).attr('data-product');
            if(parseInt(input.val())<parseInt(input.attr("max"))){
                input.val(parseInt(input.val())+1);
                updateCartItems(id, input.val());
            }else{
                error_message("You have added maximum "+input.attr("max")+" quantity");
            }
        });
        $(".update-cart").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var qty = $('.product'+id).val();
            var totalAvailable = $('.product'+id).attr('data-quantity');
            if(qty>totalAvailable){
                toastr.error('Quantity is greater than available stock');
            }else{
                updateCartItems(id,qty);
            }


        });
        // remove cart item
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure you want to delete this item ?")) {
                var id = $(this).attr('data-id');
                show_loader();
                $.ajax({
                    url: '{{ url('cart-remove') }}',
                    method: "DELETE",
                    data: {id: id},
                    success: function (response) {


                        if(response.status) {
                            $('body').find('.cartCount').text(response.cartTotal);

                            success_message("Item removed from cart successfully");
                            hide_loader();
                            getCartDetails();
                        } else {
                            $('body').find('.cartCount').text(response.cartTotal);
                            getCartDetails();
                            hide_loader();
                            toastr.error(response.message);
                        }
                    }
                });
            }
        });

    });

    function checkToUpdateCart(event){
        var currentValue = $(event).val();
        var totalAvailableProducts = $(event).attr('data-quantity');
        var id = $(event).attr('data-product');
        if(currentValue>parseInt(totalAvailableProducts)){
            var va = 0;
            $(event).val(va);
            toastr.error('Quantity is greater than available stock');

        }else{
            updateCartItems(id,currentValue);
        }

    }

    function updateCartItems(id,qty) {
        show_loader();
        $.ajax({
            url: '{{ url('cart-update') }}',
            method: "patch",
            data: {id: id, quantity: qty},
            success: function (response) {
                if(response.status) {
                    $('#cartTotal').text(response.cartTotal);
                    $('#cartPrice').text("£"+response.cartPrice);
                    success_message("Cart updated successfully");
                    hide_loader();
                    getCartDetails();
                } else {
                    hide_loader();
                    toastr.error("Sorry You Previous Request Already In Process");
                }
            }
        });
    }


</script>
