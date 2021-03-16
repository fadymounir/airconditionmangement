@component('dashboard.layouts.tools.modalNormal')
    @slot('id') addEditModal  @endslot
    @slot('modalBody')

        <input type="hidden" id="actionType">
        <input type="hidden" id="cityId">

        @component('dashboard.layouts.components.inputTag')
            @slot('label','الاسم بالعربي')
            @slot('icon','fas fa-shopping-cart')
            @slot('name','name_ar')
        @endcomponent

        @component('dashboard.layouts.components.inputTag')
            @slot('label','الاسم بالانجليزي')
            @slot('icon','fas fa-shopping-cart')
            @slot('name','name_en')
        @endcomponent





    @endslot
@endcomponent



@push('custom-scripts')
    <script>
        function showModal(type, id = 'null') {
            if (type == "add") {
                $('#modalTitle').text('اضافة مناطق جديدة');
                $('#actionType').val('add');
                $('#name_ar').val('');
                $('#name_en').val('');

            } else {

                let path = "{{route('adminpanel.cities.getRecord')}}";
                let data = new FormData();
                data.append('id', id);
                ajaxRequest(path, data, function (response) {
                    $('#modalTitle').text('تعديل بيانات المنطقة');
                    $('#actionType').val('edit');
                    $('#cityId').val(id);
                    $('#name_ar').val(response.info.name_ar);
                    $('#name_en').val(response.info.name_en);
                });
            }
            $('#addEditModal').modal('show');
        }


        $('#submit').click(function () {
            let path = "{{route('adminpanel.cities.addEdit')}}";
            let name_ar = $('#name_ar').val();
            let name_en = $('#name_en').val();
            let actionType = $('#actionType').val();
            let id = $('#cityId').val();
            let data = new FormData();
            data.append('name_ar', name_ar);
            data.append('name_en', name_en);
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
                    oTable.draw();
                }

            });


        });


    </script>
@endpush
