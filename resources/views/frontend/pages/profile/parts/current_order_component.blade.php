@foreach($currentOrders as $currentOrder)
<div class="col-lg-12 p-2">
    <div class="order">
        <div class="row">
            <div class="col-sm-4 p-2">
                <div class="swiper workerCvSlider ">
                    <div class="swiper-wrapper">
                        <!-- cv image -->
                    @foreach($currentOrder->biography->images as $image)
                        <!-- cv image -->
                            <div class="swiper-slide ">
                                <a data-fancybox="user{{$image->id}}-CV-{{$image->id}}" href="{{get_file($image->image)}}">
                                    <img src="{{get_file($image->image)}}" alt="">
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-sm-8 p-2">
                <ul class="info">
                    <li>
                        <h6> {{__('frontend.Nationality')}} : </h6>
                        <p>{{$currentOrder->biography->nationalitie?$currentOrder->biography->nationalitie->title:""}} </p>
                    </li>
                    <li>
                        <h6> {{__('frontend.Occupation')}} : </h6>
                        <p> {{$currentOrder->biography->job?$currentOrder->biography->job->title:""}} </p>
                    </li>
                    <li>
                        <h6> {{__('frontend.Religion')}} : </h6>
                        <p> {{$currentOrder->biography->religion?$currentOrder->biography->religion->title:""}} </p>
                    </li>
                    <li>
                        <h6> {{__('frontend.Practical experience')}} : </h6>
                        <p> {{$currentOrder->biography->experience?$currentOrder->biography->experience->title:""}} </p>
                    </li>
                    <li>
                        <h6> {{__('frontend.Marital status')}} : </h6>
                        <p> {{$currentOrder->biography->social_type?$currentOrder->biography->social_type->title:""}} </p>
                    </li>
                    <li>
                        <h6> {{__('frontend.worker`s salary')}} : </h6>
                        <p> {{$currentOrder->biography->salary??''}} {{__('frontend.SAR')}} </p>
                    </li>
                    <li>
                        <h6>{{__('frontend.Recruitment price')}} : </h6>
                        <p>  {{$currentOrder->biography->nationalitie->price??''}} {{__('frontend.SAR')}} </p>
                    </li>
                    <li>
                        <h6> {{__('frontend.RecruitmentStatus')}} : </h6>
                        <p class="m-2"> {{__('frontend.RecruitmentCurrent')}} </p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- alert -->
        <h6 class="customAlert">
           {{__('frontend.RecruitmentAlert')}}
        </h6>



        @php

            $date =$currentOrder->created_at;
           $newDate = date('Y-m-d H:i:s', strtotime($date. '+24 hours'));
        @endphp

        <div id="timer{{$currentOrder->id}}" data-date="{{$newDate}}" data-id="{{$currentOrder->id}}" class="timer">
            <div id="days{{$currentOrder->id}}"></div>
            <div id="hours{{$currentOrder->id}}"></div>
            <div id="minutes{{$currentOrder->id}}"></div>
            <div id="seconds{{$currentOrder->id}}"></div>
        </div>





        <div class="profileCustomerInfo">
            <div class="info">
                <img src="{{asset('frontend')}}/img/customer-service.png" alt="">
                <div class="text">
                    <h6> {{$currentOrder->admin->name}} </h6>
                    <p>{{__('frontend.customerSupport')}}</p>
                </div>
            </div>
            <div class="contact">
                <a href="tel:{{$currentOrder->admin->phone}}" target="_blank">
                    <i class="fa-light fa-phone"></i>
                </a>
                <a href=https://wa.me/{{$currentOrder->admin->whats_up_number}}" target="_blank">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    var timeoutHandle;
    function countdown(minutes) {
        var seconds = 60;
        var mins = minutes
        var counter = document.getElementById("sendCodeAgain");
        var current_minutes = mins-1

        let interval = setInterval(() => {
            seconds--;
            counter.innerHTML =
                current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
// our seconds have run out
            if(seconds <= 0) {
// our minutes have run out
                if(current_minutes <= 0) {
// we display the finished message and clear the interval so it stops.
                    counter.innerHTML = "{{__('frontend.ReSent')}}"
                    $("#codeReceiveOrNot").html("{{__('frontend.I did not receive the activation code')}}")
                    $("#sendCodeAgain").attr('attr-code-sent',"sent")
                    clearInterval(interval);
                } else {
// otherwise, we decrement the number of minutes and change the seconds back to 60.
                    current_minutes--;
                    seconds = 60;
                }
            }

// we set our interval to a second.
        }, 1000);
    }

</script>



@endforeach
