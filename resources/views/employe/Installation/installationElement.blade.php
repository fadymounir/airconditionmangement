<div class="row" id="installation_row_{{$id}}">
    <div class="col-md-6">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') installation_service_type_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") نوع الخدمة @else Service Type @endif @endslot
            @slot('icon','fas fa-cogs')
            @slot('options')
                <option value="new_installation"> @if(Auth::user()->type == "admin")  تركيب جديد@else  New
                    Installation @endif</option>
                <option value="old_installation">@if(Auth::user()->type == "admin") تركيب قديم @else Old
                    Installation @endif</option>
                <option value="reassemble_and_assemble">@if(Auth::user()->type == "admin") فك وتركيب   @else Reassemble
                    And Assemble @endif</option>
                <option value="reassemble"> @if(Auth::user()->type == "admin") فك فقط @else reassemble @endif</option>
            @endslot

        @if(isset($orderInfo))  @slot('selected') {{$orderInfo->service_type}} @endslot @endif

        @endcomponent
    </div>

    <div class="col-md-6">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') installation_conditioner_type_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") نوع المكيف @else Conditioner Type @endif @endslot
            @slot('icon','fas fa-fan')
            @slot('options')
                <option value="window"> @if(Auth::user()->type == "admin") شباك @else Window @endif</option>
                <option value="Split"> @if(Auth::user()->type == "admin") سبلت @else Split @endif</option>
                <option value="cupboard"> @if(Auth::user()->type == "admin") دولابي @else Cupboard @endif</option>
                <option value="cassette"> @if(Auth::user()->type == "admin") كاسيت @else Cassette @endif</option>
            @endslot
                @if(isset($orderInfo))  @slot('selected') {{$orderInfo->conditioner_type}} @endslot @endif
        @endcomponent
    </div>

    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name') installation_quantity_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") الكمية @else Quantity @endif @endslot
            @slot('value',0)
            @slot('icon','fas fa-plus')
            @slot('type','number')
                @if(isset($orderInfo))  @slot('value') {{$orderInfo->quantity}} @endslot @endif
        @endcomponent
    </div>

    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name') installation_pipes_meters_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") عدد الامتار @else pipes Meters @endif @endslot
            @slot('icon','fas fa-plus')
            @slot('value',0)
            @slot('type','number')
                @if(isset($orderInfo))  @slot('value') {{$orderInfo->pipes_meters}} @endslot @endif
        @endcomponent
    </div>



    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name') installation_chairs_number_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") عدد الكراسي @else  Chairs Number @endif @endslot
            @slot('icon','fas fa-plus')
            @slot('value',0)
            @slot('type','number')
            @if(isset($orderInfo))  @slot('value') {{$orderInfo->chairs_number}} @endslot @endif
        @endcomponent
    </div>

    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name')  installation_total_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") التكلفة @else  Coast @endif @endslot
            @slot('icon','fas fa-money-bill')
            @slot('type','number')
            @slot('value',0)
            @slot('class','installation')
            @if(Auth::user()->type !="admin")  @slot('inputBody') onkeyup="calTotal();" @endslot @endif
            @if(isset($orderInfo))  @slot('value') {{$orderInfo->total}} @endslot @endif
        @endcomponent
    </div>



    <div class="col-md-6">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') installation_product_id_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") المنتج @else  Product @endif @endslot
            @slot('icon','fas fa-shopping-cart')
            @slot('selectBody') onchange="changeInputProduct({{$id}})" @endslot
            @slot('options')
                <option value="null">....</option>
                @foreach(\App\Models\Product::allActive() as $row)
                    <option value="{{$row->id}}" data-price="{{$row->price}}"> {{$row->name}} </option>
                @endforeach
            @endslot
            @slot('selected') @if(isset($orderInfo) && $orderInfo->product_id !=null) {{$orderInfo->product_id}} @else null  @endif @endslot
            @endcomponent
    </div>


    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name') installation_product_price_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") سعر المنتج @else  Product price @endif @endslot
            @slot('icon','fas fa-credit-card')
            @slot('type','number')
            @slot('value') @if(isset($orderInfo) && $orderInfo->product_price !=null) {{$orderInfo->product_price}}    @endif @endslot

            @endcomponent
    </div>

    <div class="col-md-12">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') installation_payment_type_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") طريقة الدفع @else  Payment Type @endif @endslot
            @slot('icon','fas fa-question')
            @slot('options')
                <option value="cash">Cash</option>
                <option value="bank">bank</option>
                <option value="later">later</option>
            @endslot
            @if(isset($orderInfo))  @slot('selected') {{$orderInfo->payment_type}} @endslot @endif
        @endcomponent
    </div>




@if(Auth::user()->type !="admin")
        <div class="col-md-12">
        <span class="btn btn-danger btn-block" onclick="deleteElement('installation_',{{$id}})">Delete THis Element <i
                class="fas fa-trash"></i></span>
        </div>
    @endif
</div>



