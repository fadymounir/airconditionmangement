@component('dashboard.layouts.tools.modalNormal')
    @slot('id') addEditModal  @endslot
    @slot('modalBody')

        <input type="hidden" id="actionType">
        <input type="hidden" id="productId">

        @component('dashboard.layouts.components.inputTag')
            @slot('label','الاسم')
            @slot('icon','fas fa-shopping-cart')
            @slot('name','name')
        @endcomponent

        @component('dashboard.layouts.components.inputTag')
            @slot('label','السعر')
            @slot('icon','fas fa-money-bill')
            @slot('name','price')
        @endcomponent



    @endslot
@endcomponent



@push('custom-scripts')
    <script>
        function showModal(type, id = 'null') {
            if (type == "add") {
                $('#modalTitle').text('اضافة منتجات جديدة');
                $('#actionType').val('add');
                $('#name').val('');
                $('#price').val('');

            } else {

                let path = "{{route('adminpanel.products.getRecord')}}";
                let data = new FormData();
                data.append('id', id);
                ajaxRequest(path, data, function (response) {
                    $('#modalTitle').text('تعديل بيانات مشتريات');
                    $('#actionType').val('edit');
                    $('#productId').val(id);
                    $('#name').val(response.info.name);
                    $('#price').val(response.info.price);
                });
            }
            $('#addEditModal').modal('show');
        }


        $('#submit').click(function () {
            let path = "{{route('adminpanel.products.addedit')}}";
            let name = $('#name').val();
            let price = $('#price').val();
            let actionType = $('#actionType').val();
            let id = $('#productId').val();
            let data = new FormData();
            data.append('name', name);
            data.append('price',price);
            data.append('actionType', actionType);
            if (actionType == "edit")
                data.append('id', id);


            ajaxRequest(path, data, function (response) {

                if (response.status == 400) {
                    swal("خطاة!", "تاكد من ادخال كافة البيانات بالطريقة الصحيحى!", "warning");
                    $("input,select,textarea").removeClass("is-invalid");
                    for (let k in response.message)
                        $("input[name=" + k + "],select[name=" + k + "],textarea[name=" + k + "]").addClass("is-invalid");

                } else if (response.status == 200) {
                    swal("تم!", "تم عملية الخفظ بنجاح!", "success");
                    $("input,select,textarea").removeClass("is-invalid");
                    if(actionType == "add")
                    $('#price,#name').val('');
                    oTable.draw();
                }

            });


        });


    </script>
@endpush
