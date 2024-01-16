

<?php
$vatCharges = getVatCharges();
?>

@forelse($myOrders as $myOrder)
    <table>
        <tr>
            <td> <span style="font-weight: bold;">Order Id : {{$myOrder->paypal_id}}</span></td>
        </tr>
    </table>
        <?php
        $cart = @$myOrder->cart;
        $user = unserialize(@$cart->user_details);

        $cart_details = unserialize(@$cart->cart_details);
        $courierAssignment = courierDetailData($cart->id);
        $subtotal = 0;
        $courier=0;
        $courierAmout =0;
        ?>
    @forelse($myOrder->purchasedItems as $order_item)
        @if(!$order_item->product)
            @php continue;@endphp

        @endif

        @php

            $single_item = collect($cart_details)->where('id', $order_item->product->id)->first();
            $productVat = getOrderProductTaxAmount($myOrder->purchasedItems, $single_item['id']);
            // dd($single_item);

            $courier = 0;
            if (@$single_item['conditions']) {
                $courier = $single_item['conditions']->getValue()??0;
            }


            if(@$courierAssignment->status == 2){
                $courierDetailDataCharges =courierDetailDataCharges($single_item['id'],$cart->id);
                if (@$courierDetailDataCharges->couriers) {
                    $courier = @$courierDetailDataCharges->couriers->charges;
                }
            }

            $courierAmout = ($courier + $courierAmout );

            $unit_price = $single_item['price'];
            $courierVat = 0;
            if ($courier > 0 && $vatCharges > 0) {
            $courierVat = $courier * ($vatCharges/100);
            }


           $item_sub_total = $unit_price * $single_item['quantity'];
           $subtotal = ($subtotal + $item_sub_total);
           $item_discount = (@$single_item['item_discount'])?$single_item['item_discount']:0;
           $item_sub_total = $item_sub_total - $item_discount - @$myOrder->used_reward_points;
            if(Auth::user()->type == 'retailer'){
                $item_sub_total = $item_sub_total;
            }else{
                 $item_sub_total = $item_sub_total + $productVat + $courier +  $courierVat;
            }



        @endphp
        <div class="row border">
            <div class="col-xs-12 col-sm-2">
                <div class="img-holder">
                    <a href="{{ url('products/'.Hashids::encode($order_item->product->id)) }}" class="image">
                        <img src="{{ $order_item->product->default_image_url }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5">
                <strong class="product-name">    {{$order_item->product->name}} <br />{{$order_item->product->code}}</strong>
            </div>
            <div class="col-xs-12 col-sm-2">
                <strong class="product-name">   {{$order_item->quantity}}</strong>
            </div>
            <div class="col-xs-12 col-sm-2">
                <strong class="product-name"><i class="fa fa-gbp"></i>{{ number_format($item_sub_total,2) }}</strong>


            </div>
            <div class="col-xs-12 col-sm-2">
                @if($myOrder->is_refunded == 1)
                    <strong style="color:#5cb85c;">Refunded</strong>
                @elseif($myOrder->refund_request == 1)
                    <strong  style="color:#d9534f;">Request sent for refund</strong>
                @else
                    {{$myOrder->cart->delivery_status}}
                @endif


            </div>
            <div class="col-xs-12 col-sm-2">
                @if($myOrder->refund_request == 0)
                    <a class="transaction-details btn btn-primary btn-sm" href="{{route('return.order',['order_id' => $myOrder->id,'cart_id' => $myOrder->cart->id])}}" >Refund Order</a> |
                @endif
                <a class="transaction-details btn btn-primary btn-sm" href="javascript:void(0)" onclick="transactionDetails('{{$myOrder->paypal_id}}')">Details</a>


            </div>

        </div>

    @empty
        <div><span>No Records Found</span></div>
    @endforelse
@empty
    <div><span>No Records Found</span></div>
@endforelse

