<table class="table table-primary table-bordered text-center" dir="rtl">
    <thead>
    <tr>
        <th>#</th>
        <th>رقم الطلب</th>
        <th>العميل</th>
        <th>الفني</th>
        <th>الخدمة</th>
        <th>الكمية</th>
        <th>سعر الخدمة</th>
        <th>قيمة الفاتورة</th>
        <th>طريقة الدفع</th>
    </tr>
    </thead>

    <tbody>

    @foreach($orders as $row)
        @foreach($row->Maintenance as $maintenanceRow)
            <tr>
                <th>{{$loop->index+1}}</th>
                <th>{{$row->orderName()}}</th>
                <th>{{$row->name}}</th>
                <th>{{$row->User->name}}</th>
                <th>{{$maintenanceRow->Maintenance->name_ar}}</th>
                <th>{{$maintenanceRow->quantity}}</th>
                <th>{{$maintenanceRow->service_pirce}}</th>
                <th>{{$maintenanceRow->total}}</th>
                <th>{{$maintenanceRow->payment_type_attr()}}</th>
                <?php $total_maintaince += $maintenanceRow->total;?>
            </tr>
        @endforeach
    @endforeach
    <tr>
        <th colspan="5">القيمة الاجمالية لخدمات الصيانة</th>
        <th colspan="4">{{$total_maintaince}}</th>
    </tr>

    </tbody>


</table>
