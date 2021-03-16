@extends("dashboard.layouts.master")
@section("title","الطلبات")


@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الطلبات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('adminpanel.home.index')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">الطلبات</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




@section("content")



    @include('dashboard.Orders.OrderDetailModal')
    @include('dashboard.Orders.addEditOrderModal')
    @include('dashboard.Orders.orderDescriptionModal')
    @include('dashboard.Orders.addOrderDetail')
    @include('dashboard.Orders.showOrdersMaintenanceProblems')
    @include('dashboard.Orders.orderElement.filter')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>  الطلبات </span>
                    <span class="float-right  btn btn-primary" onclick="refreshTable();">   Refresh Table <i
                            class="fa fa-spinner"></i>
                    </span>


                    <span class="float-right  btn btn-success mr-1" onclick="createNewOrder();"> اضافة طلب جديد <i
                            class="fa fa-plus"></i>
                    </span>



                    <a href="{{route('adminpanel.orders.createProdictOffer')}}" target="_blank" class="float-right  btn btn-primary mr-1"> اضافة عروض اسعار <i
                            class="fa fa-plus"></i>  <i class="fas fa-box-open"></i>
                    </a>
                </div>

                <div class="card-body">

                    <table id="table" class="table table-responsive table-striped table-bordered">
                        <thead>
                        <tr>
                            <th><p id="selectAll"><i class="fa fa-eye"></i></p></th>
                            <th>رقم الطلب</th>
                            <th>تعديل البيانات</th>
                            <th>الاسم</th>
                            <th>رقم الهاتف</th>
                            <th>نوع الخدمة</th>
                            <th>الوصف</th>
                            <th>الحي … المنطقة</th>
                            <th>اضافة تفاصيل</th>
                            <th> مشكلات الطلب</th>
                            <th>تمت بواسطة</th>
                            <th>تفاصيل الطلب</th>
                            <th>الفاتورة</th>
                            <th>واتساب</th>
                            <th>اعادة فتح الطلب</th>
                            <th>تاريخ التنفيذ</th>
                            <th>تاريخ الانتهاء</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>



@endsection



@section("scripts")
    @include('dashboard.Orders.scripts')
@endsection


