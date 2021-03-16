@if(count($order->PipesExtension) !=0 )
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color:#0461a4; color:#fff; ">تمديد المواسير</div>
                    <div class="card-body">
                        <table class="table table-primary table-bordered text-center" dir="rtl">
                            <thead>
                            <tr>
                                <th>نوع الخدمة</th>
                                <th>عدد الغرف</th>
                                <th>عدد الامتار</th>
                                <th>عدد المكيفات</th>
                                <th>سعر المتر</th>
                                <th>التكلفة</th>
                                <th>طريقة الدفع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->PipesExtension as $row)
                                <tr>
                                    <th>{{$row->service_type_attr()}}</th>
                                    <th>{{$row->room_number}}</th>
                                    <th>{{$row->meters_number}}</th>
                                    <th>{{$row->conditioners_number}}</th>
                                    <th>{{$row->meter_price}}</th>
                                    <th>{{$row->total}}</th>
                                    <th>{{$row->payment_type_attr()}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
