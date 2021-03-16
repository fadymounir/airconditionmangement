@component('dashboard.layouts.DataTableComponents')

    <script>

        var oTable = new O_Datatable('#table');
        oTable.addColumns(
            [
                {"data": "checkbox_operation", searchable: false, orderable: false,},
                {"data": "orderId", name: "orders.id"},
                {"data":"updateInfo",name:"updateInfo"},
                {"data": "name", name: "orders.name"},
                {"data": "phone", name: "orders.phone"},
                {"data": "service_type", name: "service_type"},
                {"data": "description", name: "description"},
                {"data": "city", name: "city"},
                {"data": "addElement", name: "addElement"},
                {"data":"ordersMaintenanceProblems",name:"ordersMaintenanceProblems"},
                {"data": "user", name: "user"},
                {"data": "orderDetail", name: "orderDetail"},
                {"data": "orderBill", name: "orderBill"},
                {"data": "sendViaWhatsapp", name: "sendViaWhatsapp"},
                {"data": "re_open", name: "re_open"},

                {"data":"date_action",name:"date_action"},

                {"data": "is_closed", name: "is_closed"}

            ]
        );

        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('adminpanel.orders.index')}}', function (send) {
            send._data_action = $('#createdAt').val();
            send._orderStaus=$('#orderStaus').val();
        });
        oTable.build();


        function deleterecord(id) {
            swal({
                title: "حذف المشتريات",
                text: "هل انت متاكد من اتمامك لعملية الحذف ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let path = "{{route('adminpanel.home.index')}}";
                        let data = new FormData();
                        data.append('id', id);
                        ajaxRequest(path, data, function (response) {
                            swal("تم!", "تم عملية الحذف بنجاح!", "success");
                            oTable.draw();
                        });
                    }
                });
        }

        function reopenOrder(id) {


            swal("برجاء ادخال سبب لاعادة فتح الطلب:", {
                content: "input",
            })
                .then((value) => {
                    if(value != ""){
                    let path = "{{route('adminpanel.orders.reopen')}}";
                    let data = new FormData();
                    data.append('orderId', id);
                    data.append('description',value);
                    ajaxRequest(path, data, function (response) {
                        swal("تم!", "تم عملية اعادة فتح الطلب بنجاح!", "success");
                        oTable.draw();
                    });
                    } else{
                        swal("خطاة!", "برجاء ادخال السبب لاعادة فتح الطلب", "warning");
                    }
                });


        }


    </script>
@endcomponent



