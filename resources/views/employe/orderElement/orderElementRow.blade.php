<div class="row" id="orderElement_row_{{$id}}">
    <div class="col-md-6">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') orderElement_purchases_id_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") اسم القطعة @else Element Name @endif @endslot
            @slot('icon','fas fa-cogs')
            @slot('options')
                @foreach(\App\Models\Purchase::allActive() as $row)
                        <option value="{{$row->id}}"> @if(Auth::user()->type == "admin") {{$row->name_ar}} @else {{$row->name_en}} @endif </option>
                @endforeach
            @endslot
        @endcomponent
    </div>



    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name') orderElement_quantity_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") الكمية @else Quantity @endif @endslot
            @slot('value',0)
            @slot('icon','fas fa-plus')
            @slot('type','number')
        @endcomponent
    </div>


    @if(Auth::user()->type !="admin")
        <div class="col-md-12">
        <span class="btn btn-danger btn-block" onclick="deleteElement('orderElement_',{{$id}})">Delete THis Element <i
                class="fas fa-trash"></i></span>
        </div>
    @endif
</div>



