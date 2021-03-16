<div class="card mb-1">
    <div class="card-header" style="background-color:#3c3c87; color:white;">
        Agent Information <i class="fas fa-info-circle"></i>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="orderId"  value="{{$order->id}}">
                @component('dashboard.layouts.components.inputTag')
                    @slot('name','name')
                    @slot('label','ِAgent Name')
                    @slot('value') {{$order->name}} @endslot
                    @slot('placeHolder','Please Enter Agent Name')
                @endcomponent
            </div>
            <div class="col-md-6">
                @component('dashboard.layouts.components.inputTag')
                    @slot('name','phone')
                    @slot('label','ِPhone')
                    @slot('value') {{$order->phone}} @endslot
                    @slot('icon','fas fa-phone')
                    @slot('placeHolder','Please Enter Agent Phone number (prefer whatsapp App)')
                @endcomponent
            </div>
            <div class="col-md-6">
                @component('dashboard.layouts.components.inputTag')
                    @slot('name','total_invoice')
                    @slot('label','Total Invoice')

                    @slot('inputBody') readonly="true" @endslot
                    @slot('icon','fas fa-money-check')
                    @slot('value') {{$order->total_invoice}} @endslot
                @endcomponent
            </div>
            <div class="col-md-6">
                @component('dashboard.layouts.components.inputTag')
                    @slot('name','address')
                    @slot('label','address')
                    @slot('value') {{$order->address}} @endslot
                    @slot('icon','fas fa-location-arrow')
                    @slot('placeHolder','Please Enter Agent Address In Detail')
                @endcomponent
            </div>
            <div class="col-md-6">
                @component('dashboard.layouts.components.selectTag')
                    @slot('name','cityId')
                    @slot('label','Distict')
                    @slot('icon','fas fa-building')
                    @slot('options')
                        @foreach(\App\Models\City::allActive() as $row)
                            <option value="{{$row->id}}">{{$row->name_en}}</option>
                        @endforeach
                    @endslot

                    @slot('selected') {{$order->city_id}} @endslot

                @endcomponent
            </div>
            <div class="col-md-6">
                @component('dashboard.layouts.components.inputTag')
                    @slot('name','date_action')
                    @slot('label','Date && time Action')
                    @slot('icon','fas fa-user-cog')
                    @slot('type','datetime-local')
                    @slot('value') <?php echo  date("Y-m-d\TH:i:s", strtotime($order->date_action)) ?> @endslot
                @endcomponent
            </div>
            <div class="col-md-12">
                @component('dashboard.layouts.components.textarea')
                    @slot('name','desciption')
                    @slot('label','desciption')
                    @slot('icon','fas fa-info')
                    @slot('value')  {{$order->desciption}}@endslot
                @endcomponent
            </div>
        </div>
    </div>
</div>
