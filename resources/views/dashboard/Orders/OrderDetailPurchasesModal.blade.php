@component('dashboard.layouts.tools.modalNormal')
    @slot('id') orderDetailPurchasesModal @endslot
    @slot('modalTitle') تفاصيل المشتريات @endslot
    @slot('submitBtnClass') d-none @endslot
    @slot('modalBodyId') orderDetailPurchasesModalBody @endslot


    @slot('modalBody')

    @endslot
@endcomponent



@push('custom-scripts')
        <script>
            function orderDetailPurchases(orderId) {

                let path = "{{route('adminpanel.orders.getOrderDetail')}}";
                let data = new FormData();
                data.append('orderId', orderId);
                data.append('type', "orderPurchasesDetail");
                ajaxRequest(path, data, function (response) {
                    $('#orderDetailPurchasesModalBody').html(response);
                    $('#orderDetailPurchasesModal').modal('show');
                });
            }
        </script>
@endpush
