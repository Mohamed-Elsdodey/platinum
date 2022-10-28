@extends('admin.layouts.layout')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

@endsection

@section('page-title')
    معلومات عامة
@endsection

@section('page-links')
@endsection

@section('content')
    @include('admin.layouts.loader.loaderHtml')
    {{-------------------------}}

    <div class="row">

        {{-------------------------}}
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">مرحبا مرة أخرى</h5>
                                <p>لوحة التحكم</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{asset('dashboard')}}/assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{isset($settings->header_logo)?get_file($settings->header_logo):asset('39a6d186-91a6-477b-9a9b-217b49230b91.jpg')}}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{admin()->user()->name}}</h5>
                            <p class="text-muted mb-0 text-truncate">أدمن</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="row">
                                    <div class="col-12">
{{--                                        <h5 class="font-size-15">{{count($admins)}}</h5>--}}
                                        <p class="text-muted mb-0"><span class="badge bg-primary">متصل</span> </p>
                                    </div>

                                </div>
                                <div class="mt-4">
                                    <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm editProfile">مشاهدة الصفحة الشخصية <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-------------------------}}

        <div class="col-xl-8">
            <div class="row ">

                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">عدد الموظفين</p>
                                    <h4 class="mb-0">{{$admins}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-user-pin font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium"> السير الذاتية</p>
                                    <h4 class="mb-0">{{$biography}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-grid font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">طلبات الاستقدام </p>
                                    <h4 class="mb-0">{{$orders}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-store-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium"> العملاء </p>
                                    <h4 class="mb-0">{{$users}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-dizzy font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium"> طلبات الاستقدام الخاصة</p>
                                    <h4 class="mb-0">{{$biographySpecial}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-smile font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">التعاقدات  </p>
                                    <h4 class="mb-0">{{$biographyFinished}}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-repost font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-------------------------}}

    </div>

    {{-------------------------}}


    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <h4 class="card-title mb-4">احصائيات السير الزاتية</h4>
                        <div class="ms-auto">
                            <ul class="nav nav-pills">

                                <li class="nav-item">
                                    <a class="nav-link active" href="#">العام الحالي</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">الطلبات</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted">عدد الطلبات هذا الشهر</p>
                            <h3>{{$filterMonth}}</h3>
                            {{--                            <p class="text-muted"><span class="text-success me-2"> 12% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>--}}

                            {{--                            <div class="mt-4">--}}
                            {{--                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-4 mt-sm-0">
                                <div id="radialBar-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                    {{--                    <p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>--}}
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">احصائيات الطلبات</h4>

                    <div>
                        <div id="donut-chart" class="apex-charts"></div>
                    </div>

                    <div class="text-center text-muted">
                        <div class="row">
                            <div class="col-4">
                                <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary me-1"></i> الطلبات الجديدة</p>
                                    <h5>{{$newOrder}}</h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-success me-1"></i> الطلبات المكتملة </p>
                                    <h5>{{$finishedOrder}}</h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-danger me-1"></i> الطلبات الملغية</p>
                                    <h5>{{$cancelOrder}}</h5>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-gray me-1"></i> الطلبات جاري العمل</p>
                                    <h5>{{$underWork}}</h5>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">اجندة الطلبات</h4>

                    <div class="row">
                        <div id="calendar"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="https://washsquadsa.com/admin/plugins/calendar/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/ar.min.js" integrity="sha512-gVMzWflhCRdT4UPPUzNR9gCPtBZuc77GZxVx2CqSZyv0kEPIISiZEU0hk6Sb/LLSO87j4qXH/m9Iz373K+mufw==" crossorigin="anonymous"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#calendar').fullCalendar({
            defaultView: 'month',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            isRTL:true,
            locale: 'ar',
            lang: 'ar',
            editable: false,
            disableDragging: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            events:'{{route('admin.calender')}}',
            eventRender: function( event, element, view ) {
                var  sup =  element.find('.fc-content')
                var  con = sup.closest('span');
                var day_title = 'عدد الطلبات' ;

                sup.html( day_title +"<br>"+ event.title +" <br> <br>" +`<button style="display: none" id="${event.ids}" class="click_me btn btn-outline-danger text-white">تفاصيل</button>`);
                //event.title
            }
        });//calender object

        $(document).on('click','.click_me',function (e) {
            e.preventDefault()
            alert($(this).attr('id'))
        })
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#calendar').fullCalendar({
            defaultView: 'month',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            isRTL:true,
            locale: 'ar',
            lang: 'ar',
            editable: false,
            disableDragging: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            events:'{{route('admin.calender')}}',
            eventRender: function( event, element, view ) {
                var  sup =  element.find('.fc-content')
                var  con = sup.closest('span');
                var day_title = 'عدد الطلبات' ;

                sup.html( day_title +"<br>"+ event.title +" <br> <br>" +`<button style="display: none" id="${event.ids}" class="click_me btn btn-outline-danger text-white">تفاصيل</button>`);
                //event.title
            }
        });//calender object

        $(document).on('click','.click_me',function (e) {
            e.preventDefault()
            alert($(this).attr('id'))
        })
    </script>

    <script>
        var options = {
                chart: {
                    height: 610,
                    type: "bar",
                    stacked: !0,
                    toolbar: { show: !1 },
                    zoom: { enabled: !0 },
                },
                plotOptions: {
                    bar: { horizontal: !1, columnWidth: "15%", endingShape: "rounded" },
                },
                dataLabels: { enabled: !1 },

                series: [

                        @foreach(\App\Models\Nationalitie::get() as $country)
                    {
                        name: "{{$country->country_name}}",
                        data: [{{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$jan)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$feb)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$mar)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$abr)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$may)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$jul)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$jun)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$aug)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$sep)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$oct)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$nov)->count()}}, {{\App\Models\Biography::where('nationalitie_id',$country->id)->whereBetween('created_at',$des)->count()}}],
                    },
                    @endforeach

                ],
                xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                },
                colors: ["#556ee6", "#f1b44c", "#34c38f"],
                legend: { position: "bottom" },
                fill: { opacity: 1 },
            },
            chart = new ApexCharts(
                document.querySelector("#stacked-column-chart"),
                options
            );
        chart.render();
    </script>

    <script>

        options = {
            chart: { height: 200, type: "radialBar", offsetY: -10 },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    dataLabels: {
                        name: { fontSize: "13px", color: void 0, offsetY: 60 },
                        value: {
                            offsetY: 22,
                            fontSize: "16px",
                            color: void 0,
                            formatter: function (e) {
                                return e + "%";
                            },
                        },
                    },
                },
            },
            colors: ["#556ee6"],
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    shadeIntensity: 0.15,
                    inverseColors: !1,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91],
                },
            },
            stroke: { dashArray: 4 },
            series: [{{$percentage}}],
            labels: ["نسبة اكتمال طلب الاستقدام"],
        };
        (chart = new ApexCharts(
            document.querySelector("#radialBar-chart"),
            options
        )).render();
        @php
            if($orders==0){
                $orders=1;
            }
        @endphp

            options = {
            series: [{{$newOrder}}/{{$orders}}, {{$finishedOrder}}/{{$orders}}, {{$cancelOrder}}/{{$orders}},{{$underWork}}/{{$orders}}],
            chart: { type: "donut", height: 262 },
            labels: ["طلبات جديدة", "طلبات مكتملة", "طلبات ملغية","طلبات جاري العمل"],
            colors: ["#556ee6", "#34c38f", "#f46a6a","#777777"],
            legend: { show: !1 },
            plotOptions: { pie: { donut: { size: "70%" } } },
        };
        (chart = new ApexCharts(
            document.querySelector("#donut-chart"),
            options
        )).render();

    </script>


@endsection
