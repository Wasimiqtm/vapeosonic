@extends('layouts.app')

@section('content')
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner" style="background-image: url(images/img43.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>login</h1>
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="{{url('/')}}">home <i class="fa fa-angle-right"></i></a></li>
                                <li>login</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Content Banner of the Page end -->
        <!-- Mt About Section of the Page -->
        <section class="mt-about-sec" style="padding-bottom: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="txt wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt About Section of the Page -->
        <!-- Mt Detail Section of the Page -->
        <section class="mt-detail-sec toppadding-zero">
            <div class="container">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-xs-6 col-sm-6 col-sm-push-0">
                        <div class="holder" style="margin: 0;">
                            <div class="mt-side-widget">
                                <header>
                                    <h2 style="margin: 0 0 5px;">SIGN IN</h2>
                                    <p>Welcome back! Sign in to Your Account</p>
                                </header>
                                <form id="form-login" method="POST" action="{{ url('login') }}" >
                                    @csrf
                                    <input type="hidden" name="loginform" value="1">
                                    <fieldset>
                                        <input type="text" placeholder="Username or email address" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                                        <input type="password" placeholder="Password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        <div class="box">
                                            <span class="left"><input class="checkbox"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label for="check1">Remember Me</label></span>
                                            @if (Route::has('password.request'))
                                                <a class="help" href="{{ route('forget.password.get') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif

                                        </div>
                                        <button type="submit" class="btn-type1">Login</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-sm-push-0">
                        <div class="holder" style="margin: 0;">
                            <div class="mt-side-widget">
                                <header>
                                    <h2 style="margin: 0 0 5px;">SIGN UP</h2>

                                </header>
                                <form  id="form-register" method="POST" action="{{ url('register') }}" >
                                    @csrf
                                    <input type="hidden" name="loginform" value="1">
                                    <fieldset>
                                        <input type="text" placeholder="Username or email address" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                        <input type="password" placeholder="Password" class="input  @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" required>
                                        <input id="Address" type="text" class="input @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                                        <button type="submit" class="btn-type1">Register</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Detail Section of the Page end -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- banner frame start here -->
                    <div class="banner-frame toppadding-zero">
                        <!-- banner 5 white start here -->
                        <div class="banner-5 white wow fadeInLeft" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                            <img src="{{asset('newdesign/images/banner/img05.jpg')}}" alt="image description">
                            <div class="holder">
                                <div class="texts">
                                    <strong class="title">FURNITURE DESIGNS IDEAS</strong>
                                    <h3><strong>New</strong> Collection</h3>
                                    <p>Consectetur adipisicing elit. Beatae accusamus, optio, repellendus inventore</p>
                                    <span class="price-add">$ 79.00</span>
                                </div>
                            </div>
                        </div><!-- banner 5 white end here -->
                        <!-- banner 6 white start here -->
                        <div class="banner-6 white wow fadeInRight" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                            <img src="{{asset('newdesign/images/banner/img06.jpg')}}" alt="image description">
                            <div class="holder">
                                <strong class="sub-title">SOFAS &amp; ARMCHAIRS</strong>
                                <h3>3 Seater Leather Sofa</h3>
                                <span class="offer">
                      <span class="price-less">$ 659.00</span>
                      <span class="prices">$ 499.00</span>
                    </span>
                                <a href="product-detail.html" class="btn-shop">
                                    <span>shop now</span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div><!-- banner 5 white end here -->
                        <!-- banner box two start here -->
                        <div class="banner-box two">
                            <!-- banner 7 right start here -->
                            <div class="banner-7 right wow fadeInUp" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                                <img src="{{asset('newdesign/images/banner/img07.jpg')}}" alt="image description">
                                <div class="holder">
                                    <h2><strong>ACRYLIC FABRIC <br>BEAN BAG</strong></h2>
                                    <ul class="mt-stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <div class="price-tag">
                                        <span class="price">$ 99.00</span>
                                        <a class="shop-now" href="product-detail.html">SHOP NOW</a>
                                    </div>
                                </div>
                            </div><!-- banner 7 right end here -->
                            <!-- banner 8 start here -->
                            <div class="banner-8 wow fadeInDown" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                                <img src="{{asset('newdesign/images/banner/img08.jpg')}}" alt="image description">
                                <div class="holder">
                                    <h2><strong>CHAIR WITH <br>ARMRESTS</strong></h2>
                                    <ul class="mt-stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <div class="price-tag">
                                        <span class="price-off">$ 129.00</span>
                                        <span class="price">$ 99.00</span>
                                        <a class="btn-shop" href="product-detail.html">
                                            <span>HURRY UP!</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- banner 8 start here -->
                        </div>
                    </div><!-- banner frame end here -->
                </div>
            </div>
        </div>
    </main>


@endsection
