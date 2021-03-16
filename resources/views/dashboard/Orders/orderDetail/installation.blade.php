@if(count($Order->Installation) == 0)
    <div class="text-center text-danger">@if(Auth::user()->type == "admin") لا يوجد تفاصيل للطلب @else no Order
        Detail  @endif</div>
@else

    <div class="table">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th> @if(Auth::user()->type == "admin")  نوع الخدمة @else service Type @endif  </th>
                <th>  @if(Auth::user()->type == "admin")نوع المكيف @else Conditioer Type @endif</th>
                <th> @if(Auth::user()->type == "admin") الكمية @else Quantity @endif</th>
                <th> @if(Auth::user()->type == "admin")عدد المواسير @else Pipes number @endif</th>
                <th> @if(Auth::user()->type == "admin") عدد الكراسي @else Chairs Number @endif</th>
                <th> @if(Auth::user()->type == "admin") التكلفة @else Coast @endif</th>
                <th> @if(Auth::user()->type == "admin") طريقة الدفع @else Payment Type @endif</th>
                <th> ##### </th>
            </tr>
            </thead>

            <tbody>
            @foreach($Order->Installation as $row)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <th>{{$row->service_type_attr()}}</th>
                    <th>{{$row->conditioner_type_attr()}}</th>
                    <th>{{$row->quantity}}</th>
                    <th>{{$row->pipes_meters}}</th>
                    <th>{{$row->chairs_number}}</th>
                    <th>{{$row->total}}</th>
                    <th>{{$row->payment_type_attr()}}</th>
                    <th>  <span class="btn btn-danger btn-block" onclick="deleteElement('Installation',{{$row->id}})"> <i class="fas fa-trash"></i> </span> </th>
                </tr>
                @if($row->product_id !=null)
                <tr>
                    <th colspan="2"> @if(Auth::user()->type == "admin") المنتج @else product @endif </th>
                    <th colspan="4"> {{$row->Product->name}} </th>
                    <th colspan="2"> @if(Auth::user()->type == "admin") سعر الحبة @else price  @endif </th>
                    <th colspan="1">{{$row->product_price}}</th>
                </tr>
                @endif



            @endforeach
            </tbody>
        </table>
    </div>
@endif
