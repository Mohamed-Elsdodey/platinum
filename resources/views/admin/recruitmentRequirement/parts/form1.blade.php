<div>
    <form id="Form_row1" method="post" action="{{route('admin.updateRecruitmentRequirement',$row1->id)}}">

        <input type="hidden" name="form_type" value="about">
        <div class="row ">
            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label
                            for="summernote1{{$language->title}}"> عنوان وثائق اصدار التاشيرة
                             </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="title[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="النص عن خدماتنا ">
                                                         {{$row1->getTranslation('title', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach

                @foreach($languages as $index=>$language)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                        <div class="form-group">
                            <label
                                for="summernote1{{$language->title}}"> صورة الهوية الوطنية او الاقامة للمقيمين

                            </label>
                            <textarea data-validation="" rows="6" class="form-control "
                                      name="copy_of_the_national_IDor_residence_for_residents[]"
                                      id="summernote1{{$language->title}}"
                                      placeholder="النص عن خدماتنا ">
                                                         {{$row1->getTranslation('copy_of_the_national_IDor_residence_for_residents', $language->title)}}
                                                     </textarea>
                        </div>
                    </div>
                @endforeach

                @foreach($languages as $index=>$language)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                        <div class="form-group">
                            <label
                                for="summernote1{{$language->title}}">خدمة عملاء متميزة


                            </label>
                            <textarea data-validation="" rows="6" class="form-control "
                                      name="qutstanding_customer_service[]"
                                      id="summernote1{{$language->title}}"
                                      placeholder="النص عن خدماتنا ">
                                                         {{$row1->getTranslation('qutstanding_customer_service', $language->title)}}
                                                     </textarea>
                        </div>
                    </div>
                @endforeach





                @foreach($languages as $index=>$language)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                        <div class="form-group">
                            <label
                                for="summernote1{{$language->title}}">تعريف بالراتب من جهة العمل أو كشف حساب البنك

                            </label>
                            <textarea data-validation="" rows="6" class="form-control "
                                      name="salary_definition_from_the_employer_or_bank_statement[]"
                                      id="summernote1{{$language->title}}"
                                      placeholder="النص عن خدماتنا ">
                                                         {{$row1->getTranslation('salary_definition_from_the_employer_or_bank_statement', $language->title)}}
                                                     </textarea>
                        </div>
                    </div>
                @endforeach


                @foreach($languages as $index=>$language)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                        <div class="form-group">
                            <label
                                for="summernote1{{$language->title}}">التأشيرة الأصل

                            </label>
                            <textarea data-validation="" rows="6" class="form-control "
                                      name="original_visa[]"
                                      id="summernote1{{$language->title}}"
                                      placeholder="النص عن خدماتنا ">
                                                         {{$row1->getTranslation('original_visa', $language->title)}}
                                                     </textarea>
                        </div>
                    </div>
                @endforeach

                @foreach($languages as $index=>$language)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                        <div class="form-group">
                            <label
                                for="summernote1{{$language->title}}">توقيع عقد إستقدام



                            </label>
                            <textarea data-validation="" rows="6" class="form-control "
                                      name="signing_recruitment_contract[]"
                                      id="summernote1{{$language->title}}"
                                      placeholder="النص عن خدماتنا ">
                                                         {{$row1->getTranslation('signing_recruitment_contract', $language->title)}}
                                                     </textarea>
                        </div>
                    </div>
                @endforeach




        </div>
        <div class="row mt-4">
            <div class="col-sm-6">

            </div> <!-- end col -->
            <div class="col-sm-6">
                @if(checkPermission(38))
                <div class="text-end">
                    <button form="Form_row1" type="submit" class="btn btn-success">
                        <i class="mdi mdi-content-save me-1"></i> حفظ
                    </button>
                </div>
                @endif
            </div> <!-- end col -->
        </div> <!-- end row -->
    </form>
</div>
