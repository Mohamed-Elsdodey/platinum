@if(isset($notifications) && count($notifications) > 0)

    <div class="notifications" >
        <ul id="notifications_section_to_append">
           @include('frontend.pages.profile.parts.notifications-component')
        </ul>
    </div>
    <input type="hidden" value="{{$current_page}}" id="current_page_notifications">

    <div style="{{$last_page == $current_page ?"display:none!important":""}}" class="d-flex align-items-center justify-content-center py-5 row" >
        <button id="load_more_notifications_button" class="customBtn " type="button">
            <p class="px-5">{{__('frontend.load more')}}</p>
            <span></span>
        </button>
    </div>
@else
    <div class="d-flex align-items-center justify-content-center py-5 row">
        <img style="width: 500px;height: 500px" src="{{asset('frontend')}}/img/no-notifications.png" alt="no notification ">
    </div>
@endif
