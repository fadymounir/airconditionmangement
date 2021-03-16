@component('dashboard.layouts.DataTableComponents')

    <script>

        var oTable = new O_Datatable('#orders-table');
        oTable.addColumns(
            [
                {"data": "id", name: "orders.id"},
                {"data": "name", name: "name"},
                {"data":"phone",name:"phone"},
                {"data":"address",name:"address"},
                {"data":"description",name:"description"},
                {"data":"city",name:"city"},
                {"data":"quantity",name:"quantity"},
                {"data":"orderDetail",name:"orderDetail"},
                {"data":"action",name:"action"},
                {"data": "date_action", name: "date_action"},
                {"data":"is_closed",name:"is_closed"}
            ]
        );
        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('employe.home.index')}}', function (send) {
            let orderStatus=$('input[name="orderStatus"]:checked').val();
            send._order_status = orderStatus;
        });
        oTable.build();








    </script>
@endcomponent



