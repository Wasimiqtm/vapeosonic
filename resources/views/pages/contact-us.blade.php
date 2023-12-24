@extends('layouts.app')

@section('content')
<main id="mt-main">
        <!-- Mt Contact Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp animated" data-wow-delay="0.4s" style="background-image: url('{{ asset('newdesign/images/img06.jpg') }}'); visibility: visible; animation-delay: 0.4s;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 text-center">
                <h1>CONTACT</h1>
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="{{route('home')}}">Home <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section><!-- Mt Contact Banner of the Page -->
        <!-- Mt Contact Detail of the Page -->
        <section class="mt-contact-detail content-info wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <div class="txt-wrap">
                </div>
                <ul class="list-unstyled contact-txt">
                  <li>
                    <strong>Address</strong>
                    <address>Test <br />Test
                                <br /> Test
                                <br />Test</address>
                  </li>
                  <li>
                    <strong>Phone</strong>
                    <a href="#">0535345345</a>
                  </li>
                  <li>
                    <strong>E_mail</strong>
                    <a href="#">test@gmail.com</a>
                  </li>
                  <li>
                    <strong>Opening Hours</strong>
                    <a href="#">24/7</a>
                  </li>
                </ul>
              </div>
              <div class="col-xs-12 col-sm-4">
                <h2>Have a question?</h2>
                

                {!!  $page->content !!}

                <form action="#" class="contact-form"  method="POST" id="form-contact">
                {{ csrf_field() }}
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Name"  name="name" id="name-contact" required>
                    <input type="email" class="form-control" placeholder="E-Mail"  name="email" required>
                    <input type="text" class="form-control" placeholder="Subject" name="subject" required  id="subject-contact">
                    <input type="text" class="form-control" placeholder="comment">
                    <textarea class="form-control"  name="message" placeholder="Message" required></textarea>
                    <button class="btn-type3" type="submit">Send</button>
                  </fieldset>
                </form>


              </div>
            </div>
          </div>
        </section><
      
      </main>
      @endsection