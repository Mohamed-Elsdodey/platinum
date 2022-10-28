<!doctype html >
<html @if(LaravelLocalization::getCurrentLocale()=="ar") dir="rtl" @elseif(LaravelLocalization::getCurrentLocale()=="en")  dir="ltr"  @endif  >

<head>
    <!-- Required meta tags -->
    <meta  charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        {{$settings->title??trans('frontend.platinum')}} - @yield('title')
    </title>

    {{--here we will add --}}
    <!-- icon -->
    @include('frontend.layouts.assets._css')
    <link rel="stylesheet" media="all" href="{{asset('frontend')}}/cute-alert-master/style.css"/>
    @yield('styles')

    <style>
        @keyframes placeHolderShimmer{
            0%{
                background-position: -468px 0
            }
            100%{
                background-position: 468px 0
            }
        }
        .linear-background {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 338px;
            position: relative;
            overflow: hidden;
        }


        .linear-background2 {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 600px;
            position: relative;
            overflow: hidden;
        }

        .linear-background3 {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 600px;
            position: relative;
            overflow: hidden;
        }
    </style>
</head>

<body>

<!-- custom cursor  -->
<div class="customCursor"></div>
<div class="customCursorInner"></div>
<!-- end custom cursor  -->
<!-- loader -->
{{--<div class="loader"></div>--}}
<div class="loader">
    <span class="spinner"></span>
</div>
<!-- ================ Header ================= -->
@include('frontend.layouts.inc._header')
<!-- ================ /Header ================= -->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!--((((((((((((((((((( content )))))))))))))))))))-->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<content>

    @yield('content')

    <div class="modal fade cvModal" id="showDetails" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="CVHere">

            </div>
        </div>
    </div>

</content>
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!--((((((((((((((((( / content )))))))))))))))))))-->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!-- ================ Footer ================= -->
@include('frontend.layouts.inc._footer')
<!-- ================ /Footer ================= -->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
@include('frontend.layouts.assets._js')


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('js')


<script>

    var cv_loader = ` <div class="linear-background"></div>`;

    $(document).on('click','.cvDetails',function (e) {
        e.preventDefault()
        var id = $(this).attr('attr-id');
        var url = '{{route('front.show-worker-details',":id")}}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                $("#CVHere").html(cv_loader)
                $('#showDetails').modal('show')
                //$(".spinner").show()
            },
            success: function(data){
                //$(".spinner").hide()
                window.setTimeout(function() {
                    $('#CVHere').html(data.html);
                }, 1000);
                new Swiper(".workerCvSlider", {
                    spaceBetween: 0,
                    centeredSlides: true,
                    // loop: true,
                    speed: 1000,
                    pagination: {
                        el: ".workerCvSliderpagination",
                        clickable: true,
                    },
                    keyboard: {
                        enabled: true,
                    },
                    navigation: {
                        nextEl: ".workerCvSliderNext",
                        prevEl: ".workerCvSliderPrev",
                    },
                });
            },
            error: function(data) {
                $('#showDetails').modal('hide')
                alert('{{__('frontend.errorTitleAuth')}}')
            }
        });

    });

    $(document).on('click','.Recruitment_Request',function (e){
        e.preventDefault()
        var ob = $(this)
        var id = $(this).attr('attr-id');
        var url = '{{route('front.completeTheRecruitmentRequest',":id")}}';

        var customer_support = $("#customerSupport .customerSupport:checked").val()
        @if(auth()->check())
            if(customer_support == '' ||customer_support == null)
            {
                cuteToast({
                    type: "warning", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.please Select From Customer Support')}}",
                    timer: 3000
                })
                return 0 ;
            }
        url = url.replace(':id', id)+"?customerSupport="+customer_support;
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                ob.attr('disabled',true)
                ob.html(`<i class='fa fa-spinner fa-spin '></i>`)
            },
            success: function(data){
                ob.attr('disabled',false)
                ob.html(`{{__('frontend.Recruitment Request')}}
                    <i class="fa-solid fa-briefcase ms-2"></i>`)
                cuteAlert({
                    title: "{{__('frontend.Congratulation')}}",
                    message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                    type: "success", // or 'info', 'error', 'warning'
                    buttonText: "{{__('frontend.ok')}}"
                }).then((e)=>{
                    location.replace("{{route('auth.profile')}}")
                })

            },
            error: function(data) {
                ob.html(`{{__('frontend.Recruitment Request')}}
                <i class="fa-solid fa-briefcase ms-2"></i>`)
                if (data.status === 400) {
                    cuteToast({
                        type: "warning", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.this worker had reserved')}}",
                        timer: 3000
                    })
                }

                if (data.status === 500) {
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.there ar an error')}}",
                        timer: 3000
                    })
                }
            }
        });


        @else
        cuteAlert({
            type: "question",
            title: "{{__('frontend.AlertNotificationForAuth')}}",
            message: "{{__('frontend.AlertMessageForAuthComplete')}}",
            confirmText: "{{__('frontend.Login')}}",
            cancelText: "{{__('admin.cancel')}}"
        }).then((e)=>{
            if ( e == 'confirm'){
                location.replace("{{route('auth.login')}}")
            }
        })
        @endif


    });
</script>

@if(LaravelLocalization::getCurrentLocale() == 'ar')
<script src="{{asset('frontend/jQuery-Form-Validator/form-validator/lang/ar.js')}}"></script>
@else
<script src="{{asset('frontend/jQuery-Form-Validator/form-validator/jquery.form-validator.js')}}"></script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script src="{{asset('frontend')}}/cute-alert-master/cute-alert.js"></script>

<script>
    $.validate({
        ignore: 'input[type=hidden]',
        modules : 'date, security',
        lang:"{{ LaravelLocalization::getCurrentLocale() }}",
    });

</script>

{{--<script>--}}
{{--    window.addEventListener("load", () => {--}}
{{--        if ("serviceWorker" in navigator) {--}}
{{--            navigator.serviceWorker.register("service-worker.js");--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}

</body>
@toastr_render
</html>
