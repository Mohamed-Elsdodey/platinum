@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.all worker')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>
        <section class="allWorkers">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3 p-1">
                        <!-- filter -->
                        <div class="filter">
                            <h4 class="sideTitle mb-4"> بحث متقدم </h4>
                            <form action="" class="row">
                                <!-- age -->
                                <div class="py-3 col col-md-12" style="min-width: 120px;">
                                    <label for="age"> <i class="fa-duotone fa-hourglass me-1"></i> العمر </label>
                                    <select id="age" class="select2">
                                        <option value="" selected> الكل</option>
                                        <option value=""> من 20 الى 30سنة</option>
                                        <option value=""> من 31 الى 40سنة</option>
                                        <option value=""> من 41 الى 50سنة</option>
                                    </select>
                                </div>
                                <!-- Occupation -->
                                <div class="py-3 col col-md-12" style="min-width: 120px;">
                                    <label for="job"> <i class="fa-duotone fa-briefcase me-1"></i> المهنه </label>
                                    <select id="job" class="select2">
                                        <option value="" selected> الكل</option>
                                        <option value=""> سائق خاص</option>
                                        <option value=""> عمالة منزلية</option>
                                    </select>
                                </div>
                                <!-- Nationality -->
                                <div class="py-3 col col-md-12" style="min-width: 120px;">
                                    <label for="nationality"> <i class="fa-duotone fa-flag me-1"></i> الجنسية </label>
                                    <select id="nationality" class="select2">
                                        <option value="" selected> الكل</option>
                                        <option value=""> كينيا</option>
                                        <option value=""> بنجلادش</option>
                                        <option value=""> الفليبين</option>
                                    </select>
                                </div>
                                <div class=" pt-4 d-flex align-items-center justify-content-center flex-wrap">
                                    <button type="button" class=" btn clear m-1 "> مسح
                                        <span></span>
                                    </button>
                                    <button type="submit" class="btn confirm">
                                        <span></span>
                                        تطبيق
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- end filter -->
                    </div>
                    <div class="col-md-8 col-lg-9 p-0">
                        <div class="workerDetails p-3 ">
                            <!--  personalInfo -->

                            <!--  personalInfo -->
                            @foreach($workers as $worker)
                            <a href="{{route('frontend.show.worker',[$worker->id,$type])}}" class="personalInfo">
                                <img src="{{get_file($worker->image)}}" alt="">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td> الاسم:</td>
                                        <td> {{$worker->name}}</td>
                                    </tr>
                                    <tr>
                                        <td> العمر:</td>
                                        <td> {{$worker->age}} سنة</td>
                                    </tr>
                                    <tr>
                                        <td> الجنسية:</td>
                                        <td> {{$worker->nationalitie->title??''}}</td>
                                    </tr>
                                    <tr>
                                        <td> المهنة:</td>
                                        <td> {{$worker->job->title??''}}</td>
                                    </tr>
                                    <tr>
                                        <td> الديانة:</td>
                                        <td> {{$worker->religion->title??''}}</td>
                                    </tr>
                                    <tr>
                                        <td> الحالة الاجتماعية:</td>
                                        <td> {{$worker->social_type->title??''}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </a>
                            @endforeach
                        </div>
                        <!-- pagination -->
                         {!! $workers->links() !!}
                    </div>
                </div>
                <!-- custom Order -->
                <div class="alert  fade show customOrder wow fadeInUp" role="alert">
                    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h6>يمكننا توفير العمالة المناسبة طبقا لمواصفاتك الخاصه </h6>
                    <a class="customBtn " href=""><span></span> تقديم طلب خاص </a>
                </div>
                <!-- end custom Order -->
            </div>
        </section>
    </content>

@endsection
