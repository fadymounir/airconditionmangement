<ul class="list-group">
    <li class="list-group-item">
        <span class="text-bold mr-2">@if(Auth::user()->type == "admin") التكلفة : @else total  @endif</span>
        <span>{{$order->total_invoice}}</span>
    </li>
    <li class="list-group-item">
        <span class="text-bold mr-2">@if(Auth::user()->type =="admin") الضريبة : @else Tax: @endif</span>
        <span>{{$order->tax}}</span>
    </li>
    <li class="list-group-item">
        <span class="text-bold mr-2">@if(Auth::user()->type == "admin") اجمالي التكلفة : @else  total invoice: @endif</span>
        <span>{{$order->tax+$order->total_invoice}}</span>
    </li>
    <li class="list-group-item">
        <span class="text-bold mr-2">@if(Auth::user()->type == "admin") عدد العناصر : @else Number Of element @endif</span>
        <span>{{$order->quantity}}</span>
    </li>
    @if(Auth::user()->type == "admin")
    <li class="list-group-item">
        <span class="text-bold mr-2">رقم هاتف الفني :</span>
        <span> @component('dashboard.layouts.components.aTag')
                    @slot('link') tel:{{$order->User->phone}} @endslot
                    @slot('name') {{$order->User->phone}} @endslot
                @endcomponent
        </span>
    </li>
    @endif

    <li class="list-group-item">
        <span class="text-bold mr-2">@if(Auth::user()->type == "admin") عدد مرات فتح الطلب :@else Nnumber Of Order Open @endif</span>
        <span>{{$order->reopenWarrenty->count()}}</span>
    </li>
    <li class="list-group-item">
        <span class="text-bold mr-2">@if(Auth::user()->type == "admin") تاريخ انشاء الطلب : @else Order Created At @endif</span>
        <span>{{$order->created_at}}</span>
    </li>

    <li class="list-group-item">
        <span class="text-bold mr-2">@if(Auth::user()->type == "admin") تاريخ تنفيذ الطلب : @else Order date Action @endif</span>
        <span>{{$order->date_action}}</span>
    </li>


</ul>
