<div class="row" id="maintaince_row_{{$id}}">
    <div class="col-md-6">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') maintaince_conditioner_type_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") نوع المكيف @else Conditioner Type @endif @endslot
            @slot('icon','fas fa-cogs')
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
        @component('dashboard.layouts.components.selectTag')
            @slot('name') maintaince_maintaince_id_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") نوع الخدمة @else Service  Type @endif @endslot
            @slot('icon','fas fa-toolbox')
            @slot('options')
                @foreach(\App\Models\Maintenance::allActive() as $row)
                    <option
                        value="{{$row->id}}">  @if(Auth::user()->type == "admin") {{$row->name_ar}} @else {{$row->name_en}} @endif </option>
                @endforeach
            @endslot
                @if(isset($orderInfo))  @slot('selected') {{$orderInfo->maintaince_id}} @endslot @endif
        @endcomponent
    </div>


    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name')  maintaince_service_pirce_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") سعر الخدمة @else Service Pirce  @endif @endslot
            @slot('icon','fas fa-money-bill')
            @slot('type','number')
            @slot('value',0)
            @slot('class','service_pirce')
            @slot('inputBody') onkeyup="calTotal();" @endslot
                @if(isset($orderInfo))  @slot('value') {{$orderInfo->service_pirce}} @endslot @endif

        @endcomponent
    </div>


    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name')  maintaince_quantity_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") الكمية @else Quantity  @endif @endslot
            @slot('icon','fas fa-plus')
            @slot('type','number')
            @slot('value',0)
            @slot('class','quantity')
            @slot('inputBody') onkeyup="calTotal();" @endslot
                @if(isset($orderInfo))  @slot('value') {{$orderInfo->quantity}} @endslot @endif

        @endcomponent
    </div>


    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name')  maintaince_total_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") التكلفة @else Coast @endif @endslot
            @slot('icon','fas fa-money-bill')
            @slot('type','number')
            @slot('value',0)
            @slot('class','total')
            @slot('inputBody') readonly @endslot
                @if(isset($orderInfo))  @slot('value') {{$orderInfo->total}} @endslot @endif

        @endcomponent
    </div>

    <div class="col-md-6">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') maintaince_payment_type_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") طريقة الدفع @else Payment Type @endif @endslot
            @slot('icon','fas fa-question')
            @slot('options')
                <option value="cash">Cash</option>
                <option value="bank">bank</option>
                <option value="later">later</option>
            @endslot
                @if(isset($orderInfo))  @slot('selected') {{$orderInfo->payment_type}} @endslot @endif
        @endcomponent
    </div>
    @if(Auth::user()->type != "admin")
        <div class="col-md-12">
        <span class="btn btn-danger btn-block" onclick="deleteElement('maintaince_',{{$id}})">Delete THis Element <i
                class="fas fa-trash"></i></span>
        </div>
    @endif
</div>



