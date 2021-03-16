@extends("dashboard.layouts.master")
@section("title","جدول المواعيد")
@section("link-css")


    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css"/>
@endsection

@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">جدول المواعيد</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("adminpanel.home.index")}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول المواعيد</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




@section("content")
    @include('dashboard.Orders.orderDescriptionModal')
    <div class="row">
        <div class="col-md-12">
            {!! $calendar->calendar() !!}
        </div>
    </div>
@endsection



@section("scripts")
    {!! $calendar->script() !!}
    <script>
        $(document).ready(function () {
            $('a').click(function () {
                let orderId = $(this).attr('href').substring(1);
                console.log(orderId);
                orderDescriptionModal("orderInfo",orderId);
            });
        })
    </script>
@endsection


