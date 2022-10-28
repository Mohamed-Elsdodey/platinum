<div class="cv">
    <div class="cvImg">
        <img src="{{count($cv->images)>0?get_file($cv->images[0]->image):asset('frontend/img/cv1.webp')}}">
    </div>
    <span class="type"> {{$cv->job?$cv->job->title:"لا يوجد"}} </span>
    <div class="details">

        <a href="#!" class="cvDetails" attr-id="{{$cv->id}}"> {{__('frontend.Details')}} </a>
    </div>
</div>
