@if(count($Order->OfferProduct) == 0)
    <div class="text-center text-danger"> لا يوجد تفاصيل للطلب</div>
@else

    <div class="table">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>اسم المنتج</th>
                <th>الكمية</th>
                <th>سعر الوحدة</th>
                <th>####</th>
            </tr>
            </thead>

            <tbody>
            @foreach($Order->OfferProduct as $row)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <th>{{$row->Product->name}}</th>
                    <th>{{$row->quantity}}</th>
                    <th>{{$row->price}}</th>
                    <th>  <span class="btn btn-danger btn-block" onclick="deleteElement('order_offer_product',{{$row->id}})"> <i class="fas fa-trash"></i> </span> </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
