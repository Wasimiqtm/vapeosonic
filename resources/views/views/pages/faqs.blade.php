@extends('layouts.app')

@section('content')


<section class="flat-row flat-accordion">
    <div class="container">
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner" style="background-image: url('{{ asset('newdesign/images/img43.jpg') }}');">
          <div class="container">
            <div class="row">
            
              <div class="col-xs-12 text-center">
                <h1>FAQ's</h1>
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="{{route('home')}}">home <i class="fa fa-angle-right"></i></a></li>
                    <li>FAQ's</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
 

<div class="container faq-section mt-about-sec">
          <div class="row txt">
            <div class="col-xs-12">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              @foreach($faqs as $faq)
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}" class="collapsed">
                      {{$faq->question}}
                      </a>
                    </h4>
                  </div>
                  <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                      {!! $faq->answer !!}
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
        </div>

  
@endsection
