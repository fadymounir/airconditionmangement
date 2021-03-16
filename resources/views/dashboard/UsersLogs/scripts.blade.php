@component('dashboard.layouts.DataTableComponents')

    <script>

        var oTable = new O_Datatable('#table');
        oTable.addColumns(
            [
                {"data": "checkbox_operation", searchable: false, orderable: false,},
                {"data": "userName", name: "userName"},
                {"data": "created_at", name: "users_log.created_at"},
                {"data": "is_closed", name: "users_log.is_closed"},
                {"data": "complete_order", name: "users_log.complete_order"},
                {"data":"total_complete_order",name:"users_log.total_complete_order"},
                {"data":"purchases_count",name:"users_log.purchases_count"},
                {"data": "purchases_total", name: "users_log.purchases_total"},
                {"data": "product_count", name: "users_log.product_count"},
                {"data": "product_store_count", name: "users_log.product_store_count"},
                {"data": "product_total", name: "users_log.product_total"},
            ]
        );

        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('adminpanel.logs.index')}}', function (send) {
            send._userId = $('#userId').val();
            send._is_closed=$('#is_closed').val();

        });
        oTable.build();









    </script>
@endcomponent



