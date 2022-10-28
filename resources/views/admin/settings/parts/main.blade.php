<div>
    <h4 class="card-title">المعلومات الرئيسية</h4>
    <form id="Form_main" method="post" action="{{route('settings.update',$settings->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="main">
        <div class="row ">
            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label
                            for="{{$language->title}}_title">اسم الموقع </label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->getTranslation('title', $language->title)}}"
                               id="{{$language->title}}_title" name="title[]"
                               placeholder="اسم الموقع">
                    </div>
                </div>
            @endforeach

            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="summernote1{{$language->title}}">
                            نبذه بالفوتر
                        </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="footer_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="{{__('admin.the_answer')}} ({{__('admin.'.$language->title)}}) ">
                                                         {{$settings->getTranslation('footer_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach


            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="summernote1{{$language->title}}">
                            من نحن
                        </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="about_us[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="{{__('admin.about us')}} ({{__('admin.'.$language->title)}}) ">
                                                         {{$settings->getTranslation('about_us', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach

            <br><br>
            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label
                            for="{{$language->title}}_title"> عنوان مقدمي الخدمة
                        </label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->getTranslation('service_providers_title', $language->title)}}"
                               id="{{$language->title}}_title" name="service_providers_title[]"
                               placeholder="">
                    </div>
                </div>
            @endforeach


            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="summernote1{{$language->title}}">
                            وصف مقدمي الخدمة
                        </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="service_providers_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="{{__('admin.about us')}} ({{__('admin.'.$language->title)}}) ">
                                                         {{$settings->getTranslation('service_providers_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach


            <br><br>
            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label
                            for="{{$language->title}}_title"> عنوان خدمات رقمية متكاملة

                        </label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->getTranslation('integrated_digital_services_title', $language->title)}}"
                               id="{{$language->title}}_title" name="integrated_digital_services_title[]"
                               placeholder="">
                    </div>
                </div>
            @endforeach


            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="summernote1{{$language->title}}">
                            وصف خدمات رقمية متكاملة

                        </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="integrated_digital_services_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="{{__('admin.about us')}} ({{__('admin.'.$language->title)}}) ">
                                                         {{$settings->getTranslation('integrated_digital_services_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach


            <br><br>
            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label
                            for="{{$language->title}}_title"> عنوان خدمة عملاء متميزة


                        </label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->getTranslation('outstanding_customer_service_title', $language->title)}}"
                               id="{{$language->title}}_title" name="outstanding_customer_service_title[]"
                               placeholder="">
                    </div>
                </div>
            @endforeach


            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="summernote1{{$language->title}}">
                            وصف خدمة عملاء متميزة


                        </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="outstanding_customer_service_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="{{__('admin.about us')}} ({{__('admin.'.$language->title)}}) ">
                                                         {{$settings->getTranslation('outstanding_customer_service_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach






            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label
                            for="{{$language->title}}_title">العنوان</label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->getTranslation('address1', $language->title)}}"
                               id="{{$language->title}}_title" name="address1[]"
                               placeholder="العنوان">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">

            </div> <!-- end col -->
            @if(checkPermission(4))
                <div class="col-sm-6">
                    <div class="text-end">
                        <button form="Form_main" type="submit" class="btn btn-success">
                            <i class="mdi mdi-content-save me-1"></i> حفظ
                        </button>
                    </div>
                </div> <!-- end col -->
            @endif
        </div> <!-- end row -->
    </form>
</div>
