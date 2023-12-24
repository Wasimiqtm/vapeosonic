@extends('layouts.app')
@section('style')
    <style>

        .quanlity {
            position: relative;
            top: 64px;
        }

        .quanlity span.btn-down {
            position: absolute;
            z-index: 9;
            top: 12px;
            left: 22px;
            padding: 10px 10px;
            cursor: pointer;
        }

        .quanlity .btn-down:before {
            content: '';
            position: absolute;
            width: 15px;
            height: 1px;
            background: #484848;
            top: 11px;
            left: 2px;
            cursor: pointer;
        }

        .quanlity span.btn-up {
            position: absolute;
            z-index: 9;
            top: 13px;
            right: 56px;
            padding: 10px 10px;
            cursor: pointer;
        }

        .quanlity .btn-up:after {
            content: '';
            position: absolute;
            width: 1px;
            height: 15px;
            background: #484848;
            top: 3px;
            right: 10px;
            cursor: pointer;
        }

        .quanlity .btn-up:before {
            content: '';
            position: absolute;
            width: 15px;
            height: 1px;
            background: #484848;
            top: 9.5px;
            right: 2.5px;
        }

        .quanlity input {
            width: 160px;
            text-align: center;
            padding: 15px 30px;
            height: 45px;
        }

        @media only screen and (max-width: 1199px) {
            .quanlity  {
                top: 0px;

            }
            .quanlity input {
                width: 100%;

            }

            .quanlity span.btn-up {

                right: 20px;

            }
        }s

    </style>
@endsection
@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <main id="mt-main">
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(images/img-76.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center">SHOPPING CART</h1>
                        <!-- Breadcrumbs of the Page -->
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
                                <li>Shopping Cart</li>
                            </ul>
                        </nav>
                        <!-- Breadcrumbs of the Page end -->
                    </div>
                </div>
            </div>
        </section>
        <div id="cart_details"></div>
    </main>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            getCartDetails();


        });

        function getCartDetails() {
            $.ajax({
                url: '{{ url('cart-details') }}',
                method: "post",
                dataType: "html",
                success: function (response) {
                    if (response) {
                        $('#cart_details').html(response);
                        // $('#cart_details').LoadingOverlay('hide');
                    }
                }
            });
        }
    </script>
@endsection
