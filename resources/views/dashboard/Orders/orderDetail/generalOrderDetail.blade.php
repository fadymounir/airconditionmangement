<h2 class="text-center">@if(Auth::user()->type =="admin") خدمات التركيبات @else Installation service @endif </h2>
@include('dashboard.Orders.orderDetail.installation',['Order'=>$Order])

<br>
<h2 class="text-center">@if(Auth::user()->type == "admin") خدمات الصيانة  @else Maintaince Serviice @endif</h2>
@include('dashboard.Orders.orderDetail.maintenance',['Order'=>$Order])

<br>

<h2 class="text-center"> @if(Auth::user()->type == "admin")  خدمات تمديد المواسير  @else Pipes Extension service @endif</h2>
@include('dashboard.Orders.orderDetail.pipes_extension',['Order'=>$Order])




<h2 class="text-center">@if(Auth::user()->type == "admin")القطع اللي تمت تركيبها @else Order Element Included @endif </h2>
@include('dashboard.Orders.orderDetail.orderPurchases',['Order'=>$Order])



