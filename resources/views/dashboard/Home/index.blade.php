@extends("dashboard.layouts.master")
@section("title","الرئيسية")


@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الرئيسية</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('adminpanel.home.index')}}">الرئيسية</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection



@section("content")

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">اعدادات الاحصائيات</div>
                <div class="card-body">
                    @component('dashboard.layouts.components.inputTag')
                        @slot('label',' من ')
                        @slot('icon','fas fa-calendar-times')
                        @slot('type','date')
                        @slot('name','dateFrom')
                    @endcomponent

                    @component('dashboard.layouts.components.inputTag')
                        @slot('label',' إلي ')
                        @slot('icon','fas fa-calendar-times')
                        @slot('type','date')
                        @slot('name','dateTo')
                    @endcomponent

                    @component('dashboard.layouts.components.spanTag')
                        @slot('class','btn btn-primary btn-block mt-4')
                        @slot('onclick') calStats('getData') @endslot
                        @slot('name') <i class="fas fa-search"></i>   ابحث @endslot
                    @endcomponent

                    @component('dashboard.layouts.components.spanTag')
                        @slot('class','btn btn-danger btn-block mt-4')
                        @slot('onclick') calStats('normal') @endslot
                        @slot('name') <i class="fas fa-times-circle"></i> الغاء البحث @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">التقارير اليومية</div>
                <div class="card-body">

                    @component('dashboard.layouts.components.inputTag')
                        @slot('label','استخراج تقرير  بتاريخ')
                        @slot('icon','fas fa-calendar-times')
                        @slot('type','date')
                        @slot('name','dateReport')
                        @slot('value') {{date('Y-m-d')}} @endslot
                    @endcomponent
                    <div class="row">
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.spanTag')
                                @slot('class','btn btn-success btn-block mt-4')
                                @slot('name','طباعة تقرير')
                                @slot('onclick') getReport() @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.spanTag')
                                @slot('class','btn btn-primary btn-block mt-4')
                                @slot('name','طباعة سجل')
                                @slot('onclick') getLogs() @endslot
                            @endcomponent
                        </div>
                    </div>

                    @component('dashboard.layouts.components.selectTag')
                        @slot('label') المسئول @endslot
                        @slot('name','admin')
                        @slot('options')
                            @foreach(\App\User::where('type','admin')->get() as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        @endslot
                    @endcomponent

                    <div class="row">
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.aTag')
                                @slot('class','btn btn-success btn-block mt-4')
                                @slot('name') <i class="fa fa-phone"></i> ارسال تقرير @endslot
                                @slot('onclick','sendViaPhone()')
                            @endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.aTag')
                                @slot('class','btn btn-primary btn-block mt-4')
                                @slot('name') <i class="fa fa-phone"></i> ارسال سجل @endslot
                                @slot('onclick','sendViaPhone()')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="card  card-primary">
                <div class="card-header">الطلبات المفتوحة</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="Installation_open">0</h3>
                                    <p style="font-size:24px;">تركيبات</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-database"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="maintenance_open">0</h3>

                                    <p style="font-size:24px;">صيانة</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 id="pipes_extension_open">0</h3>
                                    <p style="font-size:24px;">تمديد </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-code-branch"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card  card-danger">
                <div class="card-header">الطلبات المغلقة</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="Installation_close">0</h3>
                                    <p style="font-size:24px;">تركيبات</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-database"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="maintenance_close">0</h3>

                                    <p style="font-size:24px;">صيانة</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 id="pipes_extension_close">0</h3>
                                    <p style="font-size:24px;">تمديد </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-code-branch"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="sales">0</h3>
                    <p style="font-size:24px;">اجمالي المبيعات</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill"></i>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="purchases">0</h3>
                    <p style="font-size:24px;">اجمالي المشتريات</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="warrenty">0</h3>
                    <p style="font-size:24px;"> طلبات الضمان</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cogs"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="orderElement">0</h3>
                    <p style="font-size:24px;"> القطع المحلقة </p>
                </div>
                <div class="icon">
                    <i class="fas fa-users-cog"></i>
                </div>
            </div>
        </div>


    </div>




@endsection

@section("scripts")
    <script>
        function calStats(type) {
            let path = "{{route('adminpanel.home.fetchingStats')}}";
            let formData = new FormData();

            if (type != "normal") {
                let dateFrom = $('#dateFrom').val();
                let dateTo = $('#dateTo').val();
                formData.append('dateFrom', dateFrom);
                formData.append('dateTo', dateTo);
            } else {
                $('#dateFrom,#dateTo').val('');
            }


            ajaxRequest(path, formData, function (response) {

                if (response.status == 400)
                    swal({
                        title: "خطاة!",
                        text: "برجاء ادخال الوقت بالطريقة الصحيحة ..... ادخل الفترة ألي اكبر من الفترة من!",
                        icon: "warning",
                    });
                else {
                    $('#Installation_open').html(response.fetchingStats.installationOpen);
                    $('#maintenance_open').html(response.fetchingStats.maintenanceOpen);
                    $('#pipes_extension_open').html(response.fetchingStats.pipes_extensionOpen);
                    $('#Installation_close').html(response.fetchingStats.installationClosed);
                    $('#maintenance_close').html(response.fetchingStats.maintenanceClosed);
                    $('#pipes_extension_close').html(response.fetchingStats.pipes_extensionClosed);
                    $('#purchases').html(response.fetchingStats.purchases);
                    $('#sales').html(response.fetchingStats.sales);
                    $('#warrenty').html(response.fetchingStats.warrenty);
                    $('#orderElement').html(response.fetchingStats.orderElement);
                }

            });
        }


        calStats();


        function getReport() {
            let path = "/adminpanel/getReports/";
            let dateReport = $('#dateReport').val();
            window.open(path + dateReport);
        }


        function getLogs(){
            let path="/adminpanel/getLogs/";
            let dateReport = $('#dateReport').val();
            window.open(path + dateReport);
        }


        function sendViaPhone() {
            let path = window.location.origin + "/adminpanel/getReports/";
            let dateReport = $('#dateReport').val();
            let message = "لاستخراج التقرير اليومي الخاصة  برجاء الضغط علي الرابط التالي " + path + dateReport;
            let phone = $('#admin').val();
            let link = "https://api.whatsapp.com/send?phone=+966" + phone + "&text=" + message;
            window.open(link);
        }


    </script>


@endsection






