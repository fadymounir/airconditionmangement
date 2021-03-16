<table class="table table-primary table-bordered text-center" dir="rtl">
    <thead>
    <tr>
        <th>#</th>
        <th>رقم الطلب</th>
        <th>العميل</th>
        <th>الفني</th>
        <th>الخدمة</th>
        <th>الكمية</th>
        <th>قيمة الفاتورة</th>
        <th>طريقة الدفع</th>
    </tr>
    </thead>

    <tbody>

    @foreach($orders as $row)
        @foreach($row->PipesExtension as $PipesExtension)
            <tr>
                <th>{{$loop->index+1}}</th>
                <th>{{$row->orderName()}}</th>
                <th>{{$row->name}}</th>
                <th>{{$row->User->name}}</th>
                <th>{{$PipesExtension->service_type_attr()}}</th>
                <th>{{$PipesExtension->conditioners_number}}</th>
                <th>{{$PipesExtension->total}}</th>
                <th>{{$PipesExtension->payment_type_attr()}}</th>
                <?php $total_pipes += $PipesExtension->total;?>
            </tr>
        @endforeach
    @endforeach
    <tr>
        <th colspan="5">القيمة الاجمالية لخدمات تمديد المواسير</th>
        <th colspan="4">{{$total_pipes}}</th>
    </tr>

    </tbody>


</table>
