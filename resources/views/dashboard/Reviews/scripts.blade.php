@component('dashboard.layouts.DataTableComponents')

    <script>

        var oTable = new O_Datatable('#reviews-table');
        oTable.addColumns(
            [
                {"data": "orderName", name: "orderName"},
                {"data":"customer_service_rate",name:"reviews.customer_service_rate"},
                {"data":"user_rate",name:"reviews.user_rate"},
                {"data": "desciption", name: "reviews.desciption"},
                {"data": "created_at", name: "reviews.created_at"}
            ]
        );

        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('adminpanel.rates.index')}}', function (send) {
        });
        oTable.build();
    </script>
@endcomponent



