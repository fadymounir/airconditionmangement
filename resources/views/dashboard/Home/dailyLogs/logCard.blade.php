<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header  " style="color:#fff; background-color:#0260a3;  ">الفني : {{$row->User->name}}</div>
        <div class="card-body">

            <ul class="list-group text-center" dir="rtl">
                <li class="list-group-item">رقم السجل :<span class="ml-3">{{$row->id}}</span> </li>
                <li class="list-group-item">بداية السجل : <span class="ml-3">{{$row->created_at}}</span></li>
                <li class="list-group-item">نهاية السجل : <span class="ml-3">{{$row->is_closed}}</span></li>
                <li class="list-group-item">عدد الطلبات : <span class="ml-3">{{$row->complete_order}}</span></li>
                <li class="list-group-item">تكلفة الطلبات : <span class="ml-3">{{$row->total_complete_order}}</span></li>
                <li class="list-group-item"> عدد المشتريات :<span class="ml-3">{{$row->purchases_count}}</span></li>
                <li class="list-group-item">تكلفة المشتريات : <span class="ml-3">{{$row->purchases_total}}</span></li>
                <li class="list-group-item">عدد العناصر : <span class="ml-3">{{$row->product_count}}</span></li>
                <li class="list-group-item">عدد منتجات المتجر : <span class="ml-3">{{$row->product_store_count}}</span></li>
                <li class="list-group-item">تكلفة منتجات المتجر : <span class="ml-3">{{$row->product_total}}</span></li>
            </ul>
        </div>
    </div>
</div>
