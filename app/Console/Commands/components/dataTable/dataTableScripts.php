<?php

namespace App\Console\Commands\components;

class dataTableScripts
{

    public static function index()
    {
        return '@component("dashboard . layouts . DataTableComponents")

    <script>

        var oTable = new O_Datatable("#table");
        oTable.addColumns(
            [
                {"data": "checkbox_operation", searchable: false, orderable: false,},
                {"data": "name_ar", name: "name_ar"},
                {"data": "name_en", name: "name_en"},
                {"data":"updateInfo",name:"updateInfo"},
                {"data":"deleteInfo",name:"deleteInfo"},
                {"data": "created_at", name: "created_at"}
            ]
        );

        oTable.orderBy([1, "desc"]);
        oTable.addAjaxUrlWithData("{{route("adminpanel.Home.index")}}", function (send) {
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
                        let path="{{route("adminpanel.Home.index")}}";
                        let data=new FormData();
                        data.append("id",id);
                        ajaxRequest(path, data, function (response) {
                            swal("تم!", "تم عملية الحذف بنجاح!", "success");
                            oTable.draw();
                        });
                    }
                });
        }





    </script>
@endcomponent

';

    }

}
