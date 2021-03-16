@if(count($order->Installation) !=0)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color:#0461a4; color:#fff; ">التركيبات</div>
                    <div class="card-body">
                        <table class="table table-primary table-bordered text-center" dir="rtl">
                            <thead>
                            <tr>
                                <th>نوع الخدمة</th>
                                <th>نوع المكيف</th>
                                <th>الكمية</th>
                                <th>عدد الامتار</th>
                                <th>عدد الكراسي</th>
                                <th>التكلفة</th>
                                <th>طريقة الدفع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->Installation as $row)
                                <tr>
                                    <th>{{$row->service_type_attr()}}</th>
                                    <th>{{$row->conditioner_type_attr()}}</th>
                                    <th>{{$row->quantity}}</th>
                                    <th>{{$row->pipes_meters}}</th>
                                    <th>{{$row->chairs_number}}</th>
                                    <th>{{$row->total}}</th>
                                    <th>{{$row->payment_type_attr()}}</th>
                                @if($row->product_id !=null)
                                    <tr>
                                        <th colspan="1"> المنتج</th>
                                        <th colspan="3"> {{$row->Product->name}} </th>
                                        <th colspan="2"> سعر الحبة</th>
                                        <th colspan="1">{{$row->product_price}}</th>
                                    </tr>
                                @endif


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
