<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/homepage10.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Sep 2023 07:08:31 GMT -->
<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schön. | eCommerce HTML5 Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- include the site stylesheet -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <!-- include the site stylesheet -->
    <!-- <link rel="stylesheet" href="{{asset('newdesgin/css/bootstrap.css')}}">
 -->
    <link rel="stylesheet" href="{{asset('newdesign/css/bootstrap.css')}}">

    <!-- include the site stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('newdesign/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('newdesign/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('newdesign/css/icon-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('newdesign/css/animate.css')}}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="css/icon-fonts.css">
    <!-- include the site stylesheet -->

    <link rel="stylesheet" type="text/css" href="{{asset('newdesign/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('newdesign/images')}}">
    <!-- include the site stylesheet -->
    <!-- <link rel="stylesheet" type="text/css"  href=""> -->
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5dfb9b29f3c77900129a7017&product=sticky-share-buttons&cms=sop' async='async'></script>
    <style>
        .links li a {
            cursor: pointer;
        }
        .disableSection {
            pointer-events: none;
            opacity: 0.4;
        }
    </style>
    @yield('style')
    <script>
        var base_url = '{{ url("") }}';
        var admin_url = '{{ url("admin") }}';
    </script>
</head>
<body>

<div id="wrapper">
    <!-- Page Loader -->
    <div id="pre-loader" class="preloader loader-container">
        <div class="loader">
            <img src="{{asset('newdesign/images/svg/rings.svg')}}" alt="loader">
        </div>
    </div>
    <!-- W1 start here -->
    <div class="w1">
        <!-- mt header style9 start here -->
        @include('sections.header')


        @yield('content')



        @include('sections.footer')
    </div><!-- W1 end here -->

    <span id="back-top" class="fa fa-arrow-up"></span>
</div>


<script src="{{asset('newdesign/js/jquery.js')}}"></script>
<script src="{{asset('front_assets/js/scripts.js')}}"></script>
<script src="{{asset('newdesign/js/plugins.js')}}"></script>

<script src="{{asset('newdesign/js/jquery.main.js')}}"></script>

<script>


    $(document).ready(function () {
        $("a[title ~= 'BotDetect']").css('visibility', 'hidden');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //getCartHome()
        $('body').on("click", ".remove-items", function (e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure you want to delete this item ?")) {
                var id = $(this).attr('data-id');
                show_loader();
                $.ajax({
                    url: '{{ url('cart-remove') }}',
                    method: "DELETE",
                    data: {id: id},
                    success: function (response) {
                        $('body').find('.cartCount').text(response.cartTotal);

                        getCartHome()
                        $(".preloader").hide();

                    }
                });
            }
        });

    })

    function getCartHome() {


        $.ajax({
            url: '{{ url('cart-details') }}',
            method: "post",
            dataType: "",
            data: {from: 'home'},
            success: function (response) {
                if (response) {
                    $('#homeCart').html(response);
                    // $('#cart_details').LoadingOverlay('hide');
                }
            }
        });

    }

    function getHomeWishList(){

        var url = "{{ url('get-wishlist') }}";
        getWishlist(url, 500,'home','','home_wish');
    }

    function removeHomeWishlist(product_id,userID){


        var url = "{{ url('get-wishlist') }}";
        var token = "{{ csrf_token() }}";

        getWishlist(url, 500, 'home', product_id,'home_wish');

    }

    function searchItems(){
        let defaultUrl = '{{ url('products') }}';
         let url = defaultUrl+'?category=all&records=10&order=desc&page=1&filter=true&view-type=grid&search='+$("#searchValue").val();
        window.location.href = url;
    }


</script>

@include('admin.sections.notification')
@yield('scripts')
</body>

</html>