@extends('layouts.app')

@section('content')

    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner" style="background-image: url(images/img43.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>register</h1>
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="{{url('/')}}">home <i class="fa fa-angle-right"></i></a></li>
                                <li>register</li>
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
                    <div class="col-xs-12 col-sm-10 col-sm-push-1">
                        <div class="holder" style="margin: 0;">
                            <div class="mt-side-widget">
                                <header>
                                    <h2 style="margin: 0 0 5px;">Register</h2>
                                    <p>Don’t have an account?</p>
                                </header>
                                <form  method="POST" action="{{ url('register') }}" style="margin: 0 0 80px;">
                                @csrf

                                    <input type="hidden" name="type" value="{{$userType}}">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <input id="email" type="email" class="input @error('email') is-invalid @enderror" 
                                                name="email" value="{{ old('email') }}" required autocomplete="email" 
                                                type="text" placeholder="Email Address">
                                                <div class="help-block with-errors"></div>
                                @if($errors->has('email') && !old('loginform'))
                                    <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('email') }}</p>
                                </span>
                                @endif
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <input id="company_name" type="text" placeholder="company Name" class=" input @error('company_name') is-invalid @enderror" name="company_name"
                                                 value="{{ old('company_name') }}"  required >
                                                 <div class="help-block with-errors"></div>
                                                 @if($errors->has('company_name') && !old('loginform'))
                                               <span class="invalid-feedback" role="alert">
                                                 <p class="help-block">{{ $errors->first('company_name') }}</p>
                                </span>
                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <input id="vat_number" type="text" class="input @error('vat_number') is-invalid @enderror" name="vat_number" 
                                                value="{{ old('vat_number') }}" 
                                                required type="text" placeholder="VAT ">
                                                <div class="help-block with-errors"></div>
                                                @if($errors->has('vat_number') && !old('loginform'))
                                               <span class="invalid-feedback" role="alert">
                                                  <p class="help-block">{{ $errors->first('vat_number') }}</p>
                                               </span>
                                               @endif
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <input id="Address" type="text" class="input @error('address') is-invalid @enderror" 
                                                name="address"
                                                 value="{{ old('address') }}" required autocomplete="email" type="text" placeholder="Address">
                                                 @if($errors->has('address') && !old('loginform'))
                                <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('address') }}</p>
                                </span>
                            @endif
                                          
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <input  id="contact_number" type="text" class="input @error('contact_number') is-invalid @enderror" 
                                                name="contact_number" value="{{ old('contact_number') }}" required type="text"
                                                 placeholder="Contact Number ">
                                                 <div class="help-block with-errors"></div>
                                @if($errors->has('contact_number') && !old('loginform'))
                                    <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('contact_number') }}</p>
                                </span>
                                @endif
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                            <input  id="password" type="password" class="input @error('password') is-invalid @enderror" 
                                            name="password" required autocomplete="new-password" type="password" 
                                            placeholder="Re-type Password">
                                                <div class="help-block with-errors"></div>
                                @if($errors->has('password') && !old('loginform'))
                                    <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('password') }}</p>
                                </span>
                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <input   type="password" placeholder="Re-type Password" class="input">
                                            </div>
                                        <button type="submit" class="btn-type1">Register Me</button>
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
                        <div class="banner-5 white wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
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
                        <div class="banner-6 white wow fadeInRight" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInRight;">
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
                            <div class="banner-7 right wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
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
