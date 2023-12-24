<!-- Page Loader -->
@php
    $count =0;
            if(auth()->user()){
               $count = getUserWishListCount(auth()->user()->id) ;

            }
@endphp

    <header id="mt-header" class="style14">
        <!-- mt bottom bar start here -->
        <div class="mt-top-bar" style="color: #a1a1a1;
    padding: 9px 0 7px;
    background: #f2f2f2 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 hidden-xs">
                        <span class="tel"> <i class="fa fa-phone" aria-hidden="true"></i> +1 (555) 333 22 11</span>
                        <a href="#" class="tel"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            info@schon.chairs</a>

                    </div>
                    <div  class="col-xs-12 col-sm-6 hidden-xs">
                        @if(Auth::check())
                            <span>User Name:- {{ Auth::user()->first_name  }} {{ Auth::user()->last_name }}</span>
                            @if(Auth::user()->type =='wholesaler' || Auth::user()->type =='dropshipper')
                                    <?php
                                    $user = Auth::user();
                                    $limit = (int) $user->max_limit;
                                    $totalAmountWallet = getWholsellerDataWallet($user->id);
                                    $previousAmount = $limit - abs($totalAmountWallet);
                                    ?>
                                <span>
                                    Available Balance :- &#163;{{number_format($totalAmountWallet,'2','.','')}}
                                </span>
                                <span>
                                    Outstanding Amount :- <span  style="font-weight: bold;color: red"> &#163;{{ number_format($previousAmount,'2','.','') }} </span>
                                </span>
                            @endif
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-3 text-right">
                        <!-- mt top lang start here -->
                        <div class="mt-top-lang">
                            @if(Auth::check() and !empty( Auth::user()->first_name ))

                                    <a href="{{url('profile')}}" title="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" class="lang-opener" style="color: #000000 !important;">{{ @$user->first_name }} {{ @$user->last_name }} &nbsp;<?php echo (Auth::user()->type =='wholesaler' || Auth::user()->type =='dropshipper')?(
                                            '(<span  style="font-weight: bold;color: green">'.Auth::user()->type.'</span>)'):''?><i class="fa fa-angle-down"
                                                                                                                                    aria-hidden="true"></i></a>
                            @else
                                <a href="#" class="lang-opener" style="color: #000000 !important;">My Account<i class="fa fa-angle-down"
                                                                             aria-hidden="true"></i></a>
                            @endif

                            <div class="drop">
                                <ul>

                                    @if(Auth::check())
                                        <li><a href="{{url('profile')}}" title="">Profile</a></li>

                                        <li><a href="{{url('my-orders')}}" title="">My Orders</a></li>
                                        <li><a href="{{url('my-Wishlist')}}" title="">Wishlist</a></li>
                                        <li><a href="{{url('cart-checkout')}}" title="">My Cart</a></li>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ url('login') }}">{{ __('Login / Register') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('wholesaler/register') }}">{{ __('Wholesaler Register') }}</a>
                                        </li>
<!--                                        <li class="nav-item">
                                            <a href="{{ url('dropshipper/register') }}">{{ __('Dropshipper Register') }}</a>
                                        </li>-->

                                    @endif



                                    @if(Auth::check())
                                        <li class="nav-item dropdown">

                                            <a href="{{ url('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ url('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div><!-- mt top lang end here -->
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-bottom-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- mt logo start here -->
                        <div class="mt-logo"><a href="{{route('home')}}"><img
                                        src="{{asset('newdesign/images/mt-logo.png')}}" alt="schon"></a></div>
                        <!-- mt icon list start here -->
                        <ul class="mt-icon-list">
                            <li class="hidden-lg hidden-md">
                                <a href="#" class="bar-opener mobile-toggle">
                                    <span class="bar"></span>
                                    <span class="bar small"></span>
                                    <span class="bar"></span>
                                </a>
                            </li>

                            <li><a href="#" class="icon-magnifier"></a></li>

                            @if (Auth::check())
                                <li class="drop hidden-xs" >
                                    <a href="javascript:void(0)" class="icon-heart cart-opener" onclick="getHomeWishList()"><span style="margin-bottom: -3px;" class="num wishlistCount">{{ $count }}</span></a>
                                    <!-- mt drop start here -->
                                    <div class="mt-drop">
                                        <!-- mt drop sub start here -->
                                        <div class="mt-drop-sub">
                                            <!-- mt side widget start here -->
                                            <div class="mt-side-widget" id="home_wish">



                                            </div><!-- mt side widget end here -->
                                        </div>
                                        <!-- mt drop sub end here -->
                                    </div><!-- mt drop end here -->
                                    <span class="mt-mdropover"></span>
                                </li>


                            @else
                                <li class="drop hidden-xs">
                                    <a href="{{ url('login') }}" class="icon-heart cart-opener"><span style="margin-bottom: -3px;" class="num">{{ $count }}</span></a>

                                    <span class="mt-mdropover"></span>
                                </li>

                            @endif

                            @if (Auth::check())

                                <li class="drop">
                                    <a href="#" class="cart-opener " onclick="getCartHome()">
                                        <span class="icon-handbag"></span>
                                        <span class="num  cartCount">{{(Auth::id())?Cart::session(Auth::id())->getTotalQuantity():Cart::getTotalQuantity()}}</span>
                                    </a>
                                    <!-- mt drop start here -->
                                    <div class="mt-drop">
                                        <!-- mt drop sub start here -->
                                        <div class="mt-drop-sub">
                                            <!-- mt side widget start here -->
                                            <div class="mt-side-widget" id="homeCart">

                                            </div>
                                        </div>
                                        <!-- mt drop sub end here -->
                                    </div><!-- mt drop end here -->
                                    <span class="mt-mdropover"></span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('login') }}" class="art-opener">
                                        <span class="icon-handbag"></span>
                                        <span style="margin-bottom: -3px;" class="num cartCount">{{ $count }}</span>
                                    </a>
                                </li>
                            @endif


                        </ul><!-- mt icon list end here -->
                        <!-- navigation start here -->
                        <nav id="nav">
                            <ul>

                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('products')}}">Products</a></li>
                                <li><a href="{{ url('page/term-condition') }}">Terms & Conditions</a></li>
                                <li><a href="{{url('faqs')}}">FAQs</a></li>
                                <li><a href="{{url('pages/about-us')}}">About us</a></li>
                                <li><a href="{{url('page/contact-us')}}">Contact Us</a></li>

                            </ul>
                        </nav>
                        <!-- mt icon list end here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- mt bottom bar end here -->
        <span class="mt-side-over"></span>
    </header>
    <!-- mt side menu start here -->
    <div class="mt-side-menu">
        <!-- mt holder start here -->
        <div class="mt-holder">
            <a href="#" class="side-close"><span></span><span></span></a>
            <strong class="mt-side-title">MY ACCOUNT</strong>
            <!-- mt side widget start here -->
            <div class="mt-side-widget">
                <header>
                    <span class="mt-side-subtitle">SIGN IN</span>
                    <p>Welcome back! Sign in to Your Account</p>
                </header>
                <form id="login" action="{{'login'}}">
                    @csrf
                    <input type="hidden" name="loginform" value="1">
                    <fieldset>
                        <input id="email" class="input @error('email') is-invalid @enderror"
                               placeholder="username or email" type="email" name="email" value="{{ old('email') }}"
                               required autocomplete="email">
                        <div class="help-block with-errors">

                        </div>

                        <!-- <input name="loginform"  type="text" placeholder="Username or email address" class="input"> -->

                        <input type="password" placeholder="Password"
                               class="input @error('password') is-invalid @enderror">

                        <div class="box">
									<span class="left"><input class="checkbox" type="checkbox" id="check1">
									<label for="check1">Remember Me</label>
								</span>
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
            <!-- mt side widget end here -->
            <div class="or-divider"><span class="txt">or</span></div>
            <!-- mt side widget start here -->
            <div class="mt-side-widget">
                <header>
                    <span class="mt-side-subtitle">CREATE NEW ACCOUNT</span>
                    <p>Create your very own account</p>
                </header>
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}

                    <fieldset>


                        <input type="text" placeholder="E-Mail Address" class="input" name="email"
                               value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                        @endif

                        <input type="password" placeholder="Password" class="input" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
                        @endif

                        <input type="text" placeholder="Address" class="input" name="address">

                        <!-- You can add more dynamic input fields here as needed -->

                        <button type="submit" class="btn-type1">Register</button>
                    </fieldset>
                </form>

            </div>
            <!-- mt side widget end here -->
        </div>
        <!-- mt holder end here -->
    </div>
    <!-- mt search popup start here -->
    <div class="mt-search-popup">
        <div class="mt-holder">
            <a href="#" class="search-close"><span></span><span></span></a>
            <div class="mt-frame">
                <form  >

                    <input type="hidden" name="page" value="1">
                    <fieldset>
                        <input type="text"  name="search"  id="searchValue" value="{{ @Request::get('search') }}"  placeholder="Search...">
                        <span class="icon-microphone"></span>
                        <button class="icon-magnifier" type="button" onclick="searchItems()"></button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

			


