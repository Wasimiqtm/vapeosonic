@forelse($cartContents as $product)
<div class="cart-row">
												
													
         <a href="#" class="img"><img src="{{ getProductDefaultImage($product->id) }}" alt="image" class="img-responsive"></a>
<div class="mt-h">
          <span class="mt-h-title"><a href="#">{{$product->name}} </a></span>
               <span class="price"><i class="fa fa-eur" aria-hidden="true"></i> 	£{{$product->price * $product->quantity}}</span>
          <span class="mt-h-title">Qty: {{$product->quantity}}</span>
               </div>
  <a href="javascript:void(0)" class="close fa fa-times remove-items" data-id="{{$product->id}}"></a>
</div>
@empty
<div class="cart-row"><span colspan="4">No Record Found</span></div>
				@endforelse

                @if(Auth::user()->type == 'dropshipper')
                    
                        @php 
                        $subTotal=number_format($subTotal+(($subTotal)*$vatCharges)/100,2) 
                        @endphp
                    
                    @endif
                    @if(Auth::user()->type == 'retailer')
                     
                        @php 
                            $pVat = (($subTotal)*$vatCharges)/100;
                            $subTotal=number_format($subTotal,2);
                        @endphp
                    @endif

                    

                    @if(Auth::user()->type == 'wholesaler')
                   
                        @php $subTotal=number_format($subTotal+($subTotal*$vatCharges)/100,2) @endphp
                 
                    @endif
                                        
                                            <!-- cart row total start here -->
                         <div class="cart-row-total">
                       <span class="mt-total">Sub Total</span>
          <span class="mt-total-txt"><i class="fa fa-eur" aria-hidden="true"></i> £{{$subTotal}}</span>
      </div>
                                            <!-- cart row total end here -->
      <div class="cart-btn-row">
                           <a href="{{url('cart-checkout')}}" class="btn-type2">VIEW CART</a>
                       <a href="{{url('make-payment')}}" class="btn-type3">CHECKOUT</a> 
                     </div>