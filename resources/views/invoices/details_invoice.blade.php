@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection

@section('title')
    تفاصيل الفاتورة
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمة الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الفاتورة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style3">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        تفاصيل الفاتورة
                    </div>
                    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-3">

                                <div class="tab-menu-heading">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class="">
                                                <a href="#tab11" class="active" data-toggle="tab">
                                                    <i class="fa fa-laptop"></i>
                                                    تفاصيل الفاتورة
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab12" data-toggle="tab">
                                                    <i class="fa fa-tasks"></i>
                                                    حالات الدفع
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab13" data-toggle="tab">
                                                    <i class="fa fa-cogs"></i>
                                                    المرفقات
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">

                                        {{-- First Tab --}}
                                        <div class="tab-pane active" id="tab11">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped" id="example1"
                                                                style="text-align:center">
                                                                <tr>
                                                                    <th scope="row">رقم الفاتورة</th>
                                                                    <td>{{ $invoice->incoice_number }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">تاريخ الفاتورة</th>
                                                                    <td>{{ $invoice->incoice_date }}</td>
                                                                    <th scope="row">تاريخ الاستحقاق</th>
                                                                    <td>{{ $invoice->due_date }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">القسم</th>
                                                                    <td>{{ $invoice->product }}</td>
                                                                    <th scope="row">المنتج</th>
                                                                    <td>{{ $invoice->section->section_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">مبلغ التحصيل</th>
                                                                    <td>{{ $invoice->Amount_collection }}</td>
                                                                    <th scope="row">مبلغ العمولة</th>
                                                                    <td>{{ $invoice->Amount_commission }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">قيمة الضريبة</th>
                                                                    <td>{{ $invoice->value_vat }}</td>
                                                                    <th scope="row">معدل الضريبة</th>
                                                                    <td>{{ $invoice->rate_vat }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">الخصم</th>
                                                                    <td>{{ $invoice->discount }}</td>
                                                                    <th scope="row">الإجمالي</th>
                                                                    <td>{{ $invoice->total }}</td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">حالة الدفع</th>
                                                                    @if ($invoice->value_status == 1)
                                                                        <td>
                                                                            <span Class="badge badge-pill badge-success">
                                                                                {{ $invoice->status }}
                                                                            </span>
                                                                        </td>
                                                                    @elseif($invoice->value_status == 2)
                                                                        <td>
                                                                            <span Class="badge badge-pill badge-danger">
                                                                                {{ $invoice->status }}
                                                                            </span>
                                                                        </td>
                                                                    @else
                                                                        <td>
                                                                            <span Class="badge badge-pill badge-warning">
                                                                                {{ $invoice->status }}
                                                                            </span>
                                                                        </td>
                                                                    @endif
                                                                    <th scope="row">الملاحظات</th>
                                                                    <td>{{ $invoice->note }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Second Tab --}}
                                        <div class="tab-pane" id="tab12">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0 table-hover"
                                                                style="text-align:center">
                                                                <thead>
                                                                    <tr class="text-dark">
                                                                        <th>#</th>
                                                                        <th>رقم الفاتورة</th>
                                                                        <th>نوع المنتج</th>
                                                                        <th>القسم</th>
                                                                        <th>حالة الدفع</th>
                                                                        <th>تاريخ الدفع </th>
                                                                        <th>ملاحظات</th>
                                                                        <th>تاريخ الاضافة </th>
                                                                        <th>المستخدم</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($details as $x)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $x->invoice_number }}</td>
                                                                            <td>{{ $x->product }}</td>
                                                                            <td>{{ $invoice->Section->section_name }}
                                                                            </td>
                                                                            @if ($x->Value_Status == 1)
                                                                                <td>
                                                                                    <span
                                                                                        class="badge badge-pill badge-success">
                                                                                        {{ $x->Status }}
                                                                                    </span>
                                                                                </td>
                                                                            @elseif($x->Value_Status == 2)
                                                                                <td>
                                                                                    <span
                                                                                        class="badge badge-pill badge-danger">
                                                                                        {{ $x->Status }}
                                                                                    </span>
                                                                                </td>
                                                                            @else
                                                                                <td>
                                                                                    <span
                                                                                        class="badge badge-pill badge-warning">
                                                                                        {{ $x->Status }}
                                                                                    </span>
                                                                                </td>
                                                                            @endif
                                                                            <td>{{ $x->Payment_Date }}</td>
                                                                            <td>{{ $x->note }}</td>
                                                                            <td>{{ $x->created_at }}</td>
                                                                            <td>{{ $x->user }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Third tab --}}
                                        <div class="tab-pane" id="tab13">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">
                                                {{-- @can('اضافة مرفق')
                                                    <div class="card-body">
                                                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title">اضافة مرفقات</h5>
                                                        <form method="POST" action="{{ url('/InvoiceAttachments') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="file_name" required>
                                                                <input type="hidden" id="customFile" name="invoice_number"
                                                                    value="{{ $invoices->invoice_number }}">
                                                                <input type="hidden" id="invoice_id" name="invoice_id"
                                                                    value="{{ $invoices->id }}">
                                                                <label class="custom-file-label" for="customFile">حدد
                                                                    المرفق</label>
                                                            </div>
                                                            <br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">
                                                                تاكيد
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endcan --}}
                                                <br>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">#</th>
                                                                <th scope="col">اسم الملف</th>
                                                                <th scope="col">قام بالاضافة</th>
                                                                <th scope="col">تاريخ الاضافة</th>
                                                                <th scope="col">العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($attachments as $attachment)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $attachment->file_name }}</td>
                                                                    <td>{{ $attachment->Created_by }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /div -->
                </div>
                <!-- row closed -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->
    @endsection
    @section('js')
        <!-- Internal Data tables -->
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
        <!--Internal  Datatable js -->
        <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    @endsection
