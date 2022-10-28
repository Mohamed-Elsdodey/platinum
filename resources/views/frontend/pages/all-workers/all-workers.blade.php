@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Recruitment Request')}}
@endsection

@section('styles')
    <style>
        .wrapper {
            margin: 30px;
            padding: 30px;
            background: #fff;
            width: 100%;
            height: 300px;
            display: flex;
            flex-direction: column;
            border-radius: 15px;
        }

        .wrapper-cell {
            /* display: flex; */
            margin-bottom: 30px;
        }

        @-webkit-keyframes placeHolderShimmer {
            0% {
                background-position: -468px 0;
            }

            100% {
                background-position: 468px 0;
            }
        }

        @keyframes placeHolderShimmer {
            0% {
                background-position: -468px 0;
            }

            100% {
                background-position: 468px 0;
            }
        }

        .animated-background,
        .text-line,
        .image {
            -webkit-animation-duration: 1.25s;
            animation-duration: 1.25s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-name: placeHolderShimmer;
            animation-name: placeHolderShimmer;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
            background: #F6F6F6;
            background: linear-gradient(to right, #F6F6F6 8%, #F0F0F0 18%, #F6F6F6 33%);
            background-size: 800px 104px;
            height: 96px;
            position: relative;
        }

        .image {
            height: 200px;
            width: 100%;
        }

        .text {
            /* margin-left: 20px; */
        }

        .text-line {
            height: 10px;
            width: 100%;
            margin: 4px 0;
            margin-top: 10px;
        }

        .text-line.price {
            height: 40px;
            width: 100%;
            margin: auto;
            margin-top: 10px;
        }
    </style>
@endsection


@section('content')

    <section class="allWorkers">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 p-1">
                    <!-- filter -->
                    <div class="filter">
                        <h4 class="sideTitle mb-4"> {{__('frontend.advanced search')}} </h4>

{{--                        <form id="SearchWorker" method="get" action="{{route('all-workers.search')}}" class="row">--}}
{{--                            @csrf--}}
                            @if(count($ages) > 0)
                            <!-- age -->
                            <div class="py-3 col col-md-12" style="min-width: 120px;">
                                <label for="age"> <i class="fa-duotone fa-hourglass me-1"></i> العمر </label>
                                <select id="age" name="age" class="select2">
                                    <option value="" selected> {{__('frontend.all')}} </option>
                                    @foreach($ages as $age)
                                    <option value="{{$age->id}}">{{__('frontend.from')}} {{$age->from}} {{__('frontend.to')}}  {{$age->to}} </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            @if(count($jobs) > 0)
                            <!-- Occupation -->
                            <div class="py-3 col col-md-12" style="min-width: 120px;">
                                <label for="job"> <i class="fa-duotone fa-briefcase me-1"></i> {{__('frontend.Job')}} </label>
                                <select id="job" name="job" class="select2">
                                    <option value="" selected> {{__('frontend.all')}} </option>
                                    @foreach($jobs as $job)
                                        <option  value="{{$job->id}}"> {{$job->title}} </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            @if(count($nationalities) > 0)
                            <!-- Nationality -->
                            <div class="py-3 col col-md-12" style="min-width: 120px;">
                                <label for="nationality"> <i class="fa-duotone fa-flag me-1"></i> {{__('frontend.nationalities')}} </label>
                                <select id="nationality" name="nationality" class="select2">
                                    <option value="" > {{__('frontend.all')}} </option>
                                    @foreach($nationalities as $nationalitie)
                                        <option value="{{$nationalitie->id}}" @isset($country_id) @if($country_id==$nationalitie->id) selected  @endif @endisset> {{$nationalitie->title}} </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class=" pt-4 d-flex align-items-center justify-content-center flex-wrap">
                                <button id="SearchResetButton" type="button" class=" btn clear m-1 "> {{__('frontend.Clear')}}
                                    <span></span>
                                </button>
                                <button id="SearchWorkerButton" type="submit" class="btn confirm">
                                    <span></span>

                                    {{__('frontend.Apply')}}
                                </button>
                            </div>
{{--                        </form>--}}

                    </div>
                    <!-- end filter -->
                </div>


                <div class="col-md-8 col-lg-9 p-0" id="">
                    <div id="hereWillDisplayAllWorker">
                        @include('frontend.pages.all-workers.worker.workers_page')
                    </div>


                    {{--------------   load more  -----------------}}
                    <div style="{{$last_page == $current_page ?"display:none !important;":""}}"
                         class="d-flex align-items-center justify-content-center py-5 register-submit" id="buttonOfFilter">
                        <button id="load_more_button" class="customBtn" type="button">
                            {{__('frontend.load more')}}
                        </button>
                    </div>


                </div>

            </div>
            <!-- custom Order -->
            <div class="alert  fade show customOrder wow fadeInUp" role="alert">
                <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                <h6>{{__('frontend.We can provide the right manpower according to your specifications')}} </h6>


                <a href="{{route('custom-worker-request')}}" class="defaultBtn mx-1">
                    {{__('frontend.Submit a special request')}}
                    <span></span>
                </a>

            </div>
            <!-- end custom Order -->
        </div>
        <!-- Modal -->
    </section>

@endsection

@section('js')

    <script>
        var loader_html = `

        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 p-2 loader_html ">
                <div class="wrapper">
                    <div class="wrapper-cell row">
                        <div class="col-12">
                            <div class="image"></div>
                        </div>
                        <div class="col-12">
                            <div class="text">
                                <div class="text-line"></div>
                                <div class="text-line price"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 p-2 loader_html ">
                <div class="wrapper">
                    <div class="wrapper-cell row">
                        <div class="col-12">
                            <div class="image"></div>
                        </div>
                        <div class="col-12">
                            <div class="text">
                                <div class="text-line"></div>
                                <div class="text-line price"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 p-2 loader_html ">
                <div class="wrapper">
                    <div class="wrapper-cell row">
                        <div class="col-12">
                            <div class="image"></div>
                        </div>
                        <div class="col-12">
                            <div class="text">
                                <div class="text-line"></div>
                                <div class="text-line price"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 p-2 loader_html ">
                <div class="wrapper">
                    <div class="wrapper-cell row">
                        <div class="col-12">
                            <div class="image"></div>
                        </div>
                        <div class="col-12">
                            <div class="text">
                                <div class="text-line"></div>
                                <div class="text-line price"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 p-2 loader_html ">
                <div class="wrapper">
                    <div class="wrapper-cell row">
                        <div class="col-12">
                            <div class="image"></div>
                        </div>
                        <div class="col-12">
                            <div class="text">
                                <div class="text-line"></div>
                                <div class="text-line price"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 p-2 loader_html ">
                <div class="wrapper">
                    <div class="wrapper-cell row">
                        <div class="col-12">
                            <div class="image"></div>
                        </div>
                        <div class="col-12">
                            <div class="text">
                                <div class="text-line"></div>
                                <div class="text-line price"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                `;


        //load more script
        var new_page = 1;
        var url = '{{route('all-workers')}}';
        var link_only = '{{route('all-workers')}}';
        @if($type=='transport')
        var url = '{{route('all-workers-transport')}}';
        var link_only = '{{route('all-workers-transport')}}';

        @endif
        var age = $("#age").val();
        var job = $("#job").val();
        var nationality = $("#nationality").val();

        $(document).unbind("click").on('click', '#load_more_button', function (e) {
            e.preventDefault()
            ++new_page
            // console.log("new page" , new_page)
            loadMoreData(new_page);
        })//end fun

        function loadMoreData(new_page) {

            url = link_only+"?page="+new_page+"&age="+age+"&job="+job+"&nationality="+nationality
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function () {
                    $('#hereWillDisplayAllWorker').append(loader_html);
                    $('#load_more_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function () {

                },
                success: function (data) {
                    console.log(data.last_page , data.current_page)
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_button").remove();
                    }

                    setTimeout(function () {
                        var elements = document.getElementsByClassName("loader_html");
                        while (elements.length > 0) elements[0].remove();
                        // var elements = document.getElementsByClassName("loader_html");
                        //while (elements.length > 0) elements[0].remove();
                        $('#hereWillDisplayAllWorker').append(data.html);
                        $('#load_more_button').html("{{__('frontend.load more')}}")
                    }, 100);
                },
                error: function (data) {
                    alert('Something went wrong.');
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });

        }//end fun



        $(document).on('click','#SearchWorkerButton',function(e) {
            e.preventDefault();
            new_page = 1;
             age = $("#age").val();
             job = $("#job").val();
             nationality = $("#nationality").val();
            url = link_only+"?page="+new_page+"&age="+age+"&job="+job+"&nationality="+nationality
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                    $("#hereWillDisplayAllWorker").html(loader_html)
                    $('#SearchWorkerButton').attr('disabled',true)
                    $('#SearchWorkerButton').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){

                },
                success: function (data) {

                    window.setTimeout(function() {
                        $("#hereWillDisplayAllWorker").html(data.html)
                        $('#SearchWorkerButton').attr('disabled',false)
                        $('#SearchWorkerButton').html(`  <span></span> {{__('frontend.Apply')}}`)
                        console.log(data.last_page , data.current_page)
                        if (data.last_page == data.current_page) {
                            document.getElementById("load_more_button").remove();
                        }else{
                            $("#buttonOfFilter").html(` <button id="load_more_button" class="customBtn" type="button">
                            {{__('frontend.load more')}}
                            </button>`)
                        }

                    }, 2000);

                },
                error: function (data) {
                    $('#SearchWorkerButton').attr('disabled',false)
                    $('#SearchWorkerButton').html(`  <span></span> {{__('frontend.Apply')}}`)

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit


        $(document).on('click','#SearchResetButton',function (e) {
            e.preventDefault()
            var ob = $(this)
            ob.html(`<i class='fa fa-spinner fa-spin '></i>`)
            $(".select2").val(null).trigger("change")
            window.setTimeout(function() {
                ob.html(`{{__('frontend.Clear')}}
                <span></span>`)
            }, 200);
            //make reset for all select2



        })

    </script>

    <script>
        clear();
        function clear() {
            var job = $('#job').val();
            var age = $('#age').val();
            var nationality = $('#nationality').val();
            if (job == '' && age == '' && nationality == '') {
                $('#SearchResetButton').hide();
                $('#SearchWorkerButton').trigger('click');

            } else {
                $('#SearchResetButton').show();

            }
        }
        $('#job').on('change',function (){
            clear()
        });
        $('#age').on('change',function (){
            clear()
        });
        $('#nationality').on('change',function (){
            clear()
        });

    </script>


@endsection
