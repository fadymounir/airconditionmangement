@extends("dashboard.layouts.master")
@section("title","تقيمات الطلبات")
@section("link-css")
@endsection

@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">تقيمات الطلبات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("adminpanel.home.index")}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">تقيمات الطلبات</li>
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
                    <span>  تقيمات الطلبات</span>
                    <span class="float-right  btn btn-primary" onclick="refreshTable();">   Refresh Table <i
                            class="fa fa-spinner"></i>
                    </span>

                </div>

                <div class="card-body">


                    <table id="reviews-table" class="table table-responsive  table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>خدمة العملاء</th>
                                <th>الفني</th>
                                <th>ملاحظات</th>
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
        @include('dashboard.Reviews.scripts')
@endsection


