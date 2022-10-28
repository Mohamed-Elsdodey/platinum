@extends('admin.layouts.layout')
@section('styles')
    <link href="{{asset('dashboard/backEndFiles/uploadMultiImages/image-uploader.min.css')}}" rel="stylesheet"
          type="text/css">

    @include('admin.layouts.noContent.noContentCss')
    <style>
        select option[disabled] {
            display: none;
        }

        .fa {
            margin-left: -30px;
            cursor: pointer;
        }
        .select2-container{
            text-align: end;
        }
    </style>
    <style>
        .dropify-font-upload:before,
        .dropify-wrapper .dropify-message span.file-icon:before {
            content: "\f382";
            font-weight: 100;
            color: #000;
            font-size: 26px;
        }

        .dropify-wrapper .dropify-message p {
            text-align: center;
            font-size: 15px;
        }

    </style>


    <style>
        .modal-fullscreen .modal-body{
            overflow-y: unset!important;
        }
        .dropify-wrapper {
            padding: 0;
        }
        .dropify-wrapper .dropify-message {
            position: absolute;
            top: 50%;
            right: 50%;
            transform: translateY(-50%) translateX(50%);
        }
    </style>
@endsection

@section('page-title')
    تعديل السيرة الذاتية
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">تعديل السيرة الذاتية</h4>
                    <form id="Form" method="post" action="{{route('biographies.update',$biography->id)}}">
                        @csrf
                        @method('PUT')
                        @csrf
                        <div id="vertical-example" class="vertical-wizard">


                            <!-- Seller Details -->
                            <h3>البيانات الرئيسية </h3>
                            <section>

                                <div class="row">

                                    <div class=" col-12 p-2">
                                        <div class="form-group">
                                            <label for="cv_file"> ارفق صور السيرة الذاتية </label>
                                            <input  type="file" class="form-control dropify" value=""
                                                    id="cv_file" name="cv_file" placeholder="" data-default-file="{{get_file($biography->cv_file)}}">
                                        </div>

                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="name"> الاسم الشخصي </label>
                                            <input data-validation="required" required type="text" class="form-control"
                                                   value="{{$biography->name}}"
                                                   id="name" name="name" placeholder="">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="recruitment_office_id"> مكاتب السيرة الذاتيه </label>
                                            <select data-validation="required" required name="recruitment_office_id"
                                                    id="recruitment_office_id" class="form-control">
                                                @foreach($recruitment_office as $one)
                                                    <option @if($biography->recruitment_office_id==$one->id) selected
                                                            @endif value="{{$one->id}}">{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="salary">الراتب </label>
                                            <input data-validation="required" required type="number" class="form-control"
                                                   value="{{$biography->salary}}"
                                                   id="salary" name="salary" placeholder="">
                                        </div>
                                    </div>

{{--                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="biography_number">رقم سجل السيرة الذاتية </label>--}}
{{--                                            <input data-validation="required" required type="number" class="form-control"--}}
{{--                                                   value="{{$biography->biography_number}}"--}}
{{--                                                   id="biography_number" name="biography_number" placeholder="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">الجنسية </label>
                                            <select data-validation="required" required name="nationalitie_id"
                                                    class="form-control select2Users">
                                                @foreach($nationalitie as $one)
                                                    <option value="{{$one->id}}"
                                                            @if($biography->nationalitie_id==$one->id) selected @endif>{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div>


                            </section>

                            <!-- Company Document -->
                            <h3>تفاصيل اكثر </h3>
                            <section>

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">المهنة </label>
                                            <select data-validation="required" required name="job_id"
                                                    class="form-control select2Users">
                                                @foreach($job as $one)
                                                    <option value="{{$one->id}}"
                                                            @if($biography->job_id==$one->id) selected @endif>{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="age">العمر </label>
                                            <input data-validation="required" required type="number" class="form-control"
                                                   value="{{$biography->age}}"
                                                   id="age" name="age" placeholder="العمر">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">ديانة العامل </label>
                                            <select data-validation="required" required name="religion_id"
                                                    class="form-control select2Users">
                                                @foreach($religion as $one)
                                                    <option value="{{$one->id}}"
                                                            @if($biography->religion_id==$one->id) selected @endif>{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">النوع</label>
                                            <select data-validation="required" required name="type"
                                                    class="form-control select2Users">
                                                <option @if($biography->type=='admission') selected @endif  value="admission">استقدام</option>
                                                <option @if($biography->type=='transport') selected @endif  value="transport">نقل خدمات</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">اللغة التى يتحدث بها العامل</label>
                                            <select data-validation="required" required name="language_title_id"
                                                    class="form-control select2Users">
                                                @foreach($language_title as  $one)
                                                    <option value="{{$one->id}}"
                                                            @if($biography->language_title_id==$one->id) selected @endif>{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number"> الحالة الاجتماعية</label>
                                            <select data-validation="required" required name="social_type_id"
                                                    class="form-control select2Users">
                                                @foreach($social_type as  $one)
                                                    <option value="{{$one->id}}"
                                                            @if($biography->social_type_id==$one->id) selected @endif>{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">حالة العامل</label>
                                            <select data-validation="required" required name="type_of_experience"
                                                    class="form-control select2Users">
                                                <option value="new"
                                                        @if($biography->type_of_experience=='new') selected @endif>قادم
                                                    جديد
                                                </option>
                                                <option value="with_experience"
                                                        @if($biography->type_of_experience=='with_experience') selected @endif>
                                                    لديه خبرة سابقة
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </section>


                            <h3>المهارات</h3>

                            <section>
                                @foreach($skills as $skill)
                                    <div class="row align-items-center g-2 mb-3">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="form-group">

                                                <input id="{{$skill->id}}" type="checkbox" name="skills[]"
                                                       @foreach($biography->skills as $skl) @if($skl->id==$skill->id)  checked
                                                       @endif   @endforeach value="{{$skill->id}}">
                                                <label for="{{$skill->id}}">  {{$skill->title}}</label>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                            <div class="form-group">

                                                @php
                                                    $degrees=\App\Models\BiographySkill::where('biography_id',$biography->id)->where('skill_id',$skill->id)->get();

                                                @endphp


                                                <select id="{{$skill->id}}" name="{{$skill->id}}"
                                                        class="form-control select2Users text-end">
                                                    <option value="weak"
                                                            @foreach($degrees as $degree) @if($degree->skill_id==$skill->id) @if($degree->degree=="weak") selected @endif  @endif  @endforeach>
                                                        ضعيف
                                                    </option>
                                                    <option value="average"
                                                            @foreach($degrees as $degree) @if($degree->skill_id==$skill->id) @if($degree->degree=="average") selected @endif  @endif  @endforeach>
                                                        متوسط
                                                    </option>
                                                    <option value="good"
                                                            @foreach($degrees as $degree) @if($degree->skill_id==$skill->id) @if($degree->degree=="good") selected @endif  @endif  @endforeach >
                                                        جيد
                                                    </option>
                                                    <option value="very good"
                                                            @foreach($degrees as $degree) @if($degree->skill_id==$skill->id) @if($degree->degree=="very good") selected @endif  @endif  @endforeach>
                                                        جيد جدا
                                                    </option>
                                                    <option value="excellent"
                                                            @foreach($degrees as $degree) @if($degree->skill_id==$skill->id) @if($degree->degree=="excellent") selected @endif  @endif  @endforeach>
                                                        ممتاز
                                                    </option>
                                                </select>


                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </section>


                            <h3>بيانات جواز السفر </h3>
                            <section>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_number">رقم جواز السفر </label>
                                        <input data-validation="required" required type="text" class="form-control"
                                               value="{{$biography->passport_number}}"
                                               id="passport_number" name="passport_number" placeholder="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_place"> بلد جواز السفر </label>
                                        <input data-validation="required"  required type="text" class="form-control"
                                               value="{{$biography->passport_place}}"
                                               id="passport_place" name="passport_place" placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_created_at"> تاريخ اصدار جواز السفر </label>
                                        <input data-validation="required"  required type="date" class="form-control"
                                               value="{{$biography->passport_created_at}}"
                                               id="passport_created_at" name="passport_created_at" placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_ended_at"> تاريخ انتهاء جواز السفر </label>
                                        <input data-validation="required" required type="date" class="form-control"
                                               value="{{$biography->passport_ended_at}}"
                                               id="passport_ended_at" name="passport_ended_at" placeholder="">
                                    </div>
                                </div>

                            </section>

                            <h3>بيانات شخصية</h3>
                            <section>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="weight"> الوزن</label>
                                        <input data-validation="required" required type="number" step=".5" class="form-control"
                                               value="{{$biography->weight}}"
                                               id="weight" name="weight" placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="height"> الطول</label>
                                        <input data-validation="required" required type="number" step=".5" class="form-control"
                                               value="{{$biography->height}}"
                                               id="height" name="height" placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="skin_colour"> لون البشرة</label>
                                        <input data-validation="required" required type="text" class="form-control"
                                               value="{{$biography->skin_colour}}"
                                               id="skin_colour" name="skin_colour" placeholder="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="childern_number">عدد الاطفال</label>
                                        <input data-validation="required" required type="number" class="form-control"
                                               value="{{$biography->childern_number}}"
                                               id="childern_number" name="childern_number" placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="living_location">مكان السكن</label>
                                        <input data-validation="required" required type="text" class="form-control"
                                               value="{{$biography->living_location}}"
                                               id="living_location" name="living_location" placeholder="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="video"> لينك الفديو</label>
                                        <input data-validation="required" required type="text" class="form-control"
                                               value="{{$biography->video}}"
                                               id="video" name="video" placeholder="">
                                    </div>
                                </div>

                            </section>

                            <h3>بيانات علمية</h3>

                            <section>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="high_degree"> الدرجة العلمية</label>
                                        <input data-validation="required" required type="text" class="form-control"
                                               value="{{$biography->high_degree}}"
                                               id="high_degree" name="high_degree" placeholder="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_number">مستوي اجادة اللغة العربية</label>
                                        <select data-validation="required" required name="arabic_degree"
                                                class="form-control select2Users">
                                            <option value="weak" @if($biography->arabic_degree=="weak") selected @endif>
                                                ضعيف
                                            </option>
                                            <option value="average"
                                                    @if($biography->arabic_degree=="average") selected @endif>متوسط
                                            </option>
                                            <option value="good" @if($biography->arabic_degree=="good") selected @endif>
                                                جيد
                                            </option>
                                            <option value="very good"
                                                    @if($biography->arabic_degree=="very good") selected @endif> جيد جدا
                                            </option>
                                            <option value="excellent"
                                                    @if($biography->arabic_degree=="excellent") selected @endif> ممتاز
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_number">مستوي اجادة اللغة الانجليزية</label>
                                        <select data-validation="required" required name="english_degree"
                                                class="form-control select2Users">
                                            <option value="weak"
                                                    @if($biography->english_degree=="weak") selected @endif>ضعيف
                                            </option>
                                            <option value="average"
                                                    @if($biography->english_degree=="average") selected @endif>متوسط
                                            </option>
                                            <option value="good"
                                                    @if($biography->english_degree=="good") selected @endif> جيد
                                            </option>
                                            <option value="very good"
                                                    @if($biography->english_degree=="very good") selected @endif> جيد
                                                جدا
                                            </option>
                                            <option value="excellent"
                                                    @if($biography->english_degree=="excellent") selected @endif> ممتاز
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 p-2">
                                    <div class="form-group">
                                        <label for="prior_experiences">الخبرات السابقة </label>
                                        <select  name="prior_experiences"
                                                 class="form-control select2Users">
                                            <option @if($biography->prior_experiences==0) selected @endif value="0">لا</option>
                                            <option @if($biography->prior_experiences==1) selected @endif value="1">نعم</option>

                                        </select>
                                    </div>
                                </div>








                            </section>

                            <h3>الصورة الشخصية</h3>
                            <section>
                                <div class="form-group">
                                    <label for="name" class="form-control-label">الصورة</label>
                                    <input type="file" class="dropify" name="image"
                                           data-default-file="{{get_file($biography->image)}}"
                                           accept="image/png, image/gif, image/jpeg,image/jpg"/>
                                    <span class="form-text text-danger text-center">مسموح فقط بالصيغ التالية : png, gif, jpeg, jpg</span>
                                </div>

                            </section>


                            <h3>صور السيرة الذاتية </h3>
                            <section>
                                <div class="row">
                                    <div id="input-images-2"
                                         class="col-lg-12 col-md-12  mb-3 input-images2-2 input-images-1"
                                         style="height:200px; padding-top: .5rem;"></div>
                                </div>
                            </section>


                        </div>

                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

@endsection
@section('js')

    <script src="{{asset('dashboard')}}/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_ar.min.js" integrity="sha512-bGOftAqe7xfGxaWMsVQR187i+R9E0tXZIUL0idz1NKBBZIW78hoDtFY9gGLEGJFwHPjQSmPiHdm+80QParVi1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('dashboard/backEndFiles/uploadMultiImages/image-uploader.min.js')}}"></script>

    <script>

        var index = 1;
        // $(function(){
        //
        $("#vertical-example").steps({
            headerTag:"h3",
            bodyTag:"section",
            transitionEffect:"slide",
            stepsOrientation:"vertical",
            onStepChanging: function (event, currentIndex, newIndex)
            {



                $('#vertical-example').find('a[href="#finish"]').remove();

                if(currentIndex == 6 && $('#Form').valid()){
                    var $input = $('<input id="submit_button" style="border: none !important;background-color: #556ee6;border-radius: 4px;padding: 8px 15px;color: #fff;" type="submit" value="حفظ" />');
                    $input.appendTo($('ul[aria-label=Pagination]'));
                }
                else {
                    $('ul[aria-label=Pagination] input[value="حفظ"]').remove();
                }
                if(newIndex!==7){
                    $('ul[aria-label=Pagination] input[value="حفظ"]').remove();

                }


                $('#Form').validate().settings.ignore = ":disabled,:hidden";
                return  $('#Form').valid();




            },onFinishing: function (event, currentIndex)
            {
                $('#Form').validate().settings.ignore = ":disabled,:hidden";
                return  $('#Form').valid();

            },
            onFinished: function (event, currentIndex)
            {
                $('#Form').validate().settings.ignore = ":disabled,:hidden";
            } ,
            labels:
                {
                    finish: "حفظ",
                    next: "التالى",
                    previous: "السابق",
                },

        })


        $("#select2,.select2Users").select2({
            placeholder: '',
            dropdownAutoWidth: 'true',
            width: '100%'
        });

        $(".dropify").dropify()

        var images = @json($images);
        $('.input-images-1').imageUploader({
            'imagesInputName':"images",
            preloaded: images,
            preloadedInputName: 'old'
        });

        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();

            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $('.loader-ajax').show()

            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button').attr('disabled',true)

                },
                complete: function(){

                },
                success: function (data) {

                    window.setTimeout(function() {

                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "تمت العملية بنجاح",
                            timer: 3000
                        })
                        window.location.href='{{route('biographies.index')}}';
                        $('.loader-ajax').hide()
                    }, 20);
                },
                error: function (data) {
                    $('.loader-ajax').hide()
                    $('#submit_button').html(`حفظ`)
                    $('#submit_button').attr('disabled',false)
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "أنت لا تملك الصلاحية لفعل هذا",
                            timer: 3000
                        });
                    }
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    cuteToast({
                                        type: "error", // or 'info', 'error', 'warning'
                                        message: value,
                                        timer: 3000
                                    });

                                });

                            } else {

                            }
                        });
                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });

        });





    </script>

@endsection
