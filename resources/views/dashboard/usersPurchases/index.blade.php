@extends("dashboard.layouts.master")
@section("title","مشتريات الفنيين")

@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">مشتريات الفنيين</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("adminpanel.home.index")}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">مشتريات الفنيين</li>
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
                    <span>  مشتريات الفنيين</span>
                    <span class="float-right  btn btn-primary" onclick="refreshTable();">   Refresh Table <i
                            class="fa fa-spinner"></i>
                    </span>
                </div>

                <div class="card-body">


                    <table id="purchases-table" class="table  table-striped table-bordered">
                        <thead>
                        <tr>
                            <th><p id="selectAll"><i class="fa fa-eye"></i></p></th>
                            <th>اسم المشتريات</th>
                            <th>اسم الفني</th>
                            <th>الكمية</th>
                            <th>الاجمالي</th>
                            <th>الفاتورة المحلقة</th>
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
    @include('dashboard.Purchases.scripts')
@endsection

