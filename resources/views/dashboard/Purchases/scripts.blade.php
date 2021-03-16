@component('dashboard.layouts.DataTableComponents')

    <script>

        var oTable = new O_Datatable('#purchases-table');
        oTable.addColumns(
            [
                {"data": "checkbox_operation", searchable: false, orderable: false,},
                {"data": "purchasesnName", name: "purchasesnName"},
                {"data": "userName", name: "userName"},
                {"data":"quantity",name:"quantity"},
                {"data":"total",name:"total"},
                {"data": "bill", name: "bill"},
                {"data": "created_at", name: "created_at"}
            ]
        );

        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('adminpanel.PurchasesUsers.index')}}', function (send) {
        });
        oTable.build();



        function deleterecord(id){
            swal({
                title: "حذف المشتريات",
                text: "هل انت متاكد من اتمامك لعملية الحذف ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let path="{{route('adminpanel.purchases.deleteeRcord')}}";
                        let data=new FormData();
                        data.append('id',id);
                        ajaxRequest(path, data, function (response) {
                            swal("تم!", "تم عملية الحذف بنجاح!", "success");
                            oTable.draw();
                        });
                    }
                });
        }





    </script>
@endcomponent



