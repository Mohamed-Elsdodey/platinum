<section class="account " id="registerForm">
    <div class="container">
        <div class="formCard row">
            <div class="circleBlur"></div>
            <div class="circleBlur2"></div>
            <div class="col-md-5 p-2">
                <img class="loginImg" src="{{asset('frontend')}}/img/register.svg" alt="">
            </div>
            <div class="col-md-7 p-2">
                <form method="post" action="{{route('checkPhoneToSendOtp')}}" class="row" id="Form">
                    @csrf
                    <div class="col-12 p-2">
                        <label for="name" class="form-label"> <i
                                class="fas fa-user me-2"></i> {{__('frontend.FullName')}}* </label>
                        <input data-validation="required,length" data-validation-length="min2" type="text"
                               class="form-control" name="name" id="name"
                               placeholder="{{__('frontend.enter FullName')}}">
                    </div>
                    <div class="col-12 p-2">
                        <label for="Phone" class="form-label"> <i
                                class="fas fa-phone-alt me-2"></i> {{__('frontend.phone')}}* </label>

                        <div class="input-group">
                            <input onkeypress="return isNumber(event)"
                                   data-validation="required,validatePhoneNumberOfSAR" type="text" class="form-control"
                                   id="Phone" name="phone" placeholder="5********">

                            <span class="input-group-text" style="direction: ltr;"> +996 </span>
                        </div>

                    </div>

                    <div class="col-md-6 p-2 passwordDiv">
                        <label for="password" class="form-label"> <i
                                class="fas fa-key me-2"></i> {{__('frontend.Password')}}* </label>
                        <input data-validation="required,length" data-validation-length="min6" type="password"
                               class="form-control passwordInput" id="password" name="password" placeholder="*****">
                        <span style="display: none" class="eye passwordEye"><i class="far fa-eye"></i></span>
                    </div>
                    <div class="col-md-6 p-2 passwordDiv">
                        <label for="repetPassword" class="form-label"> <i
                                class="fas fa-key me-2"></i> {{__('frontend.confirmPassword')}} *
                        </label>
                        <input data-validation="required,repeatPassword" type="password"
                               class="form-control passwordInput" id="repetPassword" name="repeatPassword"
                               placeholder="*****">
                        <span style="display: none" class="eye passwordEye"><i class="far fa-eye"></i></span>
                    </div>
                    <div class="col-12 pt-4 p-2 text-center">

                        <button id="submit_button" class="customBtn " type="submit">
                            <p class="px-5">{{__('frontend.RegisterPage')}}</p>
                            <span></span>
                        </button>
                    </div>
                </form>

            </div>
            <div class="col-md-12 p-2">
                <p class="text-center pt-4 pb-2"> {{__('frontend.you already have account ?')}} <a
                        href="{{route('auth.login')}}"> {{__('frontend.Login')}} </a></p>
            </div>
        </div>
    </div>
</section>
