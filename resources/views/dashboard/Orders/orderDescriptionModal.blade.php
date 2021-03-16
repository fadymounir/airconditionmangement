@component('dashboard.layouts.tools.modalNormal')
    @slot('id') orderDescriptionModal @endslot
    @slot('modalTitle')   @if(Auth::user()->type == "admin") تفاصيل  الطلب @else Desciption @endif @endslot
    @slot('submitBtnClass') d-none @endslot
    @slot('closebtnContent') @if(Auth::user()->type == "admin") اغلاق   @else close @endif   @endslot
    @slot('modalBodyId') orderBodyDescriptionModalBody @endslot



    @slot('modalBody')

    @endslot
@endcomponent



@push('custom-scripts')
    <script>
        function orderDescriptionModal(type,orderId) {
            let path = "{{route('adminpanel.orders.getOrderDescription')}}";
            let data = new FormData();
            data.append('orderId', orderId);
            data.append('type',type);
            ajaxRequest(path, data, function (response) {

                if (response == "") $('#orderBodyDescriptionModalBody').html('<p class=" text-center alert alert-info">لا يوجد وصف</p>');
                else
                    $('#orderBodyDescriptionModalBody').html(response);
                $('#orderDescriptionModal').modal('show');
            });

        }
    </script>
@endpush
