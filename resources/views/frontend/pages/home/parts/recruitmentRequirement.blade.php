<section class="requirements">
    <div class="container">
        <div class="SectionTitle">
            <h2 class="title wow fadeInUp"> {{trans('frontend.Recruitment requirements')}} </h2>
            <p class="hint wow fadeInUp"> {{trans('frontend.These are the requirements you need to recruit..')}} </p>
        </div>
        <div class="row">
            <div class="col-md-6 p-2">
                <div class="requirement">
                    <div class="head wow fadeInUp">
                        <h4>{{$row1->title}}</h4>
                    </div>
                    <ul>
                        <li class="wow fadeInUp">
                            <div class="icon">
                                <i class="fa-regular fa-address-card"></i>
                            </div>
                            <p>{{$row1->copy_of_the_national_IDor_residence_for_residents}} </p>
                        </li>
                        <li class="wow fadeInUp">
                            <div class="icon">
                                <i class="fa-regular fa-headset"></i>
                            </div>
                            <p> {{$row1->qutstanding_customer_service}} </p>
                        </li>
                        <li class="wow fadeInUp">
                            <div class="icon">
                                <i class="fa-regular fa-building-columns"></i>
                            </div>
                            <p>{{$row1->salary_definition_from_the_employer_or_bank_statement}} </p>
                        </li>
{{--                        <li class="wow fadeInUp">--}}
{{--                            <div class="icon">--}}
{{--                                <i class="fa-regular fa-passport"></i>--}}
{{--                            </div>--}}
{{--                            <p> {{$row1->original_visa}} </p>--}}
{{--                        </li>--}}
{{--                        <li class="wow fadeInUp">--}}
{{--                            <div class="icon">--}}
{{--                                <i class="fa-regular fa-calendar-lines-pen"></i>--}}
{{--                            </div>--}}
{{--                            <p> {{$row1->signing_recruitment_contract}} </p>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-md-6 p-2">
                <div class="requirement">
                    <div class="head wow fadeInUp">
                        <h4>{{$row2->title}}</h4>
                        <p> {{trans('frontend.Please visit the Musaned Home Employment Program website')}} <a href="#!"> {{trans('frontend.from here')}} </a> </p>
                    </div>
                    <ul>
                        <li class="wow fadeInUp">
                            <div class="icon">
                                <i class="fa-regular fa-address-card"></i>
                            </div>
                            <p>{{$row2->copy_of_the_national_IDor_residence_for_residents}} </p>
                        </li>
                        <li class="wow fadeInUp">
                            <div class="icon">
                                <i class="fa-regular fa-headset"></i>
                            </div>
                            <p> {{$row2->qutstanding_customer_service}} </p>
                        </li>
                        <li class="wow fadeInUp">
                            <div class="icon">
                                <i class="fa-regular fa-building-columns"></i>
                            </div>
                            <p>{{$row2->salary_definition_from_the_employer_or_bank_statement}} </p>
                        </li>
{{--                        <li class="wow fadeInUp">--}}
{{--                            <div class="icon">--}}
{{--                                <i class="fa-regular fa-passport"></i>--}}
{{--                            </div>--}}
{{--                            <p> {{$row2->original_visa}} </p>--}}
{{--                        </li>--}}
{{--                        <li class="wow fadeInUp">--}}
{{--                            <div class="icon">--}}
{{--                                <i class="fa-regular fa-calendar-lines-pen"></i>--}}
{{--                            </div>--}}
{{--                            <p> {{$row2->signing_recruitment_contract}} </p>--}}
{{--                        </li>--}}
                    </ul>
                </div>

            </div>
            <div class="">


                    <h6 class="hint text-center my-4">{{trans('frontend.Please visit the Musaned Home Employment Program website from here')}}<a target="_blank" class="mx-1" href="https://musaned.com.sa/home">{{trans('frontend.here')}}</a></h6>


            </div>
        </div>

    </div>
</section>


