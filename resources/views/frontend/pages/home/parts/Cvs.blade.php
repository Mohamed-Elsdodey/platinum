@if (count($cvs) >0)
    <section class="workers">
        <div class="container">
            <div class="sideTitle">
                <h2> {{__('frontend.newCvs')}} </h2>
                <a href="{{route('all-workers')}}"> {{__('frontend.Show All')}}</a>
            </div>
            <!-- slider -->
            <div class="swiperContainer">
                <div class="swiper cvSlider">
                    <div class="swiper-wrapper">
                        @foreach($cvs as $cv)
                        <!-- slide -->
                            <div class="swiper-slide">
                               @include('frontend.pages.all-workers.worker.worker_component')
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="cvSlidePagination swiper-pagination "></div>
            </div>
        </div>
        <!-- Modal -->
    </section>
@else

    <section class="workers">
        <div class="container">
            <div class="sideTitle">
                <h2>  يييي </h2>
                <a href="#"> عرض الكل </a>
            </div>
            <!-- slider -->
            <div class="swiperContainer">
                <div class="swiper cvSlider">
                    <div class="swiper-wrapper">
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="cv">
                                <div class="cvImg">
                                    <img src="{{asset('frontend')}}/img/cv1.webp">
                                </div>
                                <span class="type"> عاملة منزلية </span>
                                <div class="details">
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#showDetails"> التفاصيل </a>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="cv">
                                <div class="cvImg">
                                    <img src="{{asset('frontend')}}/img/cv2.webp">
                                </div>
                                <span class="type"> سائق </span>
                                <div class="details">
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#showDetails"> التفاصيل </a>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="cv">
                                <div class="cvImg">
                                    <img src="{{asset('frontend')}}/img/cv1.webp">
                                </div>
                                <span class="type"> طباخ </span>
                                <div class="details">
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#showDetails"> التفاصيل </a>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="cv">
                                <div class="cvImg">
                                    <img src="{{asset('frontend')}}/img/cv2.webp">
                                </div>
                                <span class="type"> عامل نظافة </span>
                                <div class="details">
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#showDetails"> التفاصيل </a>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="cv">
                                <div class="cvImg">
                                    <img src="{{asset('frontend')}}/img/cv1.webp">
                                </div>
                                <span class="type"> عاملة منزلية </span>
                                <div class="details">
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#showDetails"> التفاصيل </a>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="cv">
                                <div class="cvImg">
                                    <img src="{{asset('frontend')}}/img/cv2.webp">
                                </div>
                                <span class="type"> عاملة منزلية </span>
                                <div class="details">
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#showDetails"> التفاصيل </a>
                                </div>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="swiper-slide">
                            <div class="cv">
                                <div class="cvImg">
                                    <img src="{{asset('frontend')}}/img/cv1.webp">
                                </div>
                                <span class="type"> عاملة منزلية </span>
                                <div class="details">
                                    <a href="#!" > التفاصيل </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cvSlidePagination swiper-pagination "></div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade cvModal" id="showDetails" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row align-items-center">
                            <div class="col-md-6 p-2">
                                <div class="swiper workerCvSlider ">
                                    <div class="swiper-wrapper">
                                        <!-- cv image -->
                                        <div class="swiper-slide ">
                                            <a data-fancybox="user1-CV" href="img/cv1.webp">
                                                <img src="img/cv1.webp" alt="">
                                            </a>
                                        </div>
                                        <!-- cv image -->
                                        <div class="swiper-slide ">
                                            <a data-fancybox="user1-CV" href="img/cv2.webp">
                                                <img src="img/cv2.webp" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="workerCvSliderNext swiper-button-next"></div>
                                    <div class="workerCvSliderPrev swiper-button-prev"></div>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <ul class="info">
                                    <li>
                                        <h6> الجنسية : </h6>
                                        <p>كينيا </p>
                                    </li>
                                    <li>
                                        <h6> المهنة : </h6>
                                        <p> عاملة منزلية </p>
                                    </li>
                                    <li>
                                        <h6> الديانة : </h6>
                                        <p> مسلمة </p>
                                    </li>
                                    <li>
                                        <h6> الخبرة العملية : </h6>
                                        <p> تعليم ثانوي </p>
                                    </li>
                                    <li>
                                        <h6> الحالة الاجتماعية : </h6>
                                        <p> متزوجة </p>
                                    </li>
                                    <li>
                                        <h6> راتب العاملة : </h6>
                                        <p> 1200 ريال </p>
                                    </li>
                                    <li>
                                        <h6> سعر الاستقدام : </h6>
                                        <p> 13000 ريال </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- select Customer Service -->
                        <section class="selectCustomerService">
                            <h6 class="hint">
                                يرجى اختيار احد ممثلي خدمة العملاء لمواصلة إتمام التعاقد واكمال الإستقدام
                            </h6>
                            <!-- choose customer service -->
                            <div class="choose row flex-wrap">
                                <!--  customer -->
                                <div class=" col customerOption ">
                                    <input type="radio" class="btn-check" name="customer" id="option1">
                                    <label class="btn btn-outline" for="option1">
                                        <img src="img/customer-service.png" alt="">
                                        <span> أ.احمد سمير </span>
                                    </label>
                                </div>
                                <!--  customer -->
                                <div class=" col customerOption">
                                    <input type="radio" class="btn-check" name="customer" id="option2">
                                    <label class="btn btn-outline" for="option2">
                                        <img src="img/customer-service.png" alt="">
                                        <span> أ.محمود الكومي </span>
                                    </label>
                                </div>
                                <!--  customer -->
                                <div class=" col customerOption">
                                    <input type="radio" class="btn-check" name="customer" id="option3">
                                    <label class="btn btn-outline" for="option3">
                                        <img src="img/customer-service.png" alt="">
                                        <span> أ.محمد العشري </span>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <!-- end select Customer Service -->
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn px-4 btn-secondary" data-bs-dismiss="modal"> اغلاق </button>
                        <a href="profile.html" class="btn px-4 btn-success"> طلب استقدام <i
                                class="fa-solid fa-briefcase ms-2"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
