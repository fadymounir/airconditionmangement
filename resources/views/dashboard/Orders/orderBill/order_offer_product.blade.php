@if(count($order->OfferProduct) !=0 )
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color:#0461a4; color:#fff; ">عروض اسعار المنتجات</div>
                    <div class="card-body">
                        <table class="table table-primary table-bordered text-center" dir="rtl">
                            <thead>
                            <tr>
                                <th>اسم المنتج</th>
                                <th>سعر الحبة</th>
                                <th>الكمية</th>
                                <th>التكلفة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->OfferProduct as $row)
                                <tr>
                                    <th>{{$row->Product->name}}</th>
                                    <th>{{$row->price}}</th>
                                    <th>{{$row->quantity}}</th>
                                    <th>{{$row->price*$row->quantity}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center" dir="rtl">
            @if($order->desciption !=null)
                {!! $order->desciption !!}
            @endif
        </div>


    </div>
@endif

