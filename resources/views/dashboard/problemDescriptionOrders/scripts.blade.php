@component('dashboard.layouts.DataTableComponents')

    <script>

        var oTable = new O_Datatable('#purchases-table');
        oTable.addColumns(
            [
                {"data": "checkbox_operation", searchable: false, orderable: false,},
                {"data": "name_ar", name: "maintenance_problems.name_ar"},
                {"data": "name_en", name: "maintenance_problems.name_en"},
                {"data":"updateInfo",name:"updateInfo"},
                {"data":"deleteInfo",name:"deleteInfo"},
                {"data": "created_at", name: "maintenance_problems.created_at"}
            ]
        );

        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('adminpanel.problemsDescribingOrders.index')}}', function (send) {
        });
        oTable.build();



        function deleterecord(id){
            swal({
                title: "حذف الوصف",
                text: "هل انت متاكد من اتمامك لعملية الحذف ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let path="{{route('adminpanel.problemsDescribingOrders.deleteeRcord')}}";
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



