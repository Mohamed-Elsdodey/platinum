<section class="Features">
    <div class="container">
        <div class="row align-items-center g-3 pb-5">
            <div class="col-md-6">
                <div class="aboutUs">
                    <h1 class="wow fadeInUp"> {{trans('frontend.who are we')}} </h1>
                    <p class="wow fadeInUp">

                        {{$setting->about_us}}

                    </p>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <div class="aboutImg wow fadeInUp">
                    <img src="{{get_file($setting->about_us_image)}}" alt="">
                </div>
            </div>
        </div>

        <div class="Feature">
            <div class="row flex-wrap">
                <!-- single Feature -->
                <div class="col p-2 singleFeature wow fadeInUp">
                    <div class="info">
                        <div class="content">
                            <div class="icon">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <h3>{{$setting->service_providers_title}}</h3>
                            <p>
                              {{$setting->service_providers_desc}}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- single Feature -->
                <div class="col p-2 singleFeature wow fadeInUp">
                    <div class="info">
                        <div class="content">
                            <div class="icon">
                                <i class="fa-solid fa-laptop"></i>
                            </div>
                            <h3>{{$setting->integrated_digital_services_title}} </h3>
                            <p>
                                {{$setting->integrated_digital_services_desc}}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- single Feature -->
                <div class="col p-2 singleFeature wow fadeInUp">
                    <div class="info">
                        <div class="content">
                            <div class="icon">
                                <i class="fa-solid fa-users-gear"></i>
                            </div>
                            <h3> {{$setting->outstanding_customer_service_title}} </h3>
                            <p>
                                {{$setting->outstanding_customer_service_desc}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

