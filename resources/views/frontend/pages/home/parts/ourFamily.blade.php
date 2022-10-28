<section class="family">
    <div class="circleBlur"></div>
    <div class="circleBlur2"></div>
    <div class="container">
        <!-- single family -->
        <div class="single">
            <div class="image wow fadeInUp">
                <img src="{{/*$settings->our_family_image1?get_file($settings->our_family_image1):*/asset('frontend/img/family1.webp')}}">
            </div>
            <div class="info wow fadeInUp">
                <h3>{{$settings->our_family_title1??"مع نسمة اكيم"}} </h3>
                <h5>{{$settings->our_family_desc1??"عائلتك اسعد ,حياتك افضل"}} </h5>
            </div>
        </div>
        <!-- single family -->
        <div class="single">
            <div class="image wow fadeInUp">
                <img src="{{/*$settings->our_family_image2?get_file($settings->our_family_image2):*/asset('frontend/img/family2.webp')}}">
            </div>
            <div class="info wow fadeInUp">
                <h3> {{$settings->our_family_title2??"عائلتك دائما الأهم"}}  </h3>
                <h5> {{$settings->our_family_desc2??"اتركي شغل البيت علينا"}} </h5>
            </div>
        </div>
    </div>
</section>
