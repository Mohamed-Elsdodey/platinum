<header class="sticky-top">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{$settings->header_logo?get_file($settings->header_logo):asset('frontend/img/logo.svg')}}"/>
            </a>
            <!-- links in md media -->
            <div class="d-none d-lg-block">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}"> {{__('frontend.Home')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.services')}}"> {{__('frontend.OurServices')}} </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link"--}}
{{--                           href="{{route('frontend.show.nationalities')}}">  {{__('frontend.Recruitment countries')}} </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link"--}}
{{--                           href="{{route('frontend.recruitmentSteps')}}"> {{__('frontend.Recruitment steps')}} </a>--}}
{{--                    </li>--}}



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            {{trans('frontend.about recruitment')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item"
                                   href="{{route('frontend.getEmployerRight')}}"> {{__('frontend.Employer rights and duties')}} </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{route('frontend.getDomesticWorkerRight')}}"> {{__('frontend.Rights and duties of domestic workers')}} </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            {{trans('frontend.Recruitment trip')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li>
                                <a class="dropdown-item"
                                   href="{{route('frontend.visaIssuance')}}"> {{__('frontend.Visa issuance')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                   href="{{route('all-workers')}}"> {{__('frontend.Labor selection')}} </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{route('frontend.laborSelection')}}"> {{__('frontend.recruitment contract')}} </a>
                            </li>



                            <li>
                                <a class="dropdown-item"
                                   href="{{route('frontend.employmentArrival')}}"> {{__('frontend.Employment Arrival')}} </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                            {{trans('frontend.support')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item"
                                   href="{{route('frontend.show.faq')}}"> {{__('frontend.faq')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                   href="{{route('frontend.contactUS')}}">{{__('frontend.contactUs')}}  </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                   href="{{route('frontend.musaned')}}">{{__('frontend.musaned')}}  </a>
                            </li>

                        </ul>
                    </li>



                @if(\Illuminate\Support\Facades\Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('auth.profile')}}"> {{__('frontend.profile')}} </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{route('all-workers')}}" class="defaultBtn mx-1"> <i
                                class="fa-solid fa-briefcase me-2"></i>
                            {{__('frontend.Recruitment Request')}}
                            <span></span>
                        </a>

                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user())
                    @else

                        <li class="nav-item ">

                            <a href="{{route('auth.login')}}" class="defaultBtn mx-1">
                                {{__('frontend.Login')}}
                                <span></span>
                            </a>
                        </li>
                    @endif


                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        @if($properties['native']=='English')
                            @if(LaravelLocalization::getCurrentLocale()=="ar")
                                <li class="nav-item ">
                                    <a class="ms-2  nav-link " rel="alternate"
                                       hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                        {{trans('frontend.eng')}}
                                    </a>
                                </li>
                            @endif

                        @elseif($properties['native']=='العربية')
                            @if(LaravelLocalization::getCurrentLocale()=="en")
                                <li class="nav-item ">
                                    <a rel="alternate" class="ms-2  nav-link "
                                       hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                        {{trans('frontend.arb')}}
                                    </a>
                                </li>
                            @endif

                        @endif

                    @endforeach

                </ul>
            </div>


            <!-- toggle btn -->
            <div class="sideBtn d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- side menu -->
            <div class="sideMenu">
                <div class="sideMenuInner">
                    <a class="sideMenuLink" href="{{route('home')}}"> {{__('frontend.Home')}} </a>
                    <a class="sideMenuLink" href="{{route('frontend.services')}}"> {{__('frontend.OurServices')}} </a>
                    <a class="sideMenuLink"
                       href="{{route('frontend.show.nationalities')}}"> {{__('frontend.Recruitment countries')}} </a>
                    <a class="sideMenuLink"
                       href="{{route('frontend.recruitmentSteps')}}"> {{__('frontend.Recruitment steps')}} </a>
                    <a class="sideMenuLink" href="{{route('frontend.contactUS')}}"> {{__('frontend.contactUs')}}  </a>
                    <a class="sideMenuLink" href="{{route('frontend.show.faq')}}">{{__('frontend.faq')}} </a>
                    <a class="sideMenuLink" href="{{route('frontend.musaned')}}">{{__('frontend.musaned')}} </a>

                    @if(\Illuminate\Support\Facades\Auth::user())
                        <a class="sideMenuLink" href="{{route('auth.profile')}}"> {{__('frontend.profile')}} </a>
                    @else
                        <a class="defaultBtn mb-2" href="{{route('auth.login')}}">
                            {{__('frontend.Login')}}
                            <span></span>
                        </a>
                    @endif

                    <a class="defaultBtn mb-2" href="{{route('all-workers')}}"> <i
                            class="fa-solid fa-briefcase me-2"></i>
                        {{__('frontend.Recruitment Request')}}
                        <span></span>
                    </a>

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        @if($properties['native']=='English')
                            @if(LaravelLocalization::getCurrentLocale()=="ar")
                                <a class="sideMenuLink" rel="alternate"
                                   hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                    {{trans('frontend.eng')}}
                                </a>
                            @endif

                        @elseif($properties['native']=='العربية')
                            @if(LaravelLocalization::getCurrentLocale()=="en")
                                <a class="sideMenuLink" rel="alternate"
                                   hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                    {{trans('frontend.arb')}}

                                </a>
                            @endif

                        @endif

                    @endforeach


                </div>
            </div>


        </div>


    </nav>

</header>
