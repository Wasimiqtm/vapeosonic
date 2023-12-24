@extends('layouts.app')
@section('content')
<main id="mt-main">
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(images/img-76.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h1 class="text-center">CHECK OUT</h1>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
                    <li>Check Out</li>
                  </ul>
                </nav>
                <!-- Breadcrumbs of the Page end -->
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Process Section of the Page -->
        <div class="mt-process-sec">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <!-- Process List of the Page -->
                <ul class="list-unstyled process-list">
                  <li class="active">
                    <span class="counter">01</span>
                    <strong class="title">Shopping Cart</strong>
                  </li>
                  <li class="active">
                    <span class="counter">02</span>
                    <strong class="title">Check Out</strong>
                  </li>
                  <li>
                    <span class="counter">03</span>
                    <strong class="title">Order Complete</strong>
                  </li>
                </ul>
                <!-- Process List of the Page end -->
              </div>
            </div>
          </div>
        </div><!-- Mt Process Section of the Page end -->
        <!-- Mt Detail Section of the Page -->
        <section class="mt-detail-sec toppadding-zero">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <h2>BILLING DETAILS</h2>
                <!-- Bill Detail of the Page -->
                <form action="#" class="bill-detail">
                  <fieldset>
                    <div class="form-group">
                      <select class="form-control">
                        <option value="1">Select Country</option>
                        <option value="1">USA</option>
                        <option value="1">UK</option>
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <div class="col">
                        <input type="text" id="first-name" name="first_name" class="form-control"
                            placeholder="First Name"
                          value="{{ Auth::user()->type != 'dropshipper' ? Auth::user()->first_name : '' }}"
                          required>
                      </div>
                      <div class="col">
                        <input type="text" id="last-name" name="last_name" class="form-control"
                                                    placeholder="Last Name"
                        value="{{ Auth::user()->type != 'dropshipper' ? Auth::user()->last_name : '' }}"
                      required>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" placeholder="Company Name"  id="company-name" name="company_name"required class="form-control"
                                            value="{{ $userData['company_name'] ?? '' }}"
                                            {{ Auth::user()->type == 'wholesaler' ? 'required' : '' }} placeholder="Company Name">
                    </div>
                    <div class="form-group">
                      <textarea type="text" id="address" name="address"
                      value="{{ $userData['address'] ?? '' }}" required class="form-control" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="text" id="town-city" name="town_city" class="form-control"
                      value="{{ $userData['town_city'] ?? '' }}" required placeholder="Town / City">
                    </div>
                    <div class="form-group">
                      <input type="text" id="state-country" name="state_country"
                      class="form-control" value="{{ $userData['state_country'] ?? '' }}"
                      required placeholder="State / Country">
                    </div>
                    <div class="form-group">
                      <input type="text" id="post-code" name="post_code"
                      value="{{ $userData['post_code'] ?? '' }}" required  class="form-control" placeholder="Postcode / Zip">
                    </div>
                    <div class="form-group">
                      <div class="col">
                        <input type="email" id="email-address" name="email_address"
                        value="{{ Auth::user()->email }}" readonly  class="form-control" placeholder="Email Address">
                      </div>
                      <div class="col">
                        <input id="phone" name="phone" class="form-control"
                      value="{{ Auth::user()->phone }}" required type="tel" placeholder="Phone Number">
                      </div>
                    </div>
                   </fieldset>
                </form>
                <!-- Bill Detail of the Page end -->
                </div>
              <div class="col-xs-12 col-sm-6">
                <div class="holder">
                  <h2>YOUR ORDER</h2>
                
                   
                  <ul class="list-unstyled block">
    <ul class="list-unstyled block">
        <li>
            <div class="txt-holder">
                <div class="text-wrap pull-left">
                    <strong class="title">PRODUCTS</strong>
                    @forelse($cartContents as $product)
                        <span>{{ str_limit($product->name, 20) }}</span><br>
                    @empty
                        <span>Cart is empty</span>
                    @endforelse
                </div>
                <div class="text-wrap txt text-right pull-right">
                    <strong class="title">TOTALS</strong>
                    @forelse($cartContents as $product)

                        @if (Auth::user()->type == 'wholesaler')
                                @php $price = $product->price . ' * ' . $product->quantity . ' = ' . $product->price * $product->quantity; @endphp
                        @else
                            @php $price =  number_format(getProductDetails($product->id)->price, 2) . ' * ' . $product->quantity . ' = ' . number_format(getProductDetails($product->id)->price * $product->quantity, 2); @endphp

                        @endif
                        <span><i class="fa fa-gbp"></i> {{$price}}</span><br>
                    @empty
                        <span><i class="fa fa-gbp"></i> 0.00</span>
                    @endforelse
                </div>
            </div>
        </li>
        @if ($cartContents->isNotEmpty() && $cartContents->first()->charges_check == 1)
            <li>
                <div class="txt-holder">
                    <strong class="title sub-title pull-left">Courier Charges</strong>
                    <div class="txt pull-right">
                        <span><i class="fa fa-gbp"></i> {{ $cartContents->first()->courier_detail ? $cartContents->first()->courier_detail->couriers->charges : 0 }}</span>
                    </div>
                </div>
            </li>
        @endif
        <li>
            <div class="txt-holder">
                <strong class="title sub-title pull-left">CART SUBTOTAL</strong>
                <div class="txt pull-right">
                    <span><i class="fa fa-gbp"></i> {{ $subTotal }}</span>
                </div>
            </div>
        </li>
        <li>
            <div class="txt-holder">
                <strong class="title sub-title pull-left">SHIPPING</strong>
                <div class="txt pull-right">
                    <span>Free Shipping</span>
                </div>
            </div>
        </li>
        
            <li>
                <div id="discount-container">
                 <strong class="title sub-title pull-left">Discount</strong>
                   <div class="txt pull-right">
                <span><i class="fa fa-gbp"></i> <span id="discount-amount">0.00</span></span>
                     </div>
</div>

            </li>
     
        <li style="border-bottom: none;">
            <div class="txt-holder">
                <strong class="title sub-title pull-left">ORDER TOTAL</strong>
                <div class="txt pull-right">
                    <span><i class="fa fa-gbp"></i> {{ $subTotal }}</span>
                </div>
            </div>
        </li>
    </ul>
</ul>



              <h2>PAYMENT METHODS</h2>
                  <!-- Panel Group of the Page -->
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <!-- Panel Panel Default of the Page -->
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            DIRECT BANK TRANSFER
                            <span class="check"><i class="fa fa-check"></i></span>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <p>Make your payment directly into our bank account. Please use your order id as the payment reference. Your order wont be shippided until the funds have cleared in our account</p>
                        </div>
                      </div>
                    </div>
                    <!-- Panel Panel Default of the Page end -->
                    <!-- Panel Panel Default of the Page -->
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            CHEQUE PAYMENT
                            <span class="check"><i class="fa fa-check"></i></span>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                          <p>Make your payment directly into our bank account. Please use your order id as the payment reference. Your order wont be shippided until the funds have cleared in our account</p>
                        </div>
                      </div>
                    </div>
                    <!-- Panel Panel Default of the Page end -->
                    <!-- Panel Panel Default of the Page -->
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            PAYPAL
                            <span class="check"><i class="fa fa-check"></i></span>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                          <p>Make your payment directly into our bank account. Please use your order id as the payment reference. Your order wont be shippided until the funds have cleared in our account</p>
                        </div>
                      </div>
                    </div>
                    <!-- Panel Panel Default of the Page end -->
                  </div>
                
                </div>
                <div class="block-holder">
                  <input type="checkbox" checked=""> I’ve read &amp; accept the <a href="#">terms &amp; conditions</a>
                </div>
                <a href="#" class="process-btn">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Detail Section of the Page end -->
      </main>
@endsection

<script
        src="https://www.paypal.com/sdk/js?client-id=AbFSkkSixS51Qe_69o4v1RVOvTeTAcFYW-d8SspuBFQWswkBsof5UsvNF6RGAFMLIoZn7Z4PEnYYhJei&currency=GBP">
    </script>
    {{-- sandbox --}}
    {{-- <script src="https://www.paypal.com/sdk/js?client-id=AbFSkkSixS51Qe_69o4v1RVOvTeTAcFYW-d8SspuBFQWswkBsof5UsvNF6RGAFMLIoZn7Z4PEnYYhJei&currency=GBP"></script> --}}

    <script type="text/javascript">
        var discountAmount = "{{ isset($discountAmount) ? @$discountAmount : 0 }}";
        var vatAmount = "{{ isset($vatAmount) ? @$vatAmount : 0 }}";
        document.getElementById('discount-amount').textContent = discountAmount;
        $(document).ready(function() {
            // disable payment
            $("#paypal-button-container").addClass("disableSection");

            // save user data
            $('#myForm').validator().on('submit', function(e) {
                if (e.isDefaultPrevented()) {
                    // handle the invalid form...

                } else {

                    e.preventDefault();
                    // everything looks good!
                    var formData = $('#myForm').serialize();
                    show_loader();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ url('save-user-info') }}',
                        method: "post",
                        data: {
                            formData: formData
                        },
                        success: function(response) {
                            if (response) {
                                if (response.status) {
                                    // enable payment
                                    $("#paypal-button-container").removeClass("disableSection");
                                    $(".paywithwallet").removeClass("disableSection");
                                    $("#myForm").addClass("disableSection");
                                    toastr.success(response.message);
                                    hide_loader();
                                }
                            }
                        }
                    });
                }
            })

            // paypal starts
            if ("{{ Auth::id() }}") {
                PayPalPayment();
                /*setTimeout(function(){
                	PayPalPayment();
                }, 3000);*/
            }
            // paypal starts

            // get cart
            getCartDetails();
        });

        function getCartDetails() {
            $.ajax({
                url: '{{ url('cart-details') }}',
                method: "post",
                dataType: "html",
                success: function(response) {
                    if (response) {
                        $('#cart_details').html(response);
                    }
                }
            });
        }

        function PayPalPayment() {
            // var amount = "{{ Auth::id() ? Cart::session(Auth::id())->getSubTotal() ?? 0 : 0 }}";
            var amount = "{{ $subTotal }}";
            paypal.Buttons({
                style: {
                    color: 'blue',
                    shape: 'pill',
                    label: 'pay',
                    height: 40
                },
                createOrder: function(data, actions) {

                    // Set up the transaction
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: amount,
                                currency: 'GBP'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {

                        var trans_id = details.id;
                        var payer = details.payer.email_address;
                        var payer_name = details.purchase_units[0].shipping.name;
                        var payee = details.purchase_units[0].payee.email_address;
                        var merchant_id = details.purchase_units[0].payee.merchant_id;
                        var amount = details.purchase_units[0].amount.value;
                        var currency = details.purchase_units[0].amount.currency_code;
                        var shipping_address = details.purchase_units[0].shipping.address.admin_area_1;

                        var allData = {
                            trans_id: trans_id,
                            payer: payer,
                            payer_name: payer_name,
                            payee: payee,
                            merchant_id: merchant_id,
                            amount: amount,
                            currency: currency,
                            shipping_address: shipping_address,
                            discount: discountAmount,
                            vat_amount: vatAmount
                        };


                        // alert('Transaction completed by ' + details.payer.name.given_name);
                        // Call your server to save the transaction
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '{{ url('/paypal-transaction-complete') }}',
                            method: "post",
                            data: allData,
                            success: function(response) {
                                console.log(response);
                                if (response.status) {
                                    window.location.href = "{{ url('my-orders') }}";
                                }
                            },
                            error: function(request, status, error) {
                                alert(request.responseText);
                            }
                        });
                    });
                },
                onCancel: function(data, actions) {
                    toastr.error("You have cancelled the payment");
                    return false;
                }
            }).render('#paypal-button-container');
        }

        function payWithWallet(subtotal, available) {
            if (available > subtotal) {
                $.ajax({
                    url: '{{ url('/paywith-wallet') }}',
                    method: "post",
                    data: {
                        amount: subtotal,
                        discount: discountAmount,
                        vat_amount: vatAmount
                    },
                    success: function(response) {
                        if (response.status) {
                            window.location.href = "{{ url('my-orders') }}";
                        }
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            } else {
                toastr.error("Your wallet amount is less than cart amount please pay with alternate payment method");
                return false;
            }
        }
    </script>
 
