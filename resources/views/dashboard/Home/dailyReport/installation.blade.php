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
    <?php  ?>
    @foreach($orders as $row)
        @foreach($row->Installation as $installationRow)
            <tr>
                <th>{{$loop->index+1}}</th>
                <th>{{$row->orderName()}}</th>
                <th>{{$row->name}}</th>
                <th>{{$row->User->name}}</th>
                <th>{{$installationRow->service_type_attr()}}</th>
                <th>{{$installationRow->quantity}}</th>
                <th>{{$installationRow->total}}</th>
                <th>{{$installationRow->payment_type_attr()}}</th>
                <?php $total_installation += $installationRow->total;?>

            </tr>
            @if($installationRow->product_id !=null)
                <tr>
                    <th colspan="2"> المنتج</th>
                    <th colspan="3"> {{$installationRow->Product->name}} </th>
                    <th colspan="1"> سعر الحبة</th>
                    <th colspan="2">{{$installationRow->product_price}}</th>
                </tr>
            @endif
        @endforeach
    @endforeach
    <tr>
        <th colspan="4">القيمة الاجمالية لخدمات التركيب</th>
        <th colspan="4">{{$total_installation}}</th>
    </tr>

    </tbody>


</table>
