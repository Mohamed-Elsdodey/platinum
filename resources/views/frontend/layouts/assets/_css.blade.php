@if(LaravelLocalization::getCurrentLocale()=="ar")
<link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.rtl.min.css" />
@elseif(LaravelLocalization::getCurrentLocale()=="en")
<link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css" />
@endif
<link href="{{asset('frontend/backEndFiles/validation/toastr.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/backEndFiles/sweetalert/sweetalert.css')}}">
{{--<!-- CSS -->--}}
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- favicon -->
<link rel="icon" type="image/x-icon" href="{{$settings->tap_logo?get_file($settings->tap_logo):asset('frontend/img/fav.svg')}}" />
<!-- Bootstrap -->
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/fontawesome.min.css" />
<!-- swiper -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/swiper-bundle.min.css" />
<!-- animate -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/animate.min.css" />
<!-- select2 -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/select2.min.css" />
<!-- img gallery -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/jquery.fancybox.min.css" />
<link rel="stylesheet" href="{{asset('frontend')}}/css/odometer.min.css" />
<!-- Custom style  -->
@if(LaravelLocalization::getCurrentLocale()=="ar")
<link rel="stylesheet" href="{{asset('frontend')}}/css/style.css" />
@elseif(LaravelLocalization::getCurrentLocale()=="en")
<link rel="stylesheet" href="{{asset('frontend')}}/css/styleEN.css" />
@endif
<!-- dropify -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/dropify.min.css">
<style>
    .form-error {
        color: red;
        font-weight: normal;
        font-size: smaller;
    }

    input.valid,
    textarea.valid {
        border: 1px solid green;
    }
</style>