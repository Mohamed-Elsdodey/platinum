@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Recruitment steps')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <!-- Main Banner  -->
    <section class="mainBanner">
        <h1> {{__('frontend.Recruitment steps')}} </h1>
        <ul>
            <li>
                <a href="{{route('home')}}"> {{__('frontend.Home')}} </a>
            </li>
            <li>
                <a href="#!" class="active">{{__('frontend.Recruitment steps')}} </a>
            </li>
        </ul>

    </section>




    <section class="steps" id="steps">
        <div class="container">
{{--            <!-- Section Title -->--}}
{{--            <div class="SectionTitle">--}}
{{--                <h2 class="title">{{__('frontend.Recruitment steps')}}</h2>--}}
{{--                <h6 class="hint">{{$settings->recruitment_step_desc??"تعرف علي الخطوات التي نعمل بها ..."}}</h6>--}}
{{--            </div>--}}
            <!-- steps -->
            <div class="allSteps">
                <div class="step wow fadeInUp">
                    <div class="icon">
                        <i class="fa-thin fa-wallet"></i>
                    </div>
                    <p>{{$settings->recruitment_step1_desc??" سداد رسوم تاشيرة العمالة المنزلية الخاصة بك عبر الخدمات الحكومية
                    في البنك او عن طريق القنوات التالية"}}

                    <div class="images">
                        <img src="{{asset('frontend')}}/img/mc.webp">
                        <img src="{{asset('frontend')}}/img/visa.webp">
                        <img src="{{asset('frontend')}}/img/mada.webp">
                    </div>
                    </p>
                </div>
                <div class="step wow fadeInUp">
                    <div class="icon">
                        <i class="fa-thin fa-passport"></i>
                    </div>
                    <p>{{$settings->recruitment_step2_desc??" طلب اصدار تاشيرة العمالة المنزلية الخاصة بك في برنامج مساند"}}</p>
                </div>
                <div class="step wow fadeInUp">
                    <div class="icon">
                        <i class="fa-thin fa-id-card"></i>
                    </div>
                    <p>{{$settings->recruitment_step3_desc??"اختيار السيرة الذاتية للعمالة المنزلية عبر البحث في برنامج مساند
                    عن طريق المهنة/ الجنسية "}}</p>

                </div>
                <div class="step wow fadeInUp">
                    <div class="icon">
                        <i class="fa-thin fa-wallet"></i>
                    </div>
                    <p>{{$settings->recruitment_step4_desc??"دفع مبلغ اختياري وتوثيق طلب استقدام العمالة المنزلية المحددة بعد
                    اختيار السيرة الذاتية "}}</p>

                </div>
                <div class="step wow fadeInUp">
                    <div class="icon">
                        <i class="fa-thin fa-plane"></i>
                    </div>
                    <p>{{$settings->recruitment_step5_desc??" وصول العمالة المنزلية من المطار المحلي الى المكتب"}}</p>
                </div>
                <div class="step wow fadeInUp">
                    <div class="icon">
                        <i class="fa-thin fa-handshake"></i>
                    </div>
                    <p>{{$settings->recruitment_step6_desc??" وصول العمالة المنزلية من المطار المحلي الى المكتب"}}</p>
                </div>
                <div class="step wow fadeInUp">
                    <div class="icon">
                        <i class="fa-thin fa-shield-check"></i>
                    </div>
                    <p>{{$settings->recruitment_step7_desc??" وصول العمالة المنزلية من المطار المحلي الى المكتب"}}</p>
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
