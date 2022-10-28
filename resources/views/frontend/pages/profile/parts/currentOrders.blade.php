<a href="{{route('all-workers')}}" class="newOrder">
    <i class="fa-duotone fa-file-plus"></i>
    <p>{{__('frontend.New Recruitment Request')}} </p>
</a>

@if (isset($currentOrders) && count($currentOrders) > 0)
    <input type="hidden" value="{{$current_page}}" id="current_page_orders">

    <div class="row" id="current_orders_section_to_append">
        @include('frontend.pages.profile.parts.current_order_component')
    </div>

    <div style="{{$currentOrders->currentPage() == $currentOrders->lastPage() ?"display:none!important":""}}" class="d-flex align-items-center justify-content-center py-5 row" >
        <button id="load_more_current_orders_button" class="customBtn " type="button">
            <p class="px-5">{{__('frontend.load more')}}</p>
            <span></span>
        </button>
    </div>



@else
    <div class="d-flex align-items-center justify-content-center py-5 row">
        <img style="width: 500px;height: 500px" src="{{asset('frontend/img/money.png')}}" alt="no data for current orders">
    </div>

@endif

