@if(count($Order->OrderElement) == 0)
    <div class="text-center text-danger">@if(Auth::user()->type == "admin") لا يوجد تفاصيل للطلب @else no Order
        Detail  @endif</div>
@else

    <div class="table">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الكمية</th>
                <th>####</th>
            </tr>
            </thead>

            <tbody>
            @foreach($Order->OrderElement as $row)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <th>{{$row->Purchase->name_ar}}</th>
                    <th>{{$row->quantity}}</th>
                    <th>  <span class="btn btn-danger" onclick="deleteElement('orderElement',{{$row->id}})"> <i class="fas fa-trash"></i> </span> </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
