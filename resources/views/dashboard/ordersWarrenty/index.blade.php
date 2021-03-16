@extends("dashboard.layouts.master")
@section("title","اعادة فتح الطلبات")
@section("link-css")
@endsection

@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اعادة فتح الطلبات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('adminpanel.home.index')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">اعادة فتح الطلبات</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>  اعادة فتح الطلبات</span>
                    <span class="float-right  btn btn-primary" onclick="refreshTable();">   Refresh Table <i
                            class="fa fa-spinner"></i>
                    </span>
                </div>

                <div class="card-body">


                    <table id="purchases-table" class="table  table-striped table-bordered">
                        <thead>
                        <tr>
                            <th><p id="selectAll"><i class="fa fa-eye"></i></p></th>
                            <th>رقم الطلب</th>
                            <th>الوصف</th>
                            <th>تاريخ الانشاء</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>


@endsection



@section("scripts")
    @include('dashboard.ordersWarrenty.scripts')
@endsection


