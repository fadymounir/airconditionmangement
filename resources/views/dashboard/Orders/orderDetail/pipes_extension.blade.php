@if(count($Order->PipesExtension) == 0)
    <div class="text-center text-danger">@if(Auth::user()->type == "admin") لا يوجد تفاصيل للطلب @else no Order
        Detail  @endif</div>
@else


    <div class="table">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>@if(Auth::user()->type == "admin") نوع الخدمة@else 	Service Type @endif</th>
                <th>@if(Auth::user()->type == "admin")عدد الغرف@else Number Rooms @endif</th>
                <th>@if(Auth::user()->type == "admin")عدد الامتار@else Number Meters @endif</th>
                <th>@if(Auth::user()->type == "admin")عدد المكيفات@else Number Conditioer @endif</th>
                <th>@if(Auth::user()->type == "admin")سعر المتر@else Meter Price @endif</th>
                <th>@if(Auth::user()->type == "admin")التكلفة@else Coast @endif</th>
                <th>@if(Auth::user()->type == "admin")طريقة الدفع@else Payment Type @endif</th>
                <th>####</th>
            </tr>
            </thead>

            <tbody>
            @foreach($Order->PipesExtension as $row)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <th>{{$row->service_type_attr()}}</th>
                    <th>{{$row->room_number}}</th>
                    <th>{{$row->meters_number}}</th>
                    <th>{{$row->conditioners_number}}</th>
                    <th>{{$row->meter_price}}</th>
                    <th>{{$row->total}}</th>
                    <th>{{$row->payment_type_attr()}}</th>
                    <th><span class="btn btn-danger btn-block"
                              onclick="deleteElement('PipesExtension',{{$row->id}})"> <i
                                class="fas fa-trash"></i> </span></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endif
