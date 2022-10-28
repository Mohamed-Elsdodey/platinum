@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.OurServices')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>


        <!-- Main Banner  -->
        <section class="mainBanner">
            <h1> {{__('frontend.OurServices')}} </h1>
            <ul>
                <li>
                    <a href="{{route('home')}}"> {{__('frontend.Home')}} </a>
                </li>
                <li>
                    <a href="#!" class="active"> {{__('frontend.OurServices')}} </a>
                </li>
            </ul>

        </section>
        <!-- Main Banner  -->

        <!-- start services -->
        <section class="services py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- slide -->
                    @foreach($ourServices as $service)
                        <div class=" col-sm-6 col-md-4 p-1">
                            @if($service->id==6)
                                <a href="{{route('frontend.dailyLaborDemand')}}" class="service">
                                    @elseif($service->id==5)
                                        <a href="{{route('all-workers-transport','transport')}}" class="service">
                                            @elseif($service->id==4)

                                                <a href="{{route('all-workers')}}" class="service">

                                            @else



                                                <a href="" class="service">

                                        @endif
                                    <div class="serviceImg">
                                        <img src="{{get_file($service->image)}}" alt=""/>
                                    </div>
                                    <div class="details">
                                        <h4>{{$service->title}}</h4>
                                        <p>
                                            {{ $service->desc}}
                                        </p>
                                    </div>

                                </a>

                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- end services -->
    </content>

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
                        message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
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
