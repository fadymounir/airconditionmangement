<div class="row" id="pipes_row_{{$id}}">
    <div class="col-md-6">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') pipes_service_type_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") نوع الخدمة @else Service Type @endif @endslot
            @slot('icon','fas fa-cogs')
            @slot('options')
                <option value="bidding"> @if(Auth::user()->type == "admin")   تسعيرة @else Bidding @endif</option>
                <option value="actual_extension">@if(Auth::user()->type == "admin") تمديد فعلي @else Actual
                    Extension @endif</option>
            @endslot
            @if(isset($orderInfo)) @slot('selected') {{$orderInfo->service_type}} @endslot @endif
        @endcomponent
    </div>


    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name') pipes_room_number_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") عدد الغرف @else Room Number @endif @endslot
            @slot('value',0)
            @slot('icon','fas fa-plus')
            @slot('type','number')
                @if(isset($orderInfo)) @slot('value') {{$orderInfo->room_number}} @endslot @endif
        @endcomponent
    </div>

    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name') pipes_meters_number_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") عدد الامتار @else Meters Number @endif @endslot
            @slot('icon','fas fa-plus')
                @slot('value',0)
            @slot('type','number')
                @if(isset($orderInfo)) @slot('value') {{$orderInfo->meters_number}} @endslot @endif
        @endcomponent
    </div>


    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name')  pipes_conditioners_number_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") عدد المكيفات @else conditioners Number @endif @endslot
            @slot('icon','fas fa-money-bill')
            @slot('type','number')
                @slot('value',0)

                @if(isset($orderInfo)) @slot('value') {{$orderInfo->conditioners_number}} @endslot @endif
        @endcomponent
    </div>

    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name')  pipes_meter_price_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") سعر المتر  @else Meter Price @endif @endslot
            @slot('icon','fas fa-money-bill')
            @slot('type','number')
            @slot('value',0)
                @if(isset($orderInfo)) @slot('value') {{$orderInfo->meter_price}} @endslot @endif
        @endcomponent
    </div>

    <div class="col-md-6">
        @component('dashboard.layouts.components.inputTag')
            @slot('name')  pipes_total_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") التكلفة @else Coast @endif @endslot
            @slot('icon','fas fa-money-bill')
            @slot('type','number')
            @slot('value',0)
            @slot('class','pipes')
            @if(Auth::user()->type !="admin")     @slot('inputBody') onkeyup="calTotal();" @endslot @endif
                @if(isset($orderInfo)) @slot('value') {{$orderInfo->total}} @endslot @endif
        @endcomponent
    </div>


    <div class="col-md-12">
        @component('dashboard.layouts.components.selectTag')
            @slot('name') pipes_payment_type_{{$id}} @endslot
            @slot('label') @if(Auth::user()->type == "admin") طريقة الدفع @else Payment Type @endif @endslot
            @slot('icon','fas fa-question')
            @slot('options')
                <option value="cash">Cash</option>
                <option value="bank">bank</option>
                <option value="later">later</option>
            @endslot
                @if(isset($orderInfo)) @slot('selected') {{$orderInfo->payment_type}} @endslot @endif
        @endcomponent
    </div>
    @if(Auth::user()->type !="admin")
        <div class="col-md-12">
        <span class="btn btn-danger btn-block" onclick="deleteElement('pipes_',{{$id}})">Delete THis Element <i
                class="fas fa-trash"></i></span>
        </div>
    @endif
</div>



