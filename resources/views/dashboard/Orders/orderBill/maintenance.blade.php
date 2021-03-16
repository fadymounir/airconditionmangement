@if(count($order->Maintenance) !=0)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color:#0461a4; color:#fff; ">الصيانة</div>
                    <div class="card-body">
                        <table class="table table-primary table-bordered text-center" dir="rtl">
                            <thead>
                            <tr>
                                <th>نوع المكيف</th>
                                <th>نوع الخدمة</th>
                                <th>سعر الخدمة</th>
                                <th>الكمية</th>
                                <th>التكلفة</th>
                                <th>طريقة الدفع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->Maintenance as $row)
                                <tr>
                                    <th>{{$row->conditioner_type_attr()}}</th>
                                    <th>{{$row->Maintenance->name_ar}}</th>
                                    <th>{{$row->service_pirce}}</th>
                                    <th>{{$row->service_pirce}}</th>
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

