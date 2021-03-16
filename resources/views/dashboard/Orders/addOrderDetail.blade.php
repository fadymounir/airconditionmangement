@component('dashboard.layouts.tools.modalNormal')
    @slot('modalLarge') modal-lg @endslot
    @slot('id') addOrderDetail @endslot
    @slot('submitBtnId','addEitOrderSubmit')
    @slot('modalTitle') اضافة تفاصيل الطلب  @endslot
    @slot('modalBody')
        <form class="formOrderDetail" action="#" method="POST"
              enctype="multipart/form-data">
            <input type="hidden" name="orderId" id="orderId">
            <input type="hidden" name="serviceType" id="serviceType">
            <div class="row">
                <div class="col-md-4">
                    <span onclick="addOrderService('Installation')" class="btn btn-primary btn-block d-inline-block"> <i class="fas fa-toolbox"></i> خدمات التركيب </span>
                </div>
                <div class="col-md-4">
                    <span onclick="addOrderService('maintenance')" class="btn btn-danger btn-block d-inline-block"> <i class="fas fa-cogs"></i> خدمات الصيانة </span>

                </div>
                <div onclick="addOrderService('pipes_extension')" class="col-md-4"><span class="btn btn-success btn-block d-inline-block"> <i class="fas fa-code-branch"></i> خدمات تمديد المواسير </span>
                </div>
            </div>


            <div id="orderDetailContent">

            </div>
        </form>


    @endslot
    @slot('submitBtnId','addorderDetailSubmit')
@endcomponent


@push('custom-scripts')
    <script>
        function adddetail(orderId) {
            $('#orderId').val(orderId);
            $('#addOrderDetail').modal('show');
        }


        function addOrderService(serviceType) {
            let orderId=$('#orderId').val();
            $('#serviceType').val(serviceType);
            let Maintenance = "{{route('employe.Maintenance.getRow')}}";
            let Installation = "{{route('employe.Installation.getRow')}}";
            let Pipes = "{{route('employe.Pipes.getRow')}}";
            let path = "";
            if (serviceType == "Installation") path = Installation;
            else if (serviceType == "maintenance") path = Maintenance;
            else if (serviceType == "pipes_extension") path = Pipes;

            $('#orderDetailContent').html('');
            let data = new FormData();
            data.append('rowId', 1);
            ajaxRequest(path, data, function (response) {
                $('#orderDetailContent').html(response);
                $('#orderId').val(orderId);
            });
        }

        function calTotal() {
            let service_pirce = Number($('#maintaince_service_pirce_1').val());
            let quantity = Number($('#maintaince_quantity_1').val());
            $('#maintaince_total_1').val(service_pirce * quantity);
        }


        $('#addorderDetailSubmit').click(function () {
            let path = "{{route('adminpanel.orders.createOrderDetail')}}";
            let form = $('.formOrderDetail');
            let data = new FormData(form[0]);
            let orderId = $('#orderId').val();
            let serviceType = $('#serviceType').val();
            ajaxRequest(path, data, function (response) {
                if (response.status == 200) {
                    swal("تم!", 'تم ادخال تفاصيل الطلب بنجاح', "success");
                    $('.formOrderDetail input').val(0);

                    $('#orderId').val(orderId)
                    $('#serviceType').val(serviceType)
                    oTable.draw();


                } else if (response.status == 400) {
                    swal("opps!", 'برجاء ادخال القيم بالطريقة الصحيحة', "warning");
                    $("input,select,textarea").removeClass("is-invalid");
                    for (let k in response.message)
                        $("input[name=" + k + "],select[name=" + k + "],textarea[name=" + k + "]").addClass("is-invalid");
                }
            });

        });



        function changeInputProduct(elementId){
            // get price of this element Installation
            let price=$('#installation_product_id_'+elementId).find(':selected').attr('data-price');
            $('#installation_product_price_'+elementId).val(price);
        }


    </script>
@endpush
