<table class="table table-primary table-bordered text-center" dir="rtl">
    <thead>
    <tr>
        <th>#</th>
        <th>نوع الخدمة</th>
        <th>الخدمة</th>
        <th>الكمية</th>
        <th>قيمة الفاتورة</th>
        <th>طريقة الدفع</th>
    </tr>
    </thead>

    <tbody>
    <?php  ?>
    @foreach($orders as $row)
            <?php $rowCount=1 ?>
            <tr>
                <th colspan="8"> الطلب رقم : {{$row->orderName()}}   || اسم الفني : {{$row->User->name}} || العميل : {{$row->name}} </th>
            </tr>

        @foreach($row->Installation as $installationRow)
            <tr>
                <th>{{$rowCount++}}</th>
                <th>تركيب</th>


                <th>{{$installationRow->service_type_attr()}}</th>
                <th>{{$installationRow->quantity}}</th>
                <th>{{$installationRow->total}}</th>
                <th>{{$installationRow->payment_type_attr()}}</th>
                <?php $total_installation += $installationRow->total;?>

            </tr>
            @if($installationRow->product_id !=null)
                <tr>
                    <th colspan="1"> المنتج</th>
                    <th colspan="2"> {{$installationRow->Product->name}} </th>
                    <th colspan="1"> سعر الحبة</th>
                    <th colspan="2">{{$installationRow->product_price}}</th>
                </tr>
            @endif
        @endforeach

        @foreach($row->Maintenance as $maintenanceRow)
            <tr>
                <th>{{$rowCount++}}</th>
                <th>صيانة</th>
                <th>{{$maintenanceRow->Maintenance->name_ar}}</th>
                <th>{{$maintenanceRow->quantity}}</th>
                <th>{{$maintenanceRow->total}}</th>
                <th>{{$maintenanceRow->payment_type_attr()}}</th>

            </tr>
        @endforeach


        @foreach($row->PipesExtension as $PipesExtension)
            <tr>
                <th>{{$rowCount++}}</th>
                <th>تمديد مواسير</th>
                <th>{{$PipesExtension->service_type_attr()}}</th>
                <th>{{$PipesExtension->conditioners_number}}</th>
                <th>{{$PipesExtension->total}}</th>
                <th>{{$PipesExtension->payment_type_attr()}}</th>

            </tr>
        @endforeach


        <tr>
            <th colspan="4">القيمة الاجمالية للطلب رقم : {{$row->orderName()}}</th>
            <th colspan="4">{{$row->total_invoice}}</th>
        </tr>

        <tr>
            <th colspan="8" class="text-center">################################</th>
        </tr>



    @endforeach


    </tbody>


</table>
