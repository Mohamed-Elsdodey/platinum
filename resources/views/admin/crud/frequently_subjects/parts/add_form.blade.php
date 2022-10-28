<form action="{{route('frequently-subjects.store')}}" method="post" id="Form">
    @csrf

    <div class="row ">
        @foreach($languages as $index=>$language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="{{$language->title}}_title">العنوان {{--({{__('admin.'.$language->title)}}
                        )--}} </label>
                    <input data-validation="required" type="text" class="form-control" value=""
                           id="{{$language->title}}_title" name="title[]"
                           placeholder=" العنوان {{--({{__('admin.'.$language->title)}}) --}}">
                </div>
            </div>
        @endforeach

        @foreach($languages as $index=>$language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                <div class="form-group">
                    <label for="summernote1{{$language->title}}">الوصف
                      {{--  ({{__('admin.'.$language->title)}})--}} </label>
                    <textarea data-validation="" rows="6" class="form-control " name="desc[]"
                              id="summernote1{{$language->title}}"
                              placeholder="الوصف {{--({{__('admin.'.$language->title)}}) --}}"></textarea>
                </div>
            </div>
        @endforeach
    </div>
</form>

