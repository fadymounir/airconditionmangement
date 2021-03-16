@component('dashboard.layouts.DataTableComponents')

    <script>

        var oTable = new O_Datatable('#users-table');
        oTable.addColumns(
            [
                {"data": "checkbox_operation", searchable: false, orderable: false,},
                {"data": "name", name: "users.name"},
                {"data": "phone", name: "users.phone"},
                {"data": "type", name: "users.type"},
                {"data":"is_active",name:"users.is_active"},
                {"data":"orderClosed",name:"orderClosed"},
                {"data":"orderOpen",name:"orderOpen"},
                {"data":"updateInfo",name:"updateInfo"},
                {"data":"is_logged",name:"is_logged"},
                {"data": "created_at", name: "users.created_at"}
            ]
        );

        oTable.orderBy([1, 'desc']);
        oTable.addAjaxUrlWithData('{{route('adminpanel.users.index')}}', function (send) {
        });
        oTable.build();

        function faqsAction(type, faq = null) {
            let title = '';
            let text = '';
            let path = '{{route('adminapenl.users.usersActions')}}';
            let faqs = [];

            if (faq != null) faqs.push(faq);
            $.each($("input[name='action']:checked"), function () {
                faqs.push($(this).val());
            });

            if (faqs.length == 0) {
                swal("خطا!", "برجاء اختيار المستخدمين لتنفيذ المهمة", "warning");
                return;
            }


            if (type == "disActiveUsers") {
                title = 'هل انت متاكد من تعطيل المستخدمين المحددة';
                text = 'عند تعطيل المستخدمين لم تظهر في الموقع فيما بعد  ';
            } else if (type == "deleteUsers") {
                title = 'هل انت متاكد من حذف المستخدمين المحددة';
                text = 'سوف يتم مسح المستخدمين نهائيا بكل التفاصيل الخاص ';
            } else if (type == "activeUsers") {
                title = 'هل انت متاكد من تفعيل المستخدمين المحددة';
                text = 'عند تفعيل المستخدمين سوف تظهر بشكل كامل في الموقع ';
            } else if (type == "deleteOneUsers") {
                title = "هل انت متاكد من حذف المستخدمين المحدد";
                text = 'سوف يتم مسح المستخدمين نهائيا بكل التفاصيل الخاص بها';
                faqs = [faq];
            }

            swal({
                title: title,
                text: text,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let data = new FormData();
                        data.append('type', type);
                        data.append('users', faqs);
                        ajaxRequest(path, data, function (response) {
                            swal("تم!", "تم تنفيذ المهمة بنجاح", "success");
                            oTable.draw();
                        });
                    }
                });
        }



        function openLog(userId){
            swal({
                title: "فتح السجل",
                text: "هل انت متاكد من فتح السجل للمستخدم المختار",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let path="{{route('adminpanel.users.openLog')}}"
                        let data = new FormData();
                        data.append('userId', userId);
                        ajaxRequest(path, data, function (response) {
                            swal("تم!", "تم فتح السجل بنجاح", "success");
                            oTable.draw();
                        });
                    }
                });
        }


    </script>
@endcomponent



