@component('dashboard.layouts.tools.modalNormal')
    @slot('id') showOrdersMaintenanceProblemsModal @endslot
    @slot('modalTitle')  @if(Auth::user()->type == "admin")  وصف مشكلات الطلب @else order Description Problem @endif @endslot
    @slot('modalBodyId') showModalProblemsModalContent @endslot
    @slot('closebtnContent') @if(Auth::user()->type == "admin") اغلاق @else Close @endif @endslot
    @slot('submitBtnClass','d-none')
    @slot('modalBody')

    @endslot
@endcomponent

@push('custom-scripts')
    <script>
        function showOrdersMaintenanceProblems(orderId) {
            $('#showOrdersMaintenanceProblemsModal').modal('show');
            let path = "{{route('adminapenl.orders.showMaintenanceProblems')}}";
            let data = new FormData();
                data.append('orderId',orderId);
            ajaxRequest(path, data, function (response) {
                    $('#showModalProblemsModalContent').html(response);
            });
        }



    </script>
@endpush
