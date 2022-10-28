@extends('admin.layouts.layout')
@section('styles')
    <!-- Data Tables -->
    <!-- DataTables -->
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>


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

@endsection

@section('page-title')
    السير الذاتية
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{---------------------------------}}
                    <div class="row mb-2">
                        @if(checkPermission(19))
                            <div class="col-sm-4">
                                <div class="text-sm-start">
                                    <a href="{{route('biographies.create')}}" id="addButton" type="button"
                                       class="btn btn-success  waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> أضف جديد </a>
                                </div>
                            </div>
                        @endif
                        <div class="col-sm-8">
                            {{--                            <div class="text-sm-end">--}}
                            {{--                                <button id="bulk_delete" type="button" class="btn btn-danger  waves-effect waves-light mb-2 me-2">--}}
                            {{--                                    </button>--}}
                            {{--                            </div>--}}
                        </div><!-- end col-->
                    </div>

                    {{---------------------------------}}

                    <table id="Datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>
                                <input id="checkAll" type='checkbox' class='check-all form-check-input'
                                       data-tablesaw-checkall>

                                <a id="bulk_delete" href="#" style="display: none;" class=" text-danger p-2">
                                    <i class="mdi mdi-trash-can-outline me-1  "
                                       style=" width: 50% !important;height: 50% !important;"></i>
                                </a>
                            </th>

                            <th>الصورة</th>
                            <th>الحالة</th>
                            <th>الجنسية</th>
                            <th>رقم جواز السفر</th>
                            <th>التاريخ</th>

                            <th>صورة شخصية</th>
                            <th>الاسم</th>
                            <th>تاريخ اصدار الجواز</th>
                            <th>تاريخ انتهاء الجواز</th>
                            <th> مكان اصدار الجواز</th>
                            <th>الوزن</th>
                            <th>الطول</th>
                            <th>لون البشرة</th>
                            <th> عدد الاطفال</th>
                            <th> الدرجة العلمية</th>
                            <th> مكان السكن</th>
                            <th> مستوي اللغة العربية</th>
                            <th> مستوي اللغة الانجليزية</th>
                            <th>العمليات</th>

                        </tr>
                        </thead>


                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <!-- end row -->
    <div class="modal fade" id="exampleModalCenter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        {{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">المنتجات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="form-for-addOrDelete">

                </div>
                <div class="modal-footer justify-content-center align-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
                    <button form="Form" type="submit" class="btn btn-success">
                        حفظ
                        &nbsp;
                        <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <!-- Required datatable js -->
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <!-- Responsive examples -->
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script
        src="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*======================================================*/
        /*======================================================*/
        /*====================Datatable Example=================*/
        /*======================================================*/
        /*======================================================*/

        let datatable_selector;
        datatable_selector = $('#Datatable').DataTable({
            dom: 'Bfrtip',
            responsive: 1,
            "processing": true,
            "lengthChange": true,
            "serverSide": true,
            "ordering": true,
            "searching": true,
            'iDisplayLength': 20,
            "ajax": "{{route('biographies.index')}}",
            "columns": [
                {"data": "delete_all", orderable: false, searchable: false},
                {"data": "cv_file", orderable: false, searchable: false},
                {"data": "status", orderable: false, searchable: true},
                {"data": "nationalitie_id", orderable: false, searchable: true},
                {"data": "passport_number", orderable: false, searchable: true},
                {"data": "created_at", searchable: false},


                {"data": "image", orderable: false, searchable: false},
                {"data": "name", orderable: false, searchable: false},
                {"data": "passport_created_at", orderable: false, searchable: false},
                {"data": "passport_ended_at", orderable: false, searchable: false},
                {"data": "passport_place", orderable: false, searchable: false},
                {"data": "weight", orderable: false, searchable: false},
                {"data": "height", orderable: false, searchable: false},
                {"data": "skin_colour", orderable: false, searchable: false},
                {"data": "childern_number", orderable: false, searchable: false},
                {"data": "high_degree", orderable: false, searchable: false},
                {"data": "living_location", orderable: false, searchable: false},
                {"data": "arabic_degree", orderable: false, searchable: false},
                {"data": "english_degree", orderable: false, searchable: false},
                {"data": "actions", orderable: false, searchable: false},



                /*    {"data": "actions", orderable: false, searchable: false}*/
            ],
            "language": {
                "sProcessing": "{{__('admin.sProcessing')}}",
                "sLengthMenu": "{{__('admin.sLengthMenu')}}",
                "sZeroRecords": "{{__('admin.sZeroRecords')}}",
                "sInfo": "{{__('admin.sInfo')}}",
                "sInfoEmpty": "{{__('admin.sInfoEmpty')}}",
                "sInfoFiltered": "{{__('admin.sInfoFiltered')}}",
                "sInfoPostFix": "",
                "sSearch": "{{__('admin.sSearch')}}:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "{{__('admin.sFirst')}}",
                    "sPrevious": "{{__('admin.sPrevious')}}",
                    "sNext": "{{__('admin.sNext')}}",
                    "sLast": "{{__('admin.sLast')}}"
                }
            },
            order: [
                [2, "desc"]
            ],
        });


        /*======================================================*/
        /*======================================================*/
        /*====================Delete Single Row=================*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            Swal.fire({
                title: "هل أنت متأكد من تنفيذ هذا الإجراء ؟",
                text: "لا يمكنك التراجع بعد ذلك !",
                showCancelButton: true,
                type: "warning",
                confirmButtonColor: '#ff675e',
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                okButtonText: "موافق",
                closeOnConfirm: false
            }).then((result) => {
                // console.log(result)
                if (result.value) {
                    var url = '{{ route("biographies.destroy", ":id")}}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {id: id},
                        success: function (data) {
                            cuteToast({
                                type: "success", // or 'info', 'error', 'warning'
                                message: "تم تنفيذ العملية بنجاح",
                                timer: 3000
                            });
                            datatable_selector.draw();
                        }, error: function (data) {
                            swal.close()
                            cuteToast({
                                type: "error", // or 'info', 'error', 'warning'
                                message: "أنت لا تملك الصلاحية لفعل هذا ",
                                timer: 3000
                            });
                        }

                    });
                }
            });

        });


        /*======================================================*/
        /*======================================================*/
        /*====================Delete Multi Row=================*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '#bulk_delete', function (e) {
            e.preventDefault()
            var id = [];
            $('.delete-all:checked').each(function () {
                id.push($(this).attr('id'));
            });
            if (id.length > 0) {
                Swal.fire({
                    title: "هل أنت متأكد من تنفيذ هذا الإجراء ؟",
                    text: "لا يمكنك التراجع بعد ذلك !",
                    showCancelButton: true,
                    confirmButtonColor: '#ff675e',
                    type: "warning",
                    confirmButtonText: "موافق",
                    cancelButtonText: "إلغاء",
                    okButtonText: "موافق",
                    closeOnConfirm: false

                }).then((result) => {
                    if (result.value) {
                        if (id.length > 0) {

                            $.ajax({
                                url: '{{route('biographies.delete.bulk')}}',
                                type: 'DELETE',
                                data: {id: id},
                                success: function (data) {
                                    $("#bulk_delete").hide()
                                    $("#checkAll").prop('checked', false);
                                    cuteToast({
                                        type: "success", // or 'info', 'error', 'warning'
                                        message: "تم تنفيذ العملية بنجاح",
                                        timer: 3000
                                    });
                                    datatable_selector.draw();


                                }, error: function (data) {
                                    swal.close()
                                    cuteToast({
                                        type: "error", // or 'info', 'error', 'warning'
                                        message: "أنت لا تملك الصلاحية لفعل هذا ",
                                        timer: 3000
                                    });
                                }
                            });
                        }
                    }
                });
            } else {
                Swal.fire({
                    title: "هذه العملية لم تكتمل",
                    text: "من فضلك قم باختيار ما تريد حذفه",
                    type: "error",
                    confirmButtonText: "تم الأمر"
                });
            }

        });


        /*======================================================*/
        /*======================================================*/
        /*====================toggle for checkbox===============*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '#checkAll', function () {
            var check = true;
            $('.delete-all:checked').each(function () {
                check = false;
            });
            if (check == true) $("#bulk_delete").show()
            else $("#bulk_delete").hide()
            $('.delete-all').prop('checked', check);
        });


    </script>

@endsection
