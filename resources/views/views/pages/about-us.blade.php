@extends('layouts.app')

@section('content')

<section class="flat-map">
<main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp animated" data-wow-delay="0.4s" style="background-image: url('{{asset('newdesign/images/img43.jpg')}}'); visibility: visible; animation-delay: 0.4s;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 text-center">
                <h1>ABOUT US</h1>
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="{{route('home')}}">home <i class="fa fa-angle-right"></i></a></li>
                    <li>About Us</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Content Banner of the Page end -->
        <!-- Mt About Section of the Page -->
        <section class="mt-about-sec">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="txt wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
                  <h2>WHO WE ARE?</h2>
                  <p>  {!!  $page->content !!}</p>
                </div>
                <div class="mt-follow-holder">
                  <span class="title">Follow Us</span>
                  <!-- Social Network of the Page -->
                  <ul class="list-unstyled social-network">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                  </ul>
                  <!-- Social Network of the Page end -->
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Mt About Section of the Page -->
        <!-- Mt Team Section of the Page -->
        <section class="mt-team-sec">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h3>OUR TEAM</h3>
                <div class="holder">
                  <!-- col of the Page -->
                  <div class="col wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
                    <div class="img-holder">
                      <a href="#">
                        <img src="{{asset('newdesign/images/img44.jpg')}}" alt="CLARA WOODEN">
                        <ul class="list-unstyled social-icon">
                          <li><i class="fa fa-twitter"></i></li>
                          <li><i class="fa fa-facebook"></i></li>
                          <li><i class="fa fa-linkedin"></i></li>
                        </ul>
                      </a>
                    </div>
                    <div class="mt-txt">
                      <h4><a href="#">CLARA WOODEN</a></h4>
                      <span class="sub-title">DESIGNER</span>
                    </div>
                  </div>
                  <!-- col of the Page end -->
                  <!-- col of the Page -->
                  <div class="col wow fadeInUp animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s;">
                    <div class="img-holder">
                      <a href="#">
                        <img src="{{asset('newdesign/images/img45.jpg')}}" alt="JOHN WICK">
                        <ul class="list-unstyled social-icon">
                          <li><i class="fa fa-twitter"></i></li>
                          <li><i class="fa fa-facebook"></i></li>
                          <li><i class="fa fa-linkedin"></i></li>
                        </ul>
                      </a>
                    </div>
                    <div class="mt-txt">
                      <h4><a href="#">JOHN WICK</a></h4>
                      <span class="sub-title">FOUNDER</span>
                    </div>
                  </div>
                  <!-- col of the Page end -->
                  <!-- col of the Page -->
                  <div class="col wow fadeInUp animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s;">
                    <div class="img-holder">
                      <a href="#">
                        <img src="{{asset('newdesign/images/img46.jpg')}}" alt="HARRY KANE">
                        <ul class="list-unstyled social-icon">
                          <li><i class="fa fa-twitter"></i></li>
                          <li><i class="fa fa-facebook"></i></li>
                          <li><i class="fa fa-linkedin"></i></li>
                        </ul>
                      </a>
                    </div>
                    <div class="mt-txt">
                      <h4><a href="#">HARRY KANE</a></h4>
                      <span class="sub-title">DESIGNER</span>
                    </div>
                  </div>
                  <!-- col of the Page end -->
                  <!-- col of the Page -->
                  <div class="col wow fadeInUp animated" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s;">
                    <div class="img-holder">
                      <a href="#">
                        <img src="{{asset('newdesign/images/img47.jpg')}}" alt="CLARA WOODEN">
                      </a>
                    </div>
                  </div>
                  <!-- col of the Page end -->
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Mt About Section of the Page -->
        <!-- Mt Workspace Section of the Page -->
        <section class="mt-workspace-sec wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h2>OUR WORKSPACE</h2>
              </div>
            </div>
          </div>
          <!-- Work Slider of the Page -->
          <ul class="list-unstyled work-slider slick-initialized slick-slider">
            
            
            
          <div aria-live="polite" class="slick-list draggable" style="padding: 0px 5%;"><div class="slick-track" role="listbox" style="opacity: 1; width: 8071px; left: -2306px;"><li class="slick-slide slick-cloned" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 1138px;" data-slick-index="-2" aria-hidden="true">
              <div class="img-holder">
                <img src="{{asset('newsesign/images/img48.jpg')}}" alt="image description">
              </div>
              <div class="img-holder">
                <div class="coll1">
                  <img src="{{asset('newdesignimages/img49.jpg')}}" alt="image description">
                </div>
                <div class="coll2">
                  <img src="{{asset('newdesignimages/img50.jpg')}}" alt="image description">
                </div>
                <div class="coll3">
                  <img src="{{asset('newdesignimages/img51.jpg')}}" alt="image description">
                </div>
              </div>
            </li><li class="slick-slide slick-cloned" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 1138px;" data-slick-index="-1" aria-hidden="true">
              <div class="img-holder">
                <img src="{{asset('newdesignimages/img48.jpg')}}" alt="image description">
              </div>
              <div class="img-holder">
                <div class="coll1">
                  <img src="{{asset('newdesignimages/img49.jpg')}}" alt="image description">
                </div>
                <div class="coll2">
                  <img src="{{asset('newdesignimages/img50.jpg')}}" alt="image description">
                </div>
                <div class="coll3">
                  <img src="{{asset('newdesign/images/img51.jpg')}}" alt="image description">
                </div>
              </div>
            </li><li class="slick-slide slick-current slick-active slick-center" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 1138px;" data-slick-index="0" aria-hidden="false">
              <div class="img-holder">
                <img src="{{asset('newdesign/images/img48.jpg')}}" alt="image description">
              </div>
              <div class="img-holder">
                <div class="coll1">
                  <img src="{{asset('newdesign/images/img49.jpg')}}" alt="image description">
                </div>
                <div class="coll2">
                  <img src="{{asset('newdesign/images/img50.jpg')}}" alt="image description">
                </div>
                <div class="coll3">
                  <img src="{{asset('newdesign/images/img51.jpg')}}" alt="image description">
                </div>
              </div>
            </li><li class="slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 1138px;" data-slick-index="1" aria-hidden="true">
              <div class="img-holder">
                <img src="{{asset('newdesign/images/img48.jpg')}}" alt="image description">
              </div>
              <div class="img-holder">
                <div class="coll1">
                  <img src="{{asset('newdesign/images/img49.jpg')}}" alt="image description">
                </div>
                <div class="coll2">
                  <img src="{{asset('newdesign/images/img50.jpg')}}" alt="image description">
                </div>
                <div class="coll3">
                  <img src="{{asset('newdesign/images/img51.jpg')}}" alt="image description">
                </div>
              </div>
            </li><li class="slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 1138px;" data-slick-index="2" aria-hidden="true">
              <div class="img-holder">
                <img src="{{asset('newdesign/images/img48.jpg')}}" alt="image description">
              </div>
              <div class="img-holder">
                <div class="coll1">
                  <img src="{{asset('newdesign/images/img49.jpg')}}" alt="image description">
                </div>
                <div class="coll2">
                  <img src="{{asset('newdesign/images/img50.jpg')}}" alt="image description">
                </div>
                <div class="coll3">
                  <img src="{{asset('newdesign/images/img51.jpg')}}" alt="image description">
                </div>
              </div>
            </li><li class="slick-slide slick-cloned slick-center" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 1138px;" data-slick-index="3" aria-hidden="true">
              <div class="img-holder">
                <img src="{{asset('newdesign/images/img48.jpg')}}" alt="image description">
              </div>
              <div class="img-holder">
                <div class="coll1">
                  <img src="images/img49.jpg" alt="image description">
                </div>
                <div class="coll2">
                  <img src="images/img50.jpg" alt="image description">
                </div>
                <div class="coll3">
                  <img src="images/img51.jpg" alt="image description">
                </div>
              </div>
            </li><li class="slick-slide slick-cloned" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 1138px;" data-slick-index="4" aria-hidden="true">
              <div class="img-holder">
                <img src="images/img48.jpg" alt="image description">
              </div>
              <div class="img-holder">
                <div class="coll1">
                  <img src="images/img49.jpg" alt="image description">
                </div>
                <div class="coll2">
                  <img src="images/img50.jpg" alt="image description">
                </div>
                <div class="coll3">
                  <img src="images/img51.jpg" alt="image description">
                </div>
              </div>
            </li></div></div><ul class="slick-dots" style="display: block;" role="tablist"><li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true" aria-controls="navigation00" id="slick-slide00"><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">1</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation01" id="slick-slide01"><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">2</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation02" id="slick-slide02"><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">3</button></li></ul></ul>
          <!-- Work Slider of the Page end -->
        </section>
        <!-- Mt Workspace Section of the Page -->
      </main>

    
@endsection