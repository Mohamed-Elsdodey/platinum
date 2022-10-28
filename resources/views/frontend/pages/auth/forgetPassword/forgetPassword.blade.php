@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Forget Password Page')}}
@endsection

@section('styles')
    <style></style>
@endsection


@section('content')

    <section class="account">
        <div class="container">
            <div class="formCard row">
                <div class="circleBlur"></div>
                <div class="circleBlur2"></div>
                <div class="col-md-6 p-2">
                    <img class="loginImg" src="{{asset('frontend')}}/img/Forgot password.svg" alt="">
                </div>
                <div class="col-md-6 p-2">
                    <form id="forget_password" method="post" action="{{route('auth.forget_password_action')}}"
                          class="row">
                        @csrf

                        <div class="col-12 p-2">
                            <label for="phone" class="form-label"> <i
                                    class="fas fa-phone me-2"></i> {{__('frontend.Phone Number')}} </label>

                            <div class="input-group">
                                <input data-validation="required,validatePhoneNumberOfSAR" id="phone"
                                       onkeypress="return isNumber(event)" name="phone" type="text" class="form-control"
                                       placeholder="5********">
                                <span class="input-group-text" style="direction: ltr;"> +996 </span>
                            </div>

                        </div>

                        <div class="col-12 py-4 p-2 text-center">

                            <button id="submit_button" class="customBtn " type="submit">
                                <p class="px-5"> {{__('frontend.Send Reset Password Link')}} </p>
                                <span></span>
                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('js')

    <script>
        // Add validator
        $.formUtils.addValidator({
            name: 'validatePhoneNumberOfSAR',
            validatorFunction: function (value, $el, config, language, $form) {
                return /^(05)[0-9]{8}$|^(5)[0-9]{8}$/.test(value);
            },
            errorMessage: "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'badEvenNumber'
        });

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }

        $(document).on('submit', 'form#forget_password', function (e) {
            e.preventDefault();
            var myForm = $("#forget_password")[0]
            var formData = new FormData(myForm)
            var url = $('#forget_password').attr('action');
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

                    //$('#submit-button').prop('disabled', true);

                    window.setTimeout(function () {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_button').attr('disabled', false)
                        $('#submit_button').html(`<p class="px-5">{{__('frontend.Send Reset Password Link')}}</p> <span></span>`)
                        location.replace("{{route('auth.forget-email-sent-successfully')}}")
                    }, 2000);

                },
                error: function (data) {
                    $('#submit_button').attr('disabled', false)
                    $('#submit_button').html(`<p class="px-5">{{__('frontend.Send Reset Password Link')}}</p> <span></span>`)

                    if (data.status === 400) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is not exists')}}",
                            timer: 3000
                        })
                    }

                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
    </script>
@endsection
