@component('dashboard.layouts.tools.modalNormal')
    @slot('id') addEditModalPurchases  @endslot
    @slot('modalTitle') Add New Purchases @endslot
    @slot('closebtnContent') Close @endslot
    @slot('submitBtnId') addNewPurchasesSubmit @endslot
    @slot('submitContent') Save @endslot
    @slot('modalBody')

        <form class="form" action="#" method="POST"
              enctype="multipart/form-data">
        @component('dashboard.layouts.components.selectTag')
            @slot('label','purchases')
            @slot('icon','fas fa-shopping-cart')
            @slot('name','purchases_id')
            @slot('options')
                @foreach(\App\Models\Purchase::allActive() as $row)
                    <option value="{{$row->id}}">{{$row->name_en}}</option>
                @endforeach
            @endslot
        @endcomponent

        @component('dashboard.layouts.components.inputTag')
            @slot('label','quantity')
            @slot('icon','fas fa-info')
            @slot('name','quantity')
            @slot('type','number')
            @slot('value',0)
        @endcomponent

        @component('dashboard.layouts.components.inputTag')
            @slot('label','total')
            @slot('icon','fas fa-info')
            @slot('name','total')
            @slot('type','number')
            @slot('value',0)
        @endcomponent


        @component('dashboard.layouts.components.inputTag')
            @slot('label','bill')
            @slot('icon','fas fa-image')
            @slot('name','bill')
            @slot('type','file')
        @endcomponent
        </form>

    @endslot
@endcomponent



@push('custom-scripts')
    <script>
        function addnewpurchases() {
            $('#addEditModalPurchases').modal('show');
        }

        $('#addNewPurchasesSubmit').click(function () {
            let form = $('.form');
            let path = "{{route('employe.Purchases.addNewPurchases')}}";
            let data = new FormData(form[0]);
            ajaxRequest(path, data, function (response) {
                if (response.status == 200) {
                    swal("Create New Purchases", "you Have Add New Purchases ", "success");
                    $('.form input').val('');
                    oTable.draw();
                } else if (response.status == 400) {
                    swal("opps!", 'Please Add All inputs in Details', "warning");
                    $("input,select,textarea").removeClass("is-invalid");
                    for (let k in response.message)
                        $("input[name=" + k + "],select[name=" + k + "],textarea[name=" + k + "]").addClass("is-invalid");
                }
            });

        })


    </script>
@endpush
