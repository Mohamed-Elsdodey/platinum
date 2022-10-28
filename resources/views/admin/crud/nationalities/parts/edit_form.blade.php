<form action="{{route('nationalities.update',$obj->id)}}" method="post" id="Form">
    @csrf
    @method('PUT')

    <div class="row ">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">

                <label for="name" class="form-control-label">علم الدولة</label>
                <input type="file" class="dropify" name="image" data-default-file="{{get_file($obj->image)}}" accept="image/png, image/gif, image/jpeg,image/jpg"/>
                <span class="form-text text-danger text-center">مسموح فقط بالصيغ التالية : png, gif, jpeg, jpg</span>
            </div>
        </div>




    @foreach($languages as $index=>$language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="{{$language->title}}_title">{{__('admin.nationalities')}} ({{__('admin.'.$language->title)}}) </label>
                    <input data-validation="required" type="text" class="form-control"
                           value="{{$obj->getTranslation('title', $language->title)}}"
                           id="{{$language->title}}_title" name="title[]"
                           placeholder="{{__('admin.nationalities')}} {{--({{__('admin.'.$language->title)}}) --}}">
                </div>
            </div>
        @endforeach
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="recruitment_price">سعر الاستقدام  </label>
                    <input data-validation="required" type="text" class="form-control" value="{{$obj->price}}"
                           id="recruitment_price" name="price"
                           placeholder="سعر الاستقدام">
                </div>
            </div>


        @foreach($languages as $index=>$language)

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="{{$language->title}}-name">(   اسم الدولة{{__('admin.'.$language->title)}})   </label>
                    <input data-validation="required" type="text" class="form-control"
                           value="{{$obj->getTranslation('country_name', $language->title)}}"
                           id="{{$language->title}}-name" name="country_name[]"
                           placeholder="اسم الدولة ">
                </div>
            </div>
        @endforeach
        @foreach($languages as $index=>$language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="{{$language->title}}-desc">(      الوصف  {{__('admin.'.$language->title)}}) </label>
                    <input data-validation="required" type="text" class="form-control"
                           value="{{$obj->getTranslation('desc', $language->title)}}"
                           id="{{$language->title}}-desc" name="desc[]"
                           placeholder="الوصف">
                </div>
            </div>
        @endforeach




        {{--  @foreach($languages as $index=>$language)
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                  <div class="form-group">
                      <label for="summernote1{{$language->title}}">{{__('admin.the_answer')}}
                          --}}{{--  ({{__('admin.'.$language->title)}})--}}{{-- </label>
                      <textarea data-validation="" rows="6" class="form-control " name="desc[]"
                                id="summernote1{{$language->title}}"
                                placeholder="{{__('admin.the_answer')}} --}}{{--({{__('admin.'.$language->title)}}) --}}{{--">
                          {{$obj->getTranslation('desc', $language->title)}}
                      </textarea>
                  </div>
              </div>
          @endforeach--}}
    </div>
    {{--form--}}

    {{--form--}}
</form>


