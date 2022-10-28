@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Recruitment countries')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>
    <!-- Main Banner  -->
        @section('content')

            <!-- Main Banner  -->
            <section class="mainBanner">
                <h1>     {{__('frontend.Recruitment countries')}} </h1>
                <ul>
                    <li>
                        <a href="{{route('home')}}"> {{__('frontend.Home')}} </a>
                    </li>
                    <li>
                        <a href="#!" class="active">  {{__('frontend.Recruitment countries')}}</a>
                    </li>
                </ul>

            </section>
    <!-- Main Banner  -->
    <section class="countries">
        <div class="container">
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
</content>



@endsection
