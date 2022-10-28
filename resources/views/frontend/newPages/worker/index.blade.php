<!-- start workers -->
<section class="workers">
    <div class="container">
        <div class="sideTitle">
            <h2> {{__('frontend.newCvs')}} </h2>
            <a href="{{route('all-workers')}}"> {{__('frontend.Show All')}} </a>
        </div>
        <!-- slider -->
        <div class="swiperContainer allWorkers p-0">
            <div class="swiper cvSlider workerDetails p-0">
                <div class="swiper-wrapper">
                    <!-- slide -->

                   @foreach($cvs as $cv)
                    <!-- slide -->
                    <div class="swiper-slide">
                        <!--  personalInfo -->
                        <a href="{{route('frontend.show.worker',$cv->id)}}" class="personalInfo flex-column mx-2 pt-3">
                            <img src="{{get_file($cv->image)}}" class="mx-0 mb-2" alt="">
                            <table class="table customTable ">
                                <tbody>
                                <tr>
                                    <td> {{trans('frontend.Name')}} </td>
                                    <td> {{$cv->name}} </td>
                                </tr>
                                <tr>
                                    <td> {{trans('frontend.Age')}} </td>
                                    <td>{{$cv->age}} </td>
                                </tr>
                                <tr>
                                    <td> {{trans('frontend.Nationalitie')}} </td>
                                    <td> {{$cv->nationalitie->title??''}} </td>
                                </tr>
                                <tr>
                                    <td>{{trans('frontend.job')}} </td>
                                    <td> {{$cv->job->title??''}} </td>
                                </tr>
                                <tr>
                                    <td> {{trans('frontend.religion')}} </td>
                                    <td> {{$cv->religion->title??''}} </td>
                                </tr>
                                <tr>
                                    <td> {{trans('frontend.Marital status')}} </td>
                                    <td> {{$cv->social_type->title??''}} </td>
                                </tr>
                                </tbody>
                            </table>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="cvSlidePagination swiper-pagination "></div>
        </div>
    </div>

</section>
<!-- end workers -->
