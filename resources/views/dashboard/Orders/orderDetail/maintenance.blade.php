@if(count($Order->Maintenance) == 0)
    <div class="text-center text-danger">@if(Auth::user()->type == "admin") لا يوجد تفاصيل للطلب @else no Order
        Detail  @endif</div>
@else
<div class="table">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>@if(Auth::user()->type == "admin")نوع المكيف  @else Conditioer Type @endif</th>
            <th>@if(Auth::user()->type == "admin")نوع الخدمة @else Service Type @endif</th>
            <th>@if(Auth::user()->type == "admin") سعر الخدمة@else Service Price @endif</th>
            <th>@if(Auth::user()->type == "admin")الكمية@else Quantity @endif</th>
            <th>@if(Auth::user()->type == "admin")التكلفة@else Coast @endif</th>
            <th>@if(Auth::user()->type == "admin")طريقة الدفع @else Payment Type @endif</th>
            <th>#####</th>
        </tr>
        </thead>

        <tbody>
        @foreach($Order->Maintenance as $row)
            <tr>
                <th>{{$loop->index+1}}</th>
                <th>{{$row->conditioner_type_attr()}}</th>
                <th>@if(Auth::user()->type =="admin") {{$row->Maintenance->name_ar}} @else {{$row->Maintenance->name_en}} @endif </th>
                <th>{{$row->service_pirce}}</th>
                <th>{{$row->quantity}}</th>
                <th>{{$row->total}}</th>
                <th>{{$row->payment_type_attr()}}</th>
                <th>  <span class="btn btn-danger btn-block" onclick="deleteElement('Maintenance',{{$row->id}})"> <i class="fas fa-trash"></i> </span> </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
