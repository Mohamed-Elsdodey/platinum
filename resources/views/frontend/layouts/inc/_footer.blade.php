<section class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 p-2 ">
                <div class="info">
                    <img class="logo"
                         src="{{$settings->footer_logo?get_file($settings->footer_logo):asset('frontend/img/logo.svg')}}"
                         alt=""/>
{{--                    <img class="logo" src="{{asset('frontend/img/footer_logo.svg')}}" alt="" />--}}

                    <div class="data">
                        <p>
                            {{$settings->footer_desc??"نهتم في نسمة أكيم بخدمتكم عن طريق قنوات تواصل متعددة ونضمن لكم خدمة متكاملة وتجربة عميل مميزة"}}
                        </p>
                        <div class="socialIcons">
                            <a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-facebook"></i></a>
                            <a target="_blank" href="{{$settings->whatsapp}}"><i class="fab fa-whatsapp"></i></a>
                            <a target="_blank" href="{{$settings->twitter}}"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="mailto:{{$settings->email1}}"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class=" col-lg-5 p-2 py-4">
                <h5 class="head"> {{trans('frontend.Quick links')}} </h5>
                <div class="Links">
                    <ul>
                        <li>
                            <a href="{{route('frontend.services')}}"> {{__('frontend.OurServices')}} </a>
                        </li>
                        <li>
                            <a href="{{route('frontend.recruitmentSteps')}}"> {{__('frontend.Recruitment steps')}} </a>
                        </li>
                        <li>
                            <a href="{{route('frontend.show.faq')}}"> {{__('frontend.faq')}} </a>
                        </li>
                        <li>
                            <a href="{{route('frontend.contactUS')}}"> {{__('frontend.contactUs')}} </a>
                        </li>
                        <li>
                            <a href="{{route('auth.profile')}}"> {{__('frontend.profile')}} </a>
                        </li>
                        @guest
                            <li>
                                <a href="{{route('auth.login')}}"> {{__('frontend.Login')}} </a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="{{route('auth.logout')}}"> {{__('frontend.Logout')}} </a>
                            </li>

                        @endauth
                    </ul>
                </div>
            </div>

        </div>
        <div class="Copyright">
            <p>
                {{trans('frontend.all rights are save')}} @2022 . <a target="_blank" href="https://nami-tec.com/"> {{trans('frontend.NAMI')}} </a>
            </p>
        </div>
    </div>
</section>

