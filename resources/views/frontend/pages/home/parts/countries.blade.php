<section class="countries">
    <div class="container">
        <div class="SectionTitle">
            <h2 class="title">{{__('frontend.Recruitment countries')}}</h2>
            <h6 class="hint">{{trans('frontend.We recruit from different countries that provide skilled labor')}}</h6>
        </div>
        <div class="row justify-content-center">
            @foreach($nationalities as $nationalitie)
                <div class="col-6 col-md-3 p-1">
                    <div class="country">
                        <img src="{{get_file($nationalitie->image)}}" alt="">
                        <h2> {{$nationalitie->country_name}} </h2>
                        <p>{{$nationalitie->desc}} </p>
                        <a href="{{route('all-workers',$nationalitie->id)}}" class="defaultBtn mx-1">
                            {{trans('frontend.order now')}}
                            <span></span>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
