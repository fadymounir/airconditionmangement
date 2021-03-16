<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
          integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>{{$order->id}}</title>
</head>


<body>

<!-- start the header -->
<div class="row">
    <img src="{{Request::root()}}/bill/header.png" width="100%">
</div>
<!-- end the header -->


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color:#0461a4; color:#fff; ">بيانات العميل</div>
                <div class="card-body">
                    <table class="table table-primary table-bordered text-center">
                        <tr>
                            <th>{{$order->orderName()}}</th>
                            <th><i class="fas fa-info-circle"></i> : رقم الطلب</th>
                        </tr>
                        <tr>
                            <th>{{$order->orderType()}}</th>
                            <th><i class="fas fa-cogs"></i> :نوع الخدمة</th>
                        </tr>
                        <tr>
                            <th>{{$order->name}}</th>
                            <th><i class="fas fa-user"></i> :الاسم</th>

                        </tr>
                        <tr>
                            <th>{{$order->phone}}</th>
                            <th><i class="fas fa-phone"></i> :رقم الجوال</th>
                        </tr>
                        <tr>
                            <th>{{$order->address}}</th>
                            <th><i class="fas fa-location-arrow"></i> :العنوان</th>
                        </tr>

                        <tr>
                            <th>{{$order->total_invoice}}</th>
                            <th><i class="fas fa-money-bill-alt"></i> : التكلفة</th>
                        </tr>


                        <tr>
                            <th>{{$order->total_invoice+$order->tax}}</th>
                            <th><i class="fas fa-credit-card"></i> :اجمالي التكلفة</th>
                        </tr>


                        <tr>
                            <th>{{$order->quantity}}</th>
                            <th><i class="fas fa-credit-card"></i> :الكمية</th>
                        </tr>



                        @if($order->user_id !=null)
                            <tr>
                                <th>{{$order->User->name}}</th>
                                <th><i class="fas fa-users-cog"></i> :اسم الفني</th>
                            </tr>



                        @endif

                        <tr>
                            <th>{{$order->date_action}}</th>
                            <th><i class="fas fa-calendar-times"></i> تاريخ انشاء الطلب</th>
                        </tr>

                        @if($order->user_id !=null)
                            <tr>
                                <th>{{$order->closed_at}}</th>
                                <th><i class="fas fa-users-cog"></i><i class="fas fa-calendar-times"></i> تاريخ أنهاء
                                    الطلب
                                </th>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@include('dashboard.Orders.orderBill.installation')
@include('dashboard.Orders.orderBill.maintenance')
@include('dashboard.Orders.orderBill.pipes_extension')
@include('dashboard.Orders.orderBill.order_offer_product')












<!-- end the title -->


<!-- start the footer -->
<div class="row">
    <div class="fixed-bottom">
        <img src="{{Request::root()}}/bill/footer.png" width="100%">
    </div>
</div>


<!-- end the footer -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script type="text/javascript"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
        window.print();
    });
</script>

</body>


</html>
