@extends('frontend.layouts.layout')

@section('title')
    سياسات وقوانين الاستقدام داخل المملكة
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>


        <!-- policies -->
        <section class="policies">
            <div class="container">

                <h1 class="" data-aos=" fade-up">سياسات وقوانين الاستقدام داخل المملكة </h1>
                <h4 class="" data-aos=" fade-up">حتى تتسنى لك الفرصة باستقدام عمالة منزلية داخل المملكة يجب مراعات
                    الضوابط
                    الاتية والتي
                    اقرتها الحكومة طبقا
                    للدستور السعودي حتى تضمن لكلا من العامل وصاحب العمل حقوقهم وواجباتهم </h4>

                <div class="links " data-aos=" fade-up">
                    <a download href="{{get_file($pdf->employer_rights_and_duties)}}"> <i
                            class="fa-solid fa-file-pdf me-2"></i> حقوق وواجبات صاحب العمل </a>
                </div>

            </div>
        </section>

        @include('frontend.newPages.recuitmentPolicy.contactus')

        <!-- ================ references ================= -->

        @include('frontend.newPages.recuitmentPolicy.references')

    </content>
@endsection
@section('styles')

    <style>

        .policies,
        .visa,
        .selectWorker,
        .recruitmentContract {
            margin-top: 100px;
            padding: 100px 0 50px;
            background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.7098039216), rgba(0, 0, 0, 0.4)), url(../img/policies.webp);
            background-size: cover;
            text-align: center;
            background-position: center;
        }

        .policies .container,
        .visa .container,
        .selectWorker .container,
        .recruitmentContract .container {
            max-width: 900px;
        }

        .policies .container h1,
        .visa .container h1,
        .selectWorker .container h1,
        .recruitmentContract .container h1 {
            font-weight: bold;
            color: #dcb065;
            margin-bottom: 20px;
            line-height: 34px;
        }

        .policies .container h4,
        .visa .container h4,
        .selectWorker .container h4,
        .recruitmentContract .container h4 {
            margin: auto;
            line-height: 34px;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .policies .container .links,
        .visa .container .links,
        .selectWorker .container .links,
        .recruitmentContract .container .links {
            padding-top: 40px;
        }

        .policies .container .links a,
        .visa .container .links a,
        .selectWorker .container .links a,
        .recruitmentContract .container .links a {
            padding: 15px 25px;
            display: inline-flex;
            align-items: center;
            background-color: #dcb065;
            color: #09463f;
            border-radius: 4px;
            margin: 10px;
            transition: all 0.3s ease-in-out;
            border: 1px solid #09463f;
        }

        .policies .container .links a:hover,
        .visa .container .links a:hover,
        .selectWorker .container .links a:hover,
        .recruitmentContract .container .links a:hover {
            background-color: #09463f;
            color: #dcb065;
        }

        .recruitmentRequest {
            padding: 50px 0;
        }

        .recruitmentRequest .headTitle h2 {
            font-size: 30px !important;
        }

        @media (max-width: 768px) {
            .recruitmentRequest .headTitle h2 {
                font-size: 20px !important;
            }
        }

        .recruitmentRequest .headTitle p {
            color: #777;
        }

        .recruitmentRequest .formCard {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1254901961);
            border-radius: 4px;
            isolation: isolate;
        }

        .recruitmentRequest .formCard .head {
            background-color: #c7d2d6;
            padding: 10px 20px;
            color: #09463f;
            margin-bottom: 20px;
            border-radius: 4px;
            font-weight: bold;
        }

        .recruitmentRequest .formCard .select2-container--default .select2-selection--single {
            border-color: #ced4da;
        }

        .recruitmentRequest .hint {
            color: #777;
            font-size: 10px;
        }

        .recruitmentRequest .hint a {
            font-weight: bold;
            color: #09463f;
            font-size: 10px !important;
        }

        .recruitmentRequest .form-check-label {
            font-size: small;
        }

        .musaned {
            min-height: 80vh;
            padding: 100px 0;
            background: linear-gradient(rgba(238, 238, 238, 0.6392156863), rgba(238, 238, 238, 0.8)), url(../img/musanedHead.webp);
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            text-align: center;
        }

        .musaned .hint {
            line-height: 30px;
            font-weight: bold;
        }

        .musaned .musanedLogo {
            height: 150px;
            -o-object-fit: contain;
            object-fit: contain;
        }

        .videoSection .hint {
            line-height: 30px;
        }

        .videoSection .video {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(../img/family2.webp);
            position: relative;
            height: 100%;
            min-height: 400px;
            border-bottom-right-radius: 100px;
        }

        @media (max-width: 767px) {
            .videoSection .video {
                border-radius: 16px;
            }
        }

        .videoSection .video .videoPopup {
            width: 80px;
            height: 80px;
            font-size: 30px;
            padding-left: 5px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background-color: #dcb065;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid #ffffff;
        }

        .videoSection .video .videoPopup::before {
            content: "";
            width: 130%;
            height: 130%;
            border-radius: 50%;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -webkit-animation: play-button 1s infinite linear;
            animation: play-button 1s infinite linear;
        }

        .videoSection .video .videoPopup i {
            font-size: 24px;
        }

        .videoSection .feature {
            padding: 20px 30px 0;
            display: flex;
            flex-direction: column;
        }

        @media (max-width: 767px) {
            .videoSection .feature {
                padding: 20px 10px 0;
            }
        }

        .videoSection .feature .content {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }

        .videoSection .feature .content i {
            font-size: 30px;
            width: 40px;
            color: #09463f;
        }

        .videoSection .feature .content .info h3 {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .videoSection .feature .content .info p {
            color: #777777;
        }

        @-webkit-keyframes play-button {
            0% {
                width: 100%;
                height: 100%;
                border: 0px solid #ffffff;
            }
            100% {
                width: 130%;
                height: 130%;
                border: 10px solid rgba(255, 255, 255, 0.1254901961);
            }
        }

        @keyframes play-button {
            0% {
                width: 100%;
                height: 100%;
                border: 0px solid #ffffff;
            }
            100% {
                width: 130%;
                height: 130%;
                border: 10px solid rgba(255, 255, 255, 0.1254901961);
            }
        }

        .musanedTrip {
            padding: 100px 0;
        }

        .musanedTrip .hint {
            line-height: 30px;
        }

        .musanedTrip .trip {
            border: 1px solid rgba(9, 70, 63, 0.1882352941);
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .musanedTrip .trip img {
            height: 200px;
            -o-object-fit: contain;
            object-fit: contain;
            padding: 10px;
        }

        .musanedTrip .trip h4 {
            background-color: rgba(9, 70, 63, 0.1882352941);
            padding: 20px;
            border-radius: 10px;
            white-space: nowrap;
            margin-top: 5px;
            transition: all 0.3s ease-in-out;
        }

        .musanedTrip .trip:hover {
            background-color: #fff;
        }

        .musanedTrip .trip:hover h4 {
            background-color: rgba(9, 70, 63, 0.5019607843);
            color: #fff;
        }

        .musanedRecruitment {
            padding: 70px 0;
            background: linear-gradient(rgba(238, 238, 238, 0.6392156863), rgba(238, 238, 238, 0.8)), url(../img/musanedHead.webp);
            background-size: cover;
            background-attachment: fixed;
        }

        .musanedRecruitment .headTitle h4 {
            margin-bottom: 10px;
        }

        .musanedRecruitment .headTitle h1 {
            font-weight: bold;
            color: #09463f;
        }

        .musanedRecruitment .headTitle p {
            line-height: 30px;
            margin-top: 30px;
            color: #777;
        }

        .musanedRecruitment .specifications {
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1254901961);
            border-radius: 4px;
            height: 100%;
            text-align: center;
        }

        .musanedRecruitment .specifications i {
            font-size: 55px;
            margin-bottom: 30px;
            color: #09463f;
        }

        .musanedRecruitment .specifications h1 {
            font-weight: bold;
            margin-bottom: 20px;
            color: #09463f;
        }

        .musanedRecruitment .specifications h5 {
            white-space: nowrap;
        }

        .musanedRecruitment .specifications p {
            line-height: 30px;
            margin-top: 30px;
            color: #777;
            min-width: 220px;
        }

        .musanedFees {
            background-color: #f2f3f8;
            padding: 70px 0;
            text-align: center;
        }

        .musanedFees .headTitle h4 {
            margin-bottom: 10px;
        }

        .musanedFees p {
            color: #777;
            line-height: 30px;
        }

        .musanedFees .images {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            justify-content: center;
        }

        .musanedFees .images img {
            -o-object-fit: contain;
            object-fit: contain;
            margin: 5px;
            max-height: 70px;
            border-radius: 8px;
        }

        .musanedApp {
            padding-top: 40px;
            background-color: rgba(9, 70, 63, 0.062745098);
        }

        .musanedApp .appImg {
            text-align: center;
        }

        .musanedApp .appImg img {
            -o-object-fit: contain;
            object-fit: contain;
            width: 100%;
            max-width: 350px;
        }

        .musanedApp .info {
            padding: 20px;
            background-color: rgba(196, 131, 46, 0.1254901961);
            border-radius: 16px;
            text-align: center;
            margin-bottom: 40px;
        }

        .musanedApp .info img {
            -o-object-fit: contain;
            object-fit: contain;
            height: 120px;
            margin-bottom: 20px;
        }

        .musanedApp .info h4 {
            color: #09463f;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .musanedApp .info p {
            color: #777;
            line-height: 30px;
            margin-bottom: 30px;
        }

        .musanedApp .info .links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .musanedApp .info .links img {
            width: 100%;
            height: 60px;
            margin: 0;
            -o-object-fit: contain;
            object-fit: contain;
            padding: 5px;
        }

        @media (max-width: 768px) {
            .musanedApp .info .links img {
                height: 50px;
            }
        }

        /* PC device :991px. */
        @media (min-width: 991px) {
            body {
                font-size: 17px !important;
            }

            h1 {
                font-size: 29px !important;
            }

            h2 {
                font-size: 27px !important;
            }

            h3 {
                font-size: 23px !important;
            }

            h4 {
                font-size: 21px !important;
            }

            h5 {
                font-size: 19px !important;
            }

            h6 {
                font-size: 18px !important;
            }

            a,
            p {
                font-size: 17px !important;
            }
        }

        /* Tablet device :768px. */
        @media (min-width: 768px) and (max-width: 991px) {
            /* Global */
            body {
                font-size: 16px !important;
            }

            h1 {
                font-size: 28px !important;
            }

            h2 {
                font-size: 24px !important;
            }

            h3 {
                font-size: 22px !important;
            }

            h4 {
                font-size: 20px !important;
            }

            h5 {
                font-size: 18px !important;
            }

            h6 {
                font-size: 17px !important;
            }

            a,
            p {
                font-size: 16px !important;
            }
        }

        /* small mobile :320px. */
        @media (max-width: 767px) {
            /* Global */
            body {
                font-size: 15px !important;
            }

            h1 {
                font-size: 25px !important;
            }

            h2 {
                font-size: 21px !important;
            }

            h3 {
                font-size: 20px !important;
            }

            h4 {
                font-size: 19px !important;
            }

            h5 {
                font-size: 18px !important;
            }

            h6 {
                font-size: 17px !important;
            }

            a,
            p {
                font-size: 16px !important;
            }
        }
    </style>

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
