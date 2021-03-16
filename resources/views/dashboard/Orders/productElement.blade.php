<div id="row_product_{{$id}}">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard.layouts.components.selectTag')
                @slot('label')المنتج @endslot
                @slot('icon','fas fa-shopping-cart')
                @slot('selectBody') onchange="changeSelect('product_id_{{$id}}',{{$id}});" @endslot
                @slot('name') product_id_{{$id}} @endslot
                @slot('options')
                    @foreach(\App\Models\Product::allActive() as $row)
                        @if($loop->index == 0)
                            <?php $val = $row->price ?>
                        @endif
                        <option data-price="{{$row->price}}" value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                @endslot
            @endcomponent
        </div>

        <div class="col-md-6">
            @component('dashboard.layouts.components.inputTag')
                @slot('label','السعر')
                @slot('name') price_{{$id}} @endslot
                @slot('icon') fas fa-money-bill @endslot
                @slot('value') {{$val}} @endslot
                @slot('class','calTotal')
                @slot('type','number')
                @slot('inputBody')  @endslot
                @slot('inputBody') onkeyup="calTotal()" data-id="{{$id}}"  @endslot
            @endcomponent
        </div>

        <div class="col-md-6">
            @component('dashboard.layouts.components.inputTag')
                @slot('label','الكمية')
                @slot('name') quantity_{{$id}} @endslot
                @slot('icon') fas fa-money-bill @endslot
                @slot('value',1)
                @slot('type','number')
                @slot('inputBody') onkeyup="calTotal()"  @endslot
            @endcomponent
        </div>


        <div class="col-md-12">
            <span class="btn btn-danger btn-block" onclick="deleteSelectedRow({{$id}})">  حذف هذة العنصر  <i
                    class="fas fa-trash"></i> </span>
        </div>
    </div>


</div>
