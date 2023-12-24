@extends('layouts.app')

@section('content')
    <main id="mt-main">
        <input type="hidden" id="page_records" value="1"/>
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(images/img-76.jpg);">
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
            <div class="container" id="partial_records">


            </div>
        </div><!-- Mt Product Table of the Page end -->
        <div class="paddingbootom-md hidden-xs"></div>
    </main>



@endsection

@section('scripts')
<script type="text/javascript">

    $(document).ready(function() {

        var url = "{{ url('get-my-orders') }}";
        getMyOrders(url, 500);
    });

    function transactionDetails(id){

        var popup = function() {
            $('.popup-newsletter').each( function() {
                $(this).closest('.boxed').children('.overlay').css({
                    opacity: '1',
                    display: 'block',
                    zIndex: '89999'
                });
                $(".popup span" ).on('click', function() {
                    $(this).closest('.popup-newsletter').hide(400);
                    $(this).closest('.boxed').children('.overlay').css({
                        opacity: '0',
                        display: 'none',
                         zIndex: '909'
                    });
                });
            });
        };

        show_loader();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ url('get-transaction-details') }}',
            method: "post",
            data: {id: id},
            success: function (response) {
                console.log(response.data);
                if(response.status){
                    $('.payer_name').text(response.data.payer_name.full_name);
                    $('.payer_email').text(response.data.payer);
                    $('.shipping_address').text(response.data.shipping_address);
                    $('.trans_number').text(response.data.trans_id);
                    $('.amount').text(response.data.amount + ' ' + response.data.currency);
                    $('.pay_via').text('PayPal');
                    $('.payment_status').text('Verified');
                    hide_loader();
                }
            }
        });

        popup();
        $('.popup-newsletter').show();
    }

</script>
@endsection
