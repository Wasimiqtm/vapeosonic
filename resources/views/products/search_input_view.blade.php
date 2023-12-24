<form method="get" action="{{url('products')}}">
    <input type="hidden" name="category" value="all" class="records">
    <input type="hidden" name="records" value="10" class="records">
    <input type="hidden" name="order" value="asc">
    <input type="hidden" name="page" value="1">
    <input type="hidden" name="filter" value="true">
<section class="shop-widget filter-widget bg-grey">
    <h2>FILTER</h2>
    <span class="sub-title">Filter by Brands</span>
    <!-- nice-form start here -->
    <ul class="list-unstyled nice-form">
        @forelse($brands as $key => $brand)
            <li class="check-box">
                <label for="{{'checkbox'.$key}}">
                    <input type="checkbox" name="brand[]" id="{{'checkbox'.$key}}" value="{{$key.'-'.$brand}}">
                    <span class="fake-input"></span>
                    <span class="fake-label">{{$brand}}</span>
                </label>
                <span class="num">2</span>

            </li>
        @empty
            <li>
                No Records Found
            </li>
        @endforelse

    </ul><!-- nice-form end here -->
    <span class="sub-title">Filter by Price</span>
    <div class="">

        <input id="min_price" type="hidden" name="min_price" value="0" />
        <input id="max_price" type="hidden" name="max_price" value="500" />
        <input id="view-type" type="hidden" name="view-type" value="grid" />
        <div id="slider-range2"   ></div>
        <p class="show_range" style="text-align: center; margin-top: 10px;"></p>

        <button type="submit"  href="#" class="filter-btn">Filter</button>
    </div>
</section>
</form>


