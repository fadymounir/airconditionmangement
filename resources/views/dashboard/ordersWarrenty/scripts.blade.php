@component('dashboard.layouts.DataTableComponents')

    <script>
        var oTable = new O_Datatable('#purchases-table');
        oTable.addColumns(
            [
                {"data": "checkbox_operation", searchable: false, orderable: false,},
                {"data": "order_id", name: "orders_warrenty.order_id"},
                {"data": "description", name: "orders_warrenty.description"},
                {"data": "created_at", name: "orders_warrenty.created_at"}
            ]
        );

        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('adminpanel.ordersWarrenty.index')}}', function (send) {
        });
        oTable.build();
    </script>
@endcomponent



