@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.faq')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')


    <content>
        <!-- Main Banner  -->
        <section class="mainBanner">
            <h1> {{__('frontend.faq')}} </h1>
            <ul>
                <li>
                    <a href="{{route('home')}}"> {{__('frontend.Home')}} </a>
                </li>
                <li>
                    <a href="#!" class="active">{{__('frontend.faq')}} </a>
                </li>
            </ul>

        </section>
        <!-- Main Banner  -->

        @if (count($questions)>0)

            <section class="faq pb-5" id="faq">
                <div class="container">
                    <!-- Section Title -->
                    <!-- <div class="SectionTitle">
                        <h2 class="title"> {{__('frontend.faq')}} </h2>
                    </div> -->
                    <div class="accordion" id="faqAccordion">
                        @foreach($questions as $question)
                            <!-- question -->
                            <div class="accordion-item wow fadeInUp">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question{{$question->id}}"
                                            aria-controls="question{{$question->id}}">
                                        {{$question->title}}
                                    </button>
                                </h2>
                                <div id="question{{$question->id}}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>{{$question->desc}} </p>
                                    </div>
                                </div>
                            </div>
                            <!-- question -->
                        @endforeach

                        <!-- show more Btn -->
                        <!-- <div class="showAll">
                            <a href="#!"> {{__('frontend.show')}}
                                <span class="less"> {{__('frontend.less')}} </span>
                                <span class="more"> {{__('frontend.more')}} </span>
                            </a>
                            <i class="fa-light fa-chevron-down ms-2"></i>
                        </div> -->
                    </div>
                </div>
            </section>

        @else

            <section class="faq" id="faq">
                <div class="container">
                    <!-- Section Title -->
                    <div class="SectionTitle">
                        <h2 class="title"> {{__('frontend.faq')}} </h2>
                    </div>
                    <div class="accordion" id="faqAccordion">
                        <!-- question -->
                        <div class="accordion-item wow fadeInUp">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question1"
                                        aria-controls="question1">
                                    ?????? ?????? ?????????????? ???????????????? ??
                                </button>
                            </h2>
                            <div id="question1" class="accordion-collapse collapse " data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li> ?????? ???????? ???? ??????????</li>
                                        <li>???????? ??????????</li>
                                        <li>???????? ????????????</li>
                                        <li> ?????? ???????? ???? ??????????</li>
                                        <li>???????? ??????????</li>
                                        <li>???????? ????????????</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- question -->
                        <div class="accordion-item wow fadeInUp">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question2"
                                        aria-controls="question2">
                                    ???? ?????? ?????????????? ??????????????????
                                </button>
                            </h2>
                            <div id="question2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>???????? 24 ????????. </p>
                                </div>
                            </div>
                        </div>

                        <!-- show more Btn -->
                        <div class="showAll">
                            <a href="#!"> ??????
                                <span class="less"> ?????? </span>
                                <span class="more"> ???????????? </span>
                            </a>
                            <i class="fa-light fa-chevron-down ms-2"></i>
                        </div>
                    </div>
                </div>
            </section>

        @endif


    </content>





@endsection
