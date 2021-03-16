<table class="table table-primary table-bordered text-center" dir="rtl">
    <thead>
    <tr>
        <th>#</th>
        <th>الفني</th>
        <th>المشتريات</th>
        <th>الكمية</th>
        <th>التكلفة</th>
    </tr>
    </thead>

    <tbody>
    <?php $userPurchases_total = 0 ?>

        @foreach($userPurchases as $row)
            <tr>
                <th>{{$loop->index+1}}</th>
                <th>{{$row->User->name}}</th>
                <th>{{$row->Purchases->name_ar}}</th>
                <th>{{$row->quantity}}</th>
                <th>{{$row->total}}</th>
                <?php $userPurchases_total += $row->total; ?>
            </tr>
        @endforeach
    <tr>
        <th colspan="4">القيمة الاجمالية للمشتريات</th>
        <th colspan="4">{{$userPurchases_total}}</th>
    </tr>

    </tbody>


</table>
