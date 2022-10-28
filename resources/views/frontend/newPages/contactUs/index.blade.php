@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.contactUs')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <!-- Main Banner  -->
    <section class="mainBanner">
        <h1> {{__('frontend.contactUs')}} </h1>
        <ul>
            <li>
                <a href="{{route('home')}}"> {{__('frontend.Home')}} </a>
            </li>
            <li>
                <a href="#!" class="active"> {{__('frontend.contactUs')}} </a>
            </li>
        </ul>

    </section>

    <section class="contactForm" id="contactUs">


        <div class="container">
            <div class="row align-items-center">
                <!-- data -->
                <div class="col-sm-6 col-md-5 p-2">
                    <div class="contactInfo">
                        <!-- Section Title -->
                        <h2 class="sideTitle"> {{__('frontend.contactUs')}} </h2>
                        <!-- info -->
                        <div class="info">
                            <i class="fa-solid fa-location-dot me-3"></i>
                            <div class="data">
                                <h6> {{__('frontend.ourLocation')}} </h6>
                                <p>   {{$settings->address1??"السعودية - الرياض - شارع الوحدة"}}</p>
                            </div>
                        </div>
                        <!-- info -->
                        <div class="info">
                            <i class="fa-solid fa-mailbox me-3"></i>
                            <div class="data">
                                <h6> {{__('frontend.Email')}} </h6>
                                <p>   {{$settings->email1??"mail@mail.com"}}</p>
                            </div>
                        </div>
                        <!-- info -->
                        <div class="info">
                            <i class="fa-solid fa-headset me-3"></i>
                            <div class="data">
                                <h6> {{__('frontend.PhoneNumbers')}}</h6>
                                <p> {{$settings->phone1??"+996 0123456789"}} </p>
                                <p> {{$settings->phone2??"+996 0123456789"}} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- form -->
                <div class="col-sm-6 col-md-7 p-2">
                    <form id="Form" action="{{route('front.contact_us_action')}}" method="post" class="row" novalidate>
                        @csrf
                        <div class="circleBlur"></div>
                        <div class="circleBlur2"></div>
                        <div class="col-md-12 p-2">
                            <label class="form-label"> <i class="fas fa-user me-2"></i> {{__('frontend.FullName')}}*
                            </label>
                            <input data-validation="required" id="contact_name" name="name" type="text"
                                   class="form-control">

                        </div>
                        <div class="col-md-6 p-2">
                            <label class="form-label"><i
                                    class="fas fa-phone-alt me-2"></i> {{__('frontend.Phone Number')}} * </label>
                            <input onkeypress="return isNumber(event)" data-validation="required" name="phone"
                                   type="text" class="form-control">

                        </div>
                        <div class="col-md-6 p-2">
                            <label class="form-label"> <i
                                    class="fa-solid fa-comment-lines me-2"></i> {{__('frontend.Subject')}} </label>
                            <input type="text" data-validation="required" name="subject" class="form-control">
                        </div>
                        <div class="col-md-12 p-2">
                            <label class="form-label"> <i
                                    class="fas fa-feather-alt me-2"></i> {{__('frontend.Your Message')}}* </label>
                            <textarea class="form-control" rows="5" data-validation="required"
                                      name="message"></textarea>

                        </div>
                        <div class="col-md-12 text-center pt-2">
                            <button id="submit_button" type="submit" class="defaultBtn">
                                {{__('frontend.Send Message')}}
                                <i class="fas fa-paper-plane ms-2 scaleReverse"></i>
                                <span></span>

                            </button>

                        

                        </div>
                    </form>
                </div>
                <!-- map -->
                <div class="col-md-12 p-2 pt-4">
                    <iframe class="googleMap wow fadeInUp "
                            src="https://maps.google.com/maps?q={{$settings->latitude}},{{$settings->longitude}}&hl=ar&z=14&amp;output=embed">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('js')
    <script>

        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#submit_button').attr('disabled', true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function () {

                },
                success: function (data) {
                    // var name = `${$("#contact_name").val()}`;
                    cuteAlert({
                        title: "{{__('frontend.Message Successfully Sent')}}",
                        message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                        type: "success", // or 'info', 'error', 'warning'
                        buttonText: "{{__('frontend.confirm')}}"
                    });
                    $('#submit_button').attr('disabled', false)
                    $('#submit_button').html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i>
                                <span></span>`)

                    $('#Form')[0].reset();
                },
                error: function (data) {
                    if (data.status === 500) {

                    }
                    if (data.status === 422) {

                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });


        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }
    </script>

@endsection
