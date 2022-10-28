@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Daily labor demand')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>
        <!-- recruitment request -->
        <section class="recruitmentRequest">
            <div class="container">
                <!-- Section Title -->
                <div class="SectionTitle">
                    <h2 class="title">{{__('frontend.Daily labor demand')}} </h2>
                    <h6 class="hint">
                      {{trans('frontend.We are able to bring the best types of professional labor from different countries and all the surplus currency from work to doctor')}}
                    </h6>
                </div>
                <!-- recruitment Request Form -->
                <form action="{{route('frontend.dailyLaborDemand.store')}}" id="Form" class="recruitmentRequestForm" method="post" >
                    @csrf
                    <div class="row justify-content-center">

                        <div class="col-md-8 pb-3 p-2">
                            <!-- formCard -->
                            <div class="formCard">
                                <div class="row">

                                    <div class="col-sm-12 pb-3 p-2">
                                        <label for="" class="form-label">  </label>
                                        <input type="text" name="facility_name" data-validation="required" class="form-control" id="" placeholder=" {{trans('frontend.Facility Name')}}  ">
                                    </div>
                                    <div class="col-sm-12 pb-3 p-2">
                                        <label for="" class="form-label">  </label>
                                        <input type="text" name="record_number" data-validation="required" class="form-control" id="" placeholder=" {{trans('frontend.record number')}} ">
                                    </div>
                                    <div class="col-sm-12 pb-3 p-2">
                                        <label for="" class="form-label">  </label>
                                        <input type="text" name="address" data-validation="required" class="form-control" id="" placeholder=" {{trans('frontend.the address')}} ">
                                    </div>
                                    <div class="col-sm-6 pb-3 p-2">
                                        <label for="" class="form-label"> {{trans('frontend.contact number')}} </label>
                                        <input type="number" name="contact_number" data-validation="required" class="form-control" id="" placeholder="  ">
                                    </div>
                                    <div class="col-sm-6 pb-3 p-2">
                                        <label for="" class="form-label"> {{trans('frontend.The number of workers required')}} </label>
                                        <input type="number" name="number_worker" data-validation="required" class="form-control" id="" placeholder=" 1 ">
                                    </div>

                                    <div class="col-sm-6 pb-3 p-2">
                                        <label for="" class="form-label"> {{trans('frontend.The type of currency required')}} </label>
                                        <select  data-validation="required" name="job_id" id="" class="select2">
                                            <option value="" selected disabled> {{trans('frontend.choice')}}</option>
                                          @foreach(\App\Models\Job::get() as $job)
                                            <option value="{{$job->id}}">  {{$job->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6 pb-3 p-2">
                                        <label for="" class="form-label">{{trans('frontend.visa number')}} </label>
                                        <input data-validation="required" name="visa_number" type="text" class="form-control" id="" placeholder=" {{trans('frontend.visa number')}} ">
                                    </div>

                                    <div class="col-sm-12 pb-3 p-2">
                                        <label for=""  class="form-label"> {{trans('frontend.Other requirements')}} </label>
                                        <textarea  data-validation="required" name="other_requirements" id="" class="form-control" rows="5"
                                                  placeholder="{{trans('frontend.Do you have special requirements for the worker?')}}"></textarea>
                                    </div>
                                </div>
                                <!-- submit -->
                                <div class="col-12 pt-4 p-2 text-center">
                                    <button class="customBtn " type="submit">
                                        <p class="px-5"> {{trans('frontend.send')}} </p>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>


        @endsection





        @section('js')
            <script>

                $(document).on('submit', 'form#Form', function (e) {
                    e.preventDefault();
                    var myForm = $("#Form")[0]
                    var formData = new FormData(myForm)
                    var url = $('#Form').attr('action');
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: formData,
                        beforeSend: function () {
                            $('#submit_button').attr('disabled', true)
                            $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                        },
                        complete: function () {

                        },
                        success: function (data) {
                            // var name = `${$("#contact_name").val()}`;
                            cuteAlert({
                                title: "{{__('frontend.Message Successfully Sent')}}",
                                message: ``,
                                type: "success", // or 'info', 'error', 'warning'
                                buttonText: "{{__('frontend.confirm')}}"
                            });
                            $('#submit_button').attr('disabled', false)
                            $('#submit_button').html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i>
                                <span></span>`)

                            $('#Form')[0].reset();
                        },
                        error: function (data) {
                            if (data.status === 500) {

                            }
                            if (data.status === 422) {

                            }
                        },//end error method

                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });


                function isNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                        return false;
                    }

                    return true;
                }
            </script>

@endsection




