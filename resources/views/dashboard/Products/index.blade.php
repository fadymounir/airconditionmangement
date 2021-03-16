@extends("dashboard.layouts.master")
@section("title","hello mypage")
@section("link-css")
@endsection

@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">المنتجات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('adminpanel.home.index')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">المنتجات</li>
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
                    <span>  المنتجات</span>
                    <span class="float-right  btn btn-primary" onclick="refreshTable();">   Refresh Table <i
                            class="fa fa-spinner"></i>
                    </span>

                    @component('dashboard.layouts.components.spanTag')
                        @slot('onclick') showModal('add');  @endslot
                        @slot('name') اضافة منتجات <i class="fas fa-plus"></i> @endslot
                        @slot('class') btn btn-success float-right mr-1 @endslot
                    @endcomponent


                    @include('dashboard.Products.addEdit')


                </div>

                <div class="card-body">


                    <table id="products-table" class="table table-responsive  table-striped table-bordered">
                        <thead>
                        <tr>
                            <th><p id="selectAll"><i class="fa fa-eye"></i></p></th>
                            <th>الاسم </th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>تعديل</th>
                            <th>مسح</th>
                            <th>اضافة الكمية</th>
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
    @include('dashboard.Products.scripts')
@endsection


