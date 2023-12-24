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
    <!-- hidden fields -->



@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function() {

            var url = "{{ url('get-wishlist') }}";
            getWishlist(url, 500,'','','partial_records');
        });

        function removeWishlist(product_id){


            var url = "{{ url('get-wishlist') }}";
            var token = "{{ csrf_token() }}";

            getWishlist(url, 500, token, product_id);
        }

    </script>
@endsection