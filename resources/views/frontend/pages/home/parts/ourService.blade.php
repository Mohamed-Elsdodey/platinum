@if (count($ourServices)>0)

    <section class="services" id="services">
        <div class="container">
            <!-- Section Title -->
            <div class="SectionTitle">
                <h2 class="title">{{__('frontend.OurServices')}}</h2>
                <h6 class="hint">{{$settings->our_service_desc}}</h6>
            </div>
            <!-- slider -->
            <div class="swiperContainer">
                <div class="swiper servicesSlider">
                    <div class="swiper-wrapper">
                    @foreach($ourServices as $service)
                        <!-- slide -->
                            <div class="swiper-slide">
                                <div class="service">
                                    <div class="serviceImg">
                                        <img src="{{get_file($service->image)}}" alt="" />
                                    </div>
                                    <div class="details">
                                        <h4>{{$service->title}}</h4>
                                        <p>
                                           {{ $service->desc}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="servicesSlidePagination swiper-pagination d-md-none"></div>
                <div class="servicesSliderNext swiper-button-next"></div>
                <div class="servicesSliderPrev swiper-button-prev"></div>
            </div>
        </div>
    </section>

@else

    <section class="services" id="services">
        <div class="container">
            <!-- Section Title -->
            <div class="SectionTitle">
                <h2 class="title">{{trans('frontend.Our services')}}</h2>
                <h6 class="hint">{{trans('frontend.Learn about the services we provide to the community...')}}</h6>
            </div>
            <!-- slider -->
            <div class="swiperContainer">
                <div class="swiper servicesSlider">
                    <div class="swiper-wrapper">
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="service">
                                <div class="serviceImg">
                                    <img src="{{asset('frontend')}}/img/service1.webp" alt="" />
                                </div>
                                <div class="details">
                                    <h4>إصدار التأشيرة</h4>
                                    <p>
                                        طلب اصدار تاشيرة العمالة المنزلية الخاصة بك في برنامج
                                        مساند
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="service">
                                <div class="serviceImg">
                                    <img src="{{asset('frontend')}}/img/service2.webp" alt="" />
                                </div>
                                <div class="details">
                                    <h4>اختيار العمالة</h4>
                                    <p>
                                        اختيار السيره الذاتيه للعماله المنزليه عبر البحث في
                                        برنامج مساند
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="service">
                                <div class="serviceImg">
                                    <img src="{{asset('frontend')}}/img/service3.webp" alt="" />
                                </div>
                                <div class="details">
                                    <h4>وصول العمالة</h4>
                                    <p>وصول العمالة المنزلية من المطار المحلي الى المكتب</p>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="service">
                                <div class="serviceImg">
                                    <img src="{{asset('frontend')}}/img/service4.webp" alt="" />
                                </div>
                                <div class="details">
                                    <h4>تعاقد الاستقدام</h4>
                                    <p>دفع رسوم الاستقدام عبر التعاقد في برنامج مساند</p>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="service">
                                <div class="serviceImg">
                                    <img src="{{asset('frontend')}}/img/service5.webp" alt="" />
                                </div>
                                <div class="details">
                                    <h4>سياسات الاستقدام</h4>
                                    <p>
                                        التوعية بالقوانين والمبدا التي تحكم العلاقة بين صاحب
                                        البيت والعامل وحقوق وواجبات كلا منهم
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="servicesSlidePagination swiper-pagination d-md-none"></div>
                <div class="servicesSliderNext swiper-button-next"></div>
                <div class="servicesSliderPrev swiper-button-prev"></div>
            </div>
        </div>
    </section>

@endif


