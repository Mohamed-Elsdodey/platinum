<section class="account" id="CodeForm" style="display: none">
    <div class="container">
        <div class="formCard row">
            <div class="circleBlur"></div>
            <div class="circleBlur2"></div>
            <div class="col-md-6 p-2">
                <img class="loginImg" src="{{asset('frontend')}}/img/otp.svg" alt="">
            </div>
            <div class="col-md-6 p-2">
                <form id="CompleteRegister" method="post" action="{{route('register_action')}}" class="row">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="hidden" name="name" value="" id="nameInCode">
                    <input type="hidden" name="password" value="" id="passwordInCode">
                    <input type="hidden" name="phone" value="" id="phoneInCode">
{{--                    <input type="hidden" name="code" value="" id="codeInCode">--}}

                    <div class="col-12 p-2 text-center">
                        <label class="form-label"> {{__('frontend.PleaseEnterTheSentCode')}} <span> 5XXXXXXXX </span> </label>
                        <div class="vCode " id="vCode" >
                            <input id="vCodeIdFirst" onkeypress="isNumber(evt)"  type="number" class="vCode-input mx-1" maxlength="1">
                            <input type="number"  onkeypress="isNumber(evt)"  class="vCode-input mx-1" maxlength="1">
                            <input type="number"   onkeypress="isNumber(evt)" class="vCode-input mx-1" maxlength="1">
                            <input type="number"  onkeypress="isNumber(evt)"  class="vCode-input mx-1" maxlength="1">
                        </div>
                    </div>
                    <div class="col-12 p-2 text-center">
                        <button id="CompleteRegisterButton" class="customBtn " type="submit">
                            <p class="px-5"> {{__('frontend.confirm')}} </p>
                            <span></span>
                        </button>
                    </div>
                </form>

            </div>
            <div class="col-md-12 p-2">
                <p class="text-center pt-4 pb-2"> <span id="codeReceiveOrNot">{{__('frontend.I did not receive the activation code')}}</span> <a href="#" id="sendCodeAgain" attr-code-sent="sent"> {{__('frontend.ReSent')}} </a>
                   {{__('frontend.changePhoneAgain')}}
                    <a id="registerAgain" href="#"> {{__('frontend.from here')}}</a>
                </p>
            </div>
        </div>
    </div>
</section>
