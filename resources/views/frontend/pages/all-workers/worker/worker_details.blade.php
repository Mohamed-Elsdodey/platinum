<div class="modal-body">
    <div class="row align-items-center">
        <div class="col-md-6 p-2">
            <div class="swiper workerCvSlider ">
                <div class="swiper-wrapper">
                @foreach($cv->images as $image)
                    <!-- cv image -->
                        <div class="swiper-slide ">
                            <a data-fancybox="user1-CV" href="{{get_file($image->image)}}">
                                <img src="{{get_file($image->image)}}" alt="">
                            </a>
                        </div>
                @endforeach
                <!-- cv image -->
                </div>
                <div class="workerCvSliderNext swiper-button-next"></div>
                <div class="workerCvSliderPrev swiper-button-prev"></div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <ul class="info">
                <li>
                    <h6> {{__('frontend.Nationality')}} : </h6>
                    <p>{{$cv->nationalitie?$cv->nationalitie->title:""}} </p>
                </li>
                <li>
                    <h6> {{__('frontend.Occupation')}} : </h6>
                    <p> {{$cv->job?$cv->job->title:""}} </p>
                </li>
                <li>
                    <h6> {{__('frontend.Religion')}} : </h6>
                    <p> {{$cv->religion?$cv->religion->title:""}} </p>
                </li>
                <li>
                    <h6> {{__('frontend.Practical experience')}} : </h6>
                    <p> {{$cv->experience?$cv->experience->title:""}} </p>
                </li>
                <li>
                    <h6> {{__('frontend.Marital status')}} : </h6>
                    <p> {{$cv->social_type?$cv->social_type->title:""}} </p>
                </li>
                <li>
                    <h6> {{__('frontend.worker`s salary')}} : </h6>
                    <p> {{$cv->salary}} {{__('frontend.SAR')}} </p>
                </li>
                <li>
                    <h6>{{__('frontend.Recruitment price')}} : </h6>
                    <p>  {{$cv->recruitment_price}} {{__('frontend.SAR')}} </p>
                </li>
            </ul>
        </div>
    </div>
</div>

@if (count($admins)>2)
    <!-- select Customer Service -->
    <section class="selectCustomerService">
        <h6 class="hint">
            {{__('frontend.Please choose a customer service representative to continue completing the contract and complete the recruitment')}}
        </h6>
        <!-- choose customer service -->
        <div class="choose row flex-wrap">
        @foreach($admins as $admin)
            <!--  customer -->
                <div class=" col customerOption " id="customerSupport">
                    <input type="radio" class="btn-check customerSupport" value="{{$admin->id}}" name="customer"
                           id="option{{$admin->id}}">
                    <label class="btn btn-outline" for="option{{$admin->id}}">
                        <img src="{{asset('frontend')}}/img/customer-service.png" alt="">
                        <span> {{$admin->name}} </span>
                    </label>
                </div>
            @endforeach

        </div>
    </section>
    <!-- end select Customer Service -->

    @endif

    </div>

    <div class="modal-footer justify-content-center">
        <button class="btn px-4 btn-secondary" data-bs-dismiss="modal"> إغلاق</button>
        <a href="#" attr-id="{{$cv->id}}"
           class="btn px-4 btn-success Recruitment_Request">{{__('frontend.Recruitment Request')}}
            <i class="fa-solid fa-briefcase ms-2"></i>
        </a>
    </div>

