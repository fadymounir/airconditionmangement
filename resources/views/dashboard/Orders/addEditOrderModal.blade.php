@component('dashboard.layouts.tools.modalNormal')
    @slot('id') addNewOrder @endslot
        @slot('modalTitleId','modalTitleAddEditOrder')
    @slot('submitBtnId','addEitOrderSubmit')
    @slot('modalTitle') اضافة طلب جديد @endslot
    @slot('modalBody')
        <form class="form" action="#" method="POST"
              enctype="multipart/form-data">
            <input type="hidden" id="addEditOrderId" name="addEditOrderId">
            <input type="hidden" id="addEditOrderType" name="addEditOrderType">
            @component('dashboard.layouts.components.inputTag')
                @slot('name','name')
                @slot('label','اسم العميل')
                @slot('placeHolder','من فضلك ادخل اسم العميل')
            @endcomponent


            @component('dashboard.layouts.components.inputTag')
                @slot('name','phone')
                @slot('label','الجوال')
                @slot('icon','fas fa-phone')
                @slot('placeHolder','من فضلك ادخل رقم الجوال يفضل رقم الوتساب')
            @endcomponent


            @component('dashboard.layouts.components.inputTag')
                @slot('name','address')
                @slot('label','العنوان')
                @slot('icon','fas fa-location-arrow')
                @slot('placeHolder','من فضلك ادخل العنوان')
            @endcomponent


            @component('dashboard.layouts.components.selectTag')
                @slot('name','user_id')
                @slot('label','الفني المختص')
                @slot('icon','fas fa-cogs')
                @slot('options')
                    @foreach(\App\User::getUseActive() as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                @endslot
            @endcomponent


            @component('dashboard.layouts.components.textarea')
                @slot('name','desciption')
                @slot('label','وصف عام للطلب')
                @slot('icon','fas fa-notes-medical')
            @endcomponent


            @component('dashboard.layouts.components.selectTag')
                @slot('name','cityId')
                @slot('label','الحي')
                @slot('icon','fas fa-building')
                @slot('options')
                    @foreach(\App\Models\City::allActive() as $row)
                        <option value="{{$row->id}}">{{$row->name_ar}}</option>
                    @endforeach
                @endslot

            @endcomponent


            @component('dashboard.layouts.components.inputTag')
                @slot('name','date_action')
                @slot('label','تاريخ ووقت التنفيذ')
                @slot('icon','fas fa-user-cog')
                @slot('type','datetime-local')
            @endcomponent


            @component('dashboard.layouts.components.selectTag')
                @slot('name','problemsId[]')
                @slot('label','وصف المشكلات تفصليلا')
                @slot('icon','fas fa-info-circle')
                @slot('selectBody') multiple="multiple" @endslot
                @slot('options')
                    @foreach(\App\Models\MaintenanceProblem::allActive() as $row)
                        <option value="{{$row->id}}">{{$row->name_ar}}</option>
                    @endforeach
                @endslot
            @endcomponent


        </form>


    @endslot
@endcomponent

@push('custom-scripts')
    <script>


        function createNewOrder() {
            $('#addNewOrder').modal('show');
            $('#modalTitleAddEditOrder').text('اضافة طلب جديد');
            $('.form input,.form textarea').val('');
            $('#addEditOrderType').val("add");
        }

        $('#addEitOrderSubmit').click(function () {
            let form = $('.form');
            let path = "{{route('adminpanel.orders.createNewOrder')}}";
            let data = new FormData(form[0]);
            ajaxRequest(path, data, function (response) {
                if (response.status == 200) {
                    if($('#addEditOrderType').val() =="add")
                    swal("طلب جديد", "تم اضافة طلب جديد بنجاح", "success");
                    else      swal("تعديل بيانات الطلب", "تم التعديل بنجاح", "success");
                    $('.form input , .form textarea').val('');
                    oTable.draw();
                } else if (response.status == 400) {
                    swal("خطا!", 'برجاء ادخال كافة المعلومات بالطريقة الصحيحة', "warning");
                    $("input,select,textarea").removeClass("is-invalid");
                    for (let k in response.message)
                        $("input[name=" + k + "],select[name=" + k + "],textarea[name=" + k + "]").addClass("is-invalid");
                }
            });
        });



        function updateInfo(orderId){
            $('#addNewOrder').modal('show');
            $('#modalTitleAddEditOrder').text('تعديل بيانات الطلب');
            let path = "{{route('adminpanel.orders.getRecord')}}";
            let data = new FormData();
                data.append('orderId',orderId);
            ajaxRequest(path, data, function (response) {
                $('#addEditOrderId').val(orderId);
                $('#name').val(response.name);
                $('#phone').val(response.phone);
                $('#address').val(response.address);
                $('#user_id').val(response.user_id);
                $('#desciption').val(response.desciption);
                $('#cityId').val(response.city_id);
                $('#problemsId').hide(400);
                $('#addEditOrderType').val("edit");
            });

        }

    </script>
@endpush
