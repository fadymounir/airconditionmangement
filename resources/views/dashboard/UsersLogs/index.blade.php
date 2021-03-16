@extends("dashboard.layouts.master")
@section("title","السجلات")


@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">السجلات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("adminpanel.home.index")}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">السجلات</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




@section("content")
    @include('dashboard.UsersLogs.filter')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>  السجلات</span>
                    <span class="float-right  btn btn-primary" onclick="refreshTable();">   Refresh Table <i
                            class="fa fa-spinner"></i>
                    </span>
                </div>

                <div class="card-body">


                    <table id="table" class="table table-responsive  table-striped table-bordered">
                        <thead>
                        <tr>
                            <th><p id="selectAll"><i class="fa fa-eye"></i></p></th>
                            <th>الفني</th>
                            <th>بداية السجل</th>
                            <th>نهاية السجل</th>
                            <th>عدد الطللبات</th>
                            <th>تكلفة الطلبات</th>
                            <th>عدد المشتريات</th>
                            <th>تكلفة المشتريات</th>
                            <th>عدد الاجهزة</th>
                            <th>عدد اجهزة المتجر</th>
                            <th>تكلفة اجهزة المتجر</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection



@section("scripts")
    @include('dashboard.UsersLogs.scripts')
@endsection


