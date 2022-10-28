@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.workerDetails')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>
        <section class="workerDetails">
            <div class="container">
                <!--  route Nav -->
                <div class="routeNav">
                    <button onclick="history.back()" class="Back">
                        <i class="fas fa-angle-right"></i>
                    </button>
                    <ul>
                        <li>
                            <a href=""> {{trans('frontend.recruitment_request')}} </a>
                        </li>
                        <li>
                            <a href="#!" class="active"> {{trans('frontend.worker details')}} </a>
                        </li>
                    </ul>
                </div>
                <div class="details">
                    <div class="row">
                        <div class="col-md-4 p-2">
                            <!-- personal Info  -->
                            <div class="personalInfo">
                                <div class="workerImg">
                                    <img onclick="window.open(this.src, '_blank');"
                                         src="{{get_file($worker->image)}}" alt="">
                                    <a href="{{$worker->video}}" data-fancybox class="workerVideo">
                                        <i class="fa-duotone fa-circle-video me-2"></i>
                                        {{trans('frontend.Click to watch the video')}}
                                    </a>
                                </div>
                                <table class="table customTable table-striped">
                                    <tbody>
                                    <tr>
                                        <td> {{trans('frontend.name')}}:</td>
                                        <td> {{$worker->name}}</td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.age')}}:</td>
                                        <td> {{$worker->age}} {{trans('frontend.year')}}</td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.nationalitie')}}:</td>
                                        <td> {{$worker->nationalitie->title??''}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.job')}}:</td>
                                        <td>{{$worker->job->title??''}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.religion')}}:</td>
                                        <td> {{$worker->religion->title??''}} </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <table class="table customTable table-striped">
                                    <tbody>
                                    <tr>
                                        <td> {{trans('frontend.arabic')}}:</td>
                                        <td>


                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')

                                                @if($worker->arabic_degree=="weak")
                                                    ضعيف
                                                @elseif($worker->arabic_degree=="average")
                                                    متوسط
                                                @elseif($worker->arabic_degree=="good")
                                                    جيد
                                                @elseif($worker->arabic_degree=="very good")
                                                    جيد جدا
                                                @elseif($worker->arabic_degree=="excellent")
                                                    ممتاز
                                                @else


                                                @endif
                                            @else
                                                {{$worker->arabic_degree}}

                                            @endif


                                        </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.english')}}:</td>

                                        <td>




                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')

                                                @if($worker->english_degree=="weak")
                                                    ضعيف
                                                @elseif($worker->english_degree=="average")
                                                    متوسط
                                                @elseif($worker->english_degree=="good")
                                                    جيد
                                                @elseif($worker->english_degree=="very good")
                                                    جيد جدا
                                                @elseif($worker->english_degree=="excellent")
                                                    ممتاز
                                                @else


                                                @endif
                                            @else
                                                {{$worker->english_degree}}

                                            @endif

















                                             </td>
                                    </tr>
                                    </tbody>
                                </table>


                                <div class=" printHide d-flex justify-content-center align-items-center pt-4">
                                    @if($type=='transport')
                                        <a href="https://wa.me/+966{{$settings->whatsapp}}?text={{get_file($worker->cv_file)}}"
                                           class="defaultBtn  mx-1">
                                            {{__('frontend.transfer')}}
                                            <i class="fa-solid fa-briefcase ms-2"></i>
                                            <span></span>
                                        </a>
                                    @else
                                        <a data-id="{{$worker->id}}" class="defaultBtn Recruitment mx-1">
                                            {{__('frontend.Recruitment Request')}}
                                            <i class="fa-solid fa-briefcase ms-2"></i>
                                            <span></span>
                                        </a>
                                    @endif
                                    <button onclick="window.print()" class="defaultBtn mx-1">
                                        {{trans('frontend.print')}}
                                        <i class="fa-solid fa-print ms-2"></i>
                                        <span></span>
                                    </button>

                                </div>


                            </div>
                        </div>
                        <div class="col-md-8 p-3">
                            <!-- more -->
                            <div class="more">
                                <h1 class="moreTilte"> {{trans('frontend.Passport data')}} </h1>
                                <table class="table customTable table-striped">
                                    <tbody>
                                    <tr>
                                        <td> {{trans('frontend.passport number')}}:</td>
                                        <td> {{$worker->passport_number}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.Release Date')}}:</td>
                                        <td> {{$worker->passport_created_at}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.place of issue')}}:</td>
                                        <td> {{$worker->passport_place}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.Expiry date')}}:</td>
                                        <td> {{$worker->passport_ended_at}} </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- more -->
                            <div class="more">
                                <h1 class="moreTilte"> {{trans('frontend.Employer data')}} </h1>
                                <table class="table customTable table-striped">
                                    <tbody>
                                    <tr>
                                        <td> {{trans('frontend.Marital status')}}:</td>
                                        <td> {{$worker->social_type->title??''}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.weight')}}:</td>
                                        <td> {{$worker->weight}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.height')}}:</td>
                                        <td> {{$worker->height}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.skin colour')}}:</td>
                                        <td> {{$worker->skin_colour}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.number of children')}}:</td>
                                        <td> {{$worker->childern_number}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.Degree')}}:</td>
                                        <td> {{$worker->high_degree}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.living location')}}:</td>
                                        <td> {{$worker->living_location}} </td>
                                    </tr>
                                    <tr>
                                        <td> {{trans('frontend.prior experiences')}}:</td>
                                        <td>
                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')

                                                @if($worker->prior_experiences==0)
                                                    لا
                                                @elseif($worker->prior_experiences==1)
                                                    نعم
                                                @endif

                                            @else

                                                @if($worker->prior_experiences==0)
                                                      no
                                                @elseif($worker->prior_experiences==1)
                                                      yes
                                                @endif
                                            @endif






                                             </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- more -->
                @if($worker->skills && count($worker->skills)>0)
                    <div class="more px-3">
                        <h1 class="moreTilte"> المهارات </h1>
                        <!-- table -->
                        <div class="wideTable">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    @foreach($worker->skills as $skill)
                                        <th> {{$skill->title}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($worker->skills as $skill)

                                        @php
                                            $degree=\App\Models\BiographySkill::where('skill_id',$skill->id)->where('biography_id',$worker->id)->first()->degree??''

                                        @endphp

                                        <td>

                                            @if($degree=="weak")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    ضعيف
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    weak
                                                @endif

                                            @elseif($degree=="average")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    متوسط
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    average
                                                @endif

                                            @elseif($degree=="good")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    جيد
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    good
                                                @endif

                                            @elseif($degree=="very good")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    جيد جدا
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    very good
                                                @endif

                                            @elseif($degree=="excellent")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    ممتاز
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    excellent
                                                @endif

                                            @endif


                                        </td>

                                    @endforeach
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

            </div>

            <!-- show only in media print -->
            <div class="printFooter">
                <img class="logo" src="{{get_file(\App\Models\Setting::first()->header_logo)}}" alt="">
                <div class="contact">
                    <i class="fa-solid fa-envelope me-2"></i>
                    <h4> {{\App\Models\Setting::first()->email1}}</h4>
                </div>
                <div class="contact">
                    <i class="fa-solid fa-phone me-2"></i>
                    <h4> {{\App\Models\Setting::first()->phone1??''}} </h4>
                </div>

            </div>

        </section>
    </content>

@endsection

@section('js')
    <script>
        $(document).on('click', '.Recruitment', function (e) {
            e.preventDefault()
            var ob = $(this)
            var id = $(this).attr('data-id');
            var url = '{{route('front.completeTheRecruitmentRequest',":id")}}';

            var customer_support = 1;
            @if(auth()->check())

                url = url.replace(':id', id) + "?customerSupport=" + customer_support;
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {

                    cuteAlert({
                        title: "{{__('frontend.Congratulation')}}",
                        message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                        type: "success", // or 'info', 'error', 'warning'
                        buttonText: "{{__('frontend.ok')}}"
                    }).then((e) => {
                        location.replace("{{route('auth.profile')}}")
                    })

                },
                error: function (data) {
                    ob.html(`
                    {{__('frontend.Recruitment Request')}}
                    <i class="fa-solid fa-briefcase ms-2"></i>
                    <span></span>
                    `)
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
            {{--cuteAlert({--}}
            {{--    type: "question",--}}
            {{--    title: "{{__('frontend.AlertNotificationForAuth')}}",--}}
            {{--    message: "{{__('frontend.AlertMessageForAuthComplete')}}",--}}
            {{--    confirmText: "{{__('frontend.Login')}}",--}}
            {{--    cancelText: "{{__('admin.cancel')}}"--}}
            {{--}).then((e) => {--}}
            {{--    if (e == 'confirm') {--}}
            {{--        location.replace("{{route('auth.login')}}")--}}
            {{--    }--}}
            {{--})--}}

            var url = "{{route('register',':id')}}";
            url = url.replace(':id', id);
            location.replace(url);




            @endif


        });
    </script>

@endsection
