<table class="table table-primary table-bordered text-center" dir="rtl">
    <thead>
    <tr>

        <th>عدد الطلبات</th>
        <th>المبيعات</th>
        <th>كاش</th>
        <th>اجل</th>
        <th>بنك</th>
        <th>المشتريات</th>
    </tr>
    </thead>

    <tbody>
        <tr>
            <?php  $cal=\App\Models\Order::calAttr($orders) ?>
            <th>{{$orders->count()}}</th>
            <th>{{$cal['all']}}</th>
            <th>{{$cal['cash']}}</th>
            <th>{{$cal['later']}}</th>
            <th>{{$cal['bank']}}</th>
            <th>{{$userPurchases->sum('total')}}</th>
        </tr>
    </tbody>


</table>
