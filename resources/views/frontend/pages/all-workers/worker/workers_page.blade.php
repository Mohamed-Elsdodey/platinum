@if (count($cvs)>0)
    <div class="workerDetails p-3 ">
        @foreach($cvs as $cv)
            @if(isset($id))
                @if($id='transfer')
                    <a href="{{route('frontend.show.worker',[$cv->id,'transfer'])}}" class="personalInfo">
                        @else
                            <a href="{{route('frontend.show.worker',$cv->id)}}" class="personalInfo">

                                @endif

                                @else
                                    <a href="{{route('frontend.show.worker',[$cv->id,$type])}}" class="personalInfo">

                                        @endif
                                        <img src="{{get_file($cv->image)}}" alt="">
                                        <table class="table customTable">
                                            <tbody>
                                            <tr>
                                                <td> الاسم:</td>
                                                <td> {{$cv->name}}</td>
                                            </tr>
                                            <tr>
                                                <td> العمر:</td>
                                                <td> {{$cv->age}} سنة</td>
                                            </tr>
                                            <tr>
                                                <td> الجنسية:</td>
                                                <td> {{$cv->nationalitie->title??''}}</td>
                                            </tr>
                                            <tr>
                                                <td> المهنة:</td>
                                                <td> {{$cv->job->title??''}}</td>
                                            </tr>
                                            <tr>
                                                <td> الديانة:</td>
                                                <td> {{$cv->religion->title??''}}</td>
                                            </tr>
                                            <tr>
                                                <td> الحالة الاجتماعية:</td>
                                                <td> {{$cv->social_type->title??''}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </a>
                    @endforeach
    </div>

@else

    <div class="d-flex align-items-center justify-content-center py-5 row">
        <img style="width: 100%;height: 300px ; object-fit: contain" src="{{asset('frontend/img/no_data.png')}}"
             alt="no data for current orders">
    </div>


    <div class="text-center mb-3">
        <h3> {{__('frontend.no result for search')}}</h3>
    </div>

@endif
