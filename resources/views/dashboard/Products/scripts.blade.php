@component('dashboard.layouts.DataTableComponents')

    <script>

        var oTable = new O_Datatable('#products-table');
        oTable.addColumns(
            [
                {"data": "checkbox_operation", searchable: false, orderable: false,},
                {"data": "name", name: "name"},
                {"data": "price", name: "price"},
                {"data":"quantity",name:"prodouct.quantity"},
                {"data":"updateInfo",name:"updateInfo"},
                {"data":"deleteInfo",name:"deleteInfo"},
                {"data":"addQuantity",name:"addQuantity"},
                {"data": "created_at", name: "created_at"}
            ]
        );

        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('adminpanel.products.index')}}', function (send) {
        });
        oTable.build();



        function deleterecord(id){
            swal({
                title: "حذف المنتجات",
                text: "هل انت متاكد من اتمامك لعملية الحذف ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let path="{{route('adminpanel.products.deleteProduct')}}";
                        let data=new FormData();
                        data.append('id',id);
                        ajaxRequest(path, data, function (response) {
                            swal("تم!", "تم عملية الحذف بنجاح!", "success");
                            oTable.draw();
                        });
                    }
                });
        }


        function addQuantity(productId){

            swal("اضف كمية للمنتج:", {
                content: "input",
            }).then((value) => {
                    if(value != ""){
                        let path = "{{route('adminpanel.products.addQuantity')}}";
                        let data = new FormData();
                        data.append('productId', productId);
                        data.append('quantity',value);
                        ajaxRequest(path, data, function (response) {
                            swal("تم!", "تم اضافة الكمية للمنتج بنجاح", "success");
                            oTable.draw();
                        });
                    } else{
                        swal("خطاة!", "برجاء ادخال قيمة مناسبة للمنتج", "warning");
                    }
                });
        }


    </script>
@endcomponent



