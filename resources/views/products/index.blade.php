@extends('layouts.app')
@section('style')
    <style>
        /* Style the outer pagination container */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Style each pagination item */
        .page-item {
            list-style: none;
            margin-right: 10px;
        }

        /* Style the pagination links */
        .page-link {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            color: #333;
            text-decoration: none;
        }

        /* Style the active page link */
        .page-item.active .page-link {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
        }

        /* Style the "Next" and "Previous" buttons */
        .page-item span.page-link {
            cursor: not-allowed;
        }

    </style>
@endsection
@section('content')

    
<main id="mt-main">
				<!-- Mt Contact Banner of the Page -->

                <section class="mt-contact-banner style4" style="background-image: url(images/img11.jpg);">
                <div class="container">

                         <div class="row">
                            <div class="col-xs-12 text-center">
                           <h1></h1>
                             
                                
								<!-- Breadcrumbs of the Page -->
								<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="{{url('/')}}">Home <i class="fa fa-angle-right"></i></a></li>
										<li><a href="{{url('products')}}">Products <i class="fa fa-angle-right"></i></a></li>
										<li>Chairs</li>
									</ul>
								</nav><!-- Breadcrumbs of the Page end -->
                                
                            </div>
						</div>
                    
					</div>
                
				</section>
			<!-- Mt Contact Banner of the Page end -->
				<div class="container">
					<div class="row">
						<!-- sidebar of the Page start here -->
						<aside id="sidebar" class="col-xs-12 col-sm-4 col-md-3 wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
                            @include('products.search_input_view')
							<!-- shop-widget of the Page start here -->
							<section class="shop-widget">
								<h2>CATEGORIES</h2>
								<!-- category list start here -->
								<ul class="list-unstyled category-list">
                                @forelse(getCategories() as $category)
                                    <li>
                                        <span class="categoryType" id="{{$category->id.'-'.$category->name}}">{{$category->name}}</span>
                                        @if($category->subcategories->count()>0)
                                            <ul class="cat-child">
                                                @foreach($category->subcategories as $subcategory)
                                                    <li>
                                                        <a class="categoryType" id="{{$subcategory->id.'-'.$subcategory->name}}"  href="javascript:void(0)" title="">{{$subcategory->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @empty
                                    <li>No Records Found</li>
                                @endforelse
									 
								</ul><!-- category list end here -->
							</section><!-- shop-widget of the Page end here -->

						</aside><!-- sidebar of the Page end here -->
						<div class="col-xs-12 col-sm-8 col-md-9 wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
							<!-- mt shoplist header start here -->
							<header class="mt-shoplist-header">
								<!-- btn-box start here -->
								<div class="btn-box">
									<ul class="list-inline">
                                        <li>
                                            <input type="hidden" name="page_records" value="2" class="page_records">
                                            <input type="hidden" name="page_order" value="desc" class="page_order">
                                            <div class="popularity">
                                                <select name="order" class=" order">
                                                    <optgroup label="Age">
                                                        <option value="desc">Newest First</option>
                                                        <option value="asc">Oldest First</option>
                                                    </optgroup>
                                                    <optgroup label="Price">
                                                        <option value="lowest">Lowest Price First</option>
                                                        <option value="highest">Highest Price First</option>
                                                    </optgroup>
                                                </select>

                                            </div>
                                        </li>
                                        <li>
                                            <select name="per_page_records" class="per_page_records">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                            </select>
                                        </li>
										<li><a class="mt-viewswitcher grid " href="javascript:void(0)" onclick="changeViewType(this)"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>
										<li><a class="mt-viewswitcher list" href="javascript:void(0)" onclick="changeViewType(this)"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
									</ul>
								</div><!-- btn-box end here -->
								<!-- mt-textbox start here -->
<!--								<div class="mt-textbox">
									<p>Showing  <strong>1–9</strong> of  <strong>65</strong> results</p>
									<p>View   <a href="#">9</a> / <a href="#">18</a> / <a href="#">27</a> / <a href="#">All</a></p>
								</div>--><!-- mt-textbox end here -->
							</header><!-- mt shoplist header end here -->
							<!-- mt productlisthold start here -->
							<div id="partial_records"></div>

						</div>
					</div>
				</div>
			</main>
@endsection

@section('scripts')
    <script src="{{asset('js/jquery-ui-1.10.1.custom.min.js')}}"></script>
<script type="text/javascript">

    function make_params_checked(val, current_url){
        val = val.replace(" ", "");
        if(current_url.indexOf(val)){
            /*$('.'+val).prop('checked', true);
            $('.'+val).closest(".moreOptons_box").addClass("checked");*/

        }
    }

    $(document).ready(function() {

        const url = "{{ url('get-products') }}";
        let current_url = window.location.href;

        let page_number = getParams('page', current_url);
        if(!page_number){
            page_number = 1;
        }

        // getting records from url
        let records =  getParams('records', current_url);
        if(!records){
            records = 50;
        }
        $(".per_page_records").val(records);

        // getting order from url
        let ordering=  getParams('order', current_url);
        if(!ordering){
            ordering = 'desc';
        }
        $('.order').val(ordering);

        // append category and view type in url
        let check_view_type=  getParams('view-type');
        if(!check_view_type){
            check_view_type='grid';
        }

        let check_view=  getParams('category');
        if(!check_view){
            current_url = current_url+'?category=all&view-type='+check_view_type;
        }

        // check view type on window load


        // more options url
        let more_options_url = '';
        if((current_url.indexOf('filter') != -1)){
            more_options_url = (current_url).split('page='+page_number).pop();
        }

        // on browser back button
        window.onpopstate = function() {

        	browserBackBtnHandler(url);
        };

        // manage url state with ajax url
        window.history.pushState("", "", current_url);

        getProducts(url+'?page='+page_number+more_options_url, records, ordering);

        // chagne records per page
        $(document).on('change', '.per_page_records', function (e) {
            e.preventDefault();
            let records_per_page = $(this).val();
            $('.page_records').val(records_per_page);

            current_url     = window.location.href;

            recordsPerPage(records_per_page, url, current_url, more_options_url, ordering);
        });

        // change sort by
        $(document).on('change', '.order', function (e) {
            e.preventDefault();
            let new_order = $(this).val();
            $('.page_order').val(new_order);

            current_url     = window.location.href;

            // getting records from url
            records =  getParams('records', current_url);
            if(!records){
                records = 10;
            }

            orderChange(new_order, url, current_url, more_options_url, ordering, page_number, records);
        });

        // simple trick to do ajax pagination
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            var current_url = window.location.href;

            pageClick(url, current_url, more_options_url, 'products');
        });

        $('body').on('click', '.categoryType', function(e) {
            e.preventDefault();
            let category_id = $(this).attr('id');
            current_url     = window.location.href;
            let selectedCategoryName = (category_id).split('-').pop();
            category_id = category_id.replace(/ & /g, "-");
            category_id = category_id.replace(/, /g, "-");
            category_id = category_id.replace(/ /g, "-");
            category_id = category_id.replace("(", "");
            category_id = category_id.replace(")", "");
            $('#categoryName').text(selectedCategoryName);

            let category_param  = getParams('category');
            let updated_url = current_url.replace("category="+category_param, "category="+category_id);
            window.history.pushState("", "", updated_url);

            getCategoryProducts(category_id, url, current_url, more_options_url, ordering, page_number, records);
        });

        let min_price = getParams('min_price', current_url);
        if(!min_price){
            min_price = 0;
        }

        let max_price = getParams('max_price', current_url);
        if(!max_price){
            max_price = 500;
        }

        $('#min_price').val(min_price);
        $('#max_price').val(max_price);
        $('.show_range').text("£" + (parseInt(min_price).toFixed(2)) + " - £" + (parseInt(max_price).toFixed(2)));
       $( "#slider-range2" ).slider({
            range: true,
            min: 0,
            max: 1000,
            step: 5,
            values: [ min_price, max_price ],
            slide: function( event, ui ) {
                // $( "#amount2" ).val( "$" + addCommas(ui.values[ 0 ].toFixed(2)) + " - $" + addCommas(ui.values[ 1 ].toFixed(2)) );
                $('.show_range').text("£" + (ui.values[ 0 ].toFixed(2)) + " - £" + (ui.values[ 1 ].toFixed(2)));
                $("#min_price").val((ui.values[ 0 ]));
                $("#max_price").val((ui.values[ 1 ]));
            }
        });
    });

    function addRemoveWishlist(product_id){
        var url = "{{ url('get-products') }}";
        var current_url     = window.location.href;
        var post_url        = "{{url('add-to-wishlist')}}";
        var current_url_split = current_url.split('?');
        var category_id = getParams('category_id', current_url);
        var page_number = getParams('page', current_url);
        if(!page_number){
            page_number = 1;
        }
        var records =  getParams('records', current_url);
        if(!records){
            records = 10;
        }
        var ordering=  getParams('order', current_url);
        if(!ordering){
            ordering = 'desc';
        }

        if(current_url_split.length>1){
            url = url+'?'+current_url_split[1];
        }else{
            url = url+'?page='+page_number+'&category_id='+category_id;
        }

        var login_check = "{{Auth::check()}}";

        favoriteRequest(product_id, url, records, ordering, login_check, post_url);
    }

    // change view type in url
    function changeViewType(obj){
        let current_url     = window.location.href;
        if ($(obj).hasClass("list")) {

            $('.grid_pagination').addClass('hideImp');
            updated_url = current_url.replace("view-type=grid", "view-type=list");
        }else{
            $('.grid_section').removeClass('hide');
            $('.grid_section').removeClass('show');
            $('.grid_section').addClass('flex');
            $('.grid_pagination').removeClass('hide');
            $('.grid_pagination').addClass('showImp');
            updated_url = current_url.replace("view-type=list", "view-type=grid");
        }
        window.location.href=updated_url;
    }

</script>
@endsection
