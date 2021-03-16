@component('dashboard.layouts.tools.modalNormal')
    @slot('id') orderDetailModal @endslot
    @slot('modalLarge') modal-lg @endslot
    @slot('modalTitle') @if(Auth::user()->type == "admin")  تفاصيل الطلب @else Order Details @endif @endslot
    @slot('submitBtnClass') d-none @endslot
    @slot('modalBodyId') orderDetailModalBody @endslot


    @slot('modalBody')

    @endslot
@endcomponent



@push('custom-scripts')
    <script>
        function orderDetail(type, orderId) {
            let path = "{{route('adminpanel.orders.getOrderDetail')}}";
            let data = new FormData();
            data.append('orderId', orderId);
            data.append('type', type);
            ajaxRequest(path, data, function (response) {
                $('#orderDetailModalBody').html(response);
                $('#orderDetailModal').modal('show');
            });
        }

        function deleteElement(type, orderElementId) {
            let title = "تاكيد العملية";
            let text = "هل انت متاكد من اتمامك العملية الحذف المختارة";

            @if(Auth::user()->type != "admin")
                title = "Confirm Action";
            text = "Are You Sure That You will Delete That Element";
            @endif


            let path = "{{route('adminpanel.orders.deleteElement')}}";
            let data = new FormData();
            data.append('type', type);
            data.append('orderElementId', orderElementId);
            swal({
                title: title,
                text: text,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        ajaxRequest(path, data, function (response) {
                            let typedetail = "other";
                            if (type == "order_offer_product") typedetail = "order_offer_product";
                            orderDetail(typedetail, response.orderId);
                            oTable.draw();
                            let successMsg = "Delete Element Complete";
                            @if(Auth::user()->type == "admin")
                                successMsg = "تمت عملية الحذف بنجاح";
                            @endif
                            swal(successMsg, {icon: "success",});
                        });
                    }
                });
        }


    </script>
@endpush
