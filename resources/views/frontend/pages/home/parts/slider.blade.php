@if (count($sliders)>0)

    <section class="mainSlider swiperContainer">
        <div class="swiper mainSliderContainer">
            <div class="swiper-wrapper">
                <div id="particles-js"></div>
            @foreach($sliders as $slider)
                <!-- swiper-slide -->
                    <div class="swiper-slide mainSlideItem" style="background-image: url({{get_file($slider->image)}})">
                        <div class="info">
                            <h1 class="sliderTitle">{{$slider->title}}</h1>
                            <p class="hint">
                                {{$slider->desc}}
                            </p>
                        </div>
                    </div>

                @endforeach

            </div>
            <div class="mainsliderPagination swiper-pagination d-md-none"></div>
            <div class="mainSliderNext swiper-button-next"></div>
            <div class="mainsliderPrev swiper-button-prev"></div>
        </div>
        <a href="#services" class="btn btn-white goDown bounce">
            <i class="fa-duotone fa-chevrons-down"></i>
        </a>
    </section>

@else
    <section class="mainSlider swiperContainer">
        <div class="swiper mainSliderContainer">
            <div class="swiper-wrapper">
                <div id="particles-js"></div>
                <!-- swiper-slide -->
                <div class="swiper-slide mainSlideItem" style="background-image: url({{asset('frontend')}}/img/s1.webp)">
                    <div class="info">
                        <h1 class="sliderTitle">{{trans('frontend.platinum')}}</h1>
                        <p class="hint">
                            {{trans('frontend.The largest recruitment office in the Kingdom of Saudi Arabia')}}
                        </p>
                    </div>
                </div>
                <!-- swiper-slide -->
                <div class="swiper-slide mainSlideItem" style="background-image: url({{asset('frontend')}}/img/s2.webp)">
                    <div class="info">
                        <h1 class="sliderTitle">{{trans('frontend.Premium Services')}}</h1>
                        <p class="hint">{{trans('frontend.Learn about our services that we offer you')}}</p>
                    </div>
                </div>
                <!-- swiper-slide -->
                <div class="swiper-slide mainSlideItem" style="background-image: url({{asset('frontend')}}/img/s3.webp)">
                    <div class="info">
                        <h1 class="sliderTitle">{{trans('frontend.Ease of use')}}</h1>
                        <p class="hint">
                         {{trans('frontend.Start your reservation and complete your payment through the website or contact us in a short time and in short steps')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="mainsliderPagination swiper-pagination d-md-none"></div>
            <div class="mainSliderNext swiper-button-next"></div>
            <div class="mainsliderPrev swiper-button-prev"></div>
        </div>
        <a href="#services" class="btn btn-white goDown bounce">
            <i class="fa-duotone fa-chevrons-down"></i>
        </a>
    </section>
@endif


