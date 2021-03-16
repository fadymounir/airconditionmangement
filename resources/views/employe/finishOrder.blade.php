@extends("layouts.app")



@section("content")

    <form class="form" action="#" method="POST"
          enctype="multipart/form-data">

        <div class="container">


                    @include('employe.AgentInfo')

                    {{--start of installation--}}
                    <div class="card">
                        <div class="card-header card-primary">
                            <a href="#Installation" class="btn btn-primary btn-block" data-toggle="collapse">Installation</a>
                        </div>
                        <div class="card-body">
                            <div id="Installation" class="collapse">
                                <input type="hidden" id="InstallationNumberofRow" name="InstallationNumberofRow" value="{{$order->Installation->count()}}">
                                <div id="installationContent">
                                    @foreach($order->Installation as $row)
                                        @include('employe.Installation.installationElement',['id'=>$loop->index,'orderInfo'=>$row])
                                    @endforeach
                                </div>
                                <p class="btn btn-primary btn-block mt-5" onclick="addNewElement('Installation');">
                                    ِAdd New Installation Element<i class="fas fa-plus"></i>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{--end of installation--}}


                    {{--start of Maintaince--}}
                    <div class="card ">
                        <div class="card-header card-primary"><a href="#Maintaince" class="btn btn-danger btn-block"
                                                                 data-toggle="collapse">Maintaince</a>
                        </div>
                        <div class="card-body">
                            <div id="Maintaince" class="collapse">
                                <input type="hidden" id="MaintainceNumberofRow" name="MaintainceNumberofRow"
                                       value="{{$order->Maintenance->count()}}">
                                <div id="MaintenanceContent">
                                    @foreach($order->Maintenance as $row)
                                        @include('employe.Maintenance.MaintenanceElement',['id'=>$loop->index,'orderInfo'=>$row])
                                    @endforeach
                                </div>
                                <p class="btn btn-primary btn-block mt-5" onclick="addNewElement('Maintaince');">ِAdd
                                    New
                                    Maintaince Element<i class="fas fa-plus"></i></p>
                            </div>
                        </div>
                    </div>
                    {{--end of Maintaince--}}






                    {{--start of pipes Extension--}}
                    <div class="card ">
                        <div class="card-header card-primary"><a href="#pipesExtension"
                                                                 class="btn btn-success btn-block"
                                                                 data-toggle="collapse">pipes Extension</a>
                        </div>
                        <div class="card-body">
                            <div id="pipesExtension" class="collapse">
                                <input type="hidden" id="pipesExtensionNumberofRow" name="pipesExtensionNumberofRow"
                                       value="{{$order->PipesExtension->count()}}">
                                <div id="pipesExtensionContent">
                                    @foreach($order->PipesExtension as $row)
                                        @include('employe.PipesExtension.PipesElement',['id'=>$loop->index,'orderInfo'=>$row])
                                    @endforeach
                                </div>
                                <p class="btn btn-primary btn-block mt-5" onclick="addNewElement('pipesExtension');">
                                    ِAdd New
                                    pipes Extension Element<i class="fas fa-plus"></i></p>
                            </div>
                        </div>
                    </div>
                    {{--end of pipes Extension--}}



                    {{--start of orders Element --}}
                    <div class="card ">
                        <div class="card-header card-primary"><a href="#orderElement" class="btn btn-info btn-block"
                                                                 data-toggle="collapse">Order Element Included</a>
                        </div>
                        <div class="card-body">
                            <div id="orderElement" class="collapse">
                                <input type="hidden" id="orderElementNumberofRow" name="orderElementNumberofRow"
                                       value="{{$order->OrderElement->count()}}">
                                <div id="orderElementContent">
                                    @foreach($order->OrderElement as $row)
                                        @include('employe.orderElement.orderElementRow',['id'=>$loop->index,'orderInfo'=>$row])
                                    @endforeach
                                </div>
                                <p class="btn btn-primary btn-block mt-5" onclick="addNewElement('orderElement');">ِ
                                    Add New Order Element Included<i class="fas fa-plus"></i></p>
                            </div>
                        </div>
                    </div>
                    {{--end of orders Element--}}
        </div>

    </form>



    <span class="btn btn-warning btn-block btn-outline-danger mt-5" onclick="finishOrder()">Finish Order</span>

    </div>
@endsection




@push('custom-scripts')
    <script>
        function addNewElement(type) {
            /**
             * type Installation , pipesExtension , Maintaince
             * */
            let rowId = 0;
            let path = "";
            let content = "";
            // rowId
            if (type == "Installation") {
                rowId = $('#InstallationNumberofRow').val();
                $('#InstallationNumberofRow').val(Number(rowId) + Number(1));
                path = "{{route('employe.Installation.getRow')}}";
                content = "installationContent";
            } else if (type == "pipesExtension") {
                rowId = $('#pipesExtensionNumberofRow').val();
                $('#pipesExtensionNumberofRow').val(Number(rowId) + Number(1));
                path = "{{route('employe.Pipes.getRow')}}";
                content = "pipesExtensionContent";
            } else if (type == "Maintaince") {
                rowId = $('#MaintainceNumberofRow').val();
                $('#MaintainceNumberofRow').val(Number(rowId) + Number(1));
                path = "{{route('employe.Maintenance.getRow')}}";
                content = "MaintenanceContent";
            } else if (type == "orderElement") {
                rowId = $('#orderElementNumberofRow').val();
                $('#orderElementNumberofRow').val(Number(rowId) + Number(1));
                path = "{{route('employe.orderElement.getRow')}}";
                content = "orderElementContent";
            }
            console.log(rowId + "  " + path);
            let formData = new FormData();
            formData.append('rowId', rowId);
            ajaxRequest(path, formData, function (response) {
                $('#' + content).append(response);
            });
        }

        function deleteElement(type, rowId) {
            $('#' + type + 'row_' + rowId).html('');
            calTotal();
        }

        function calTotal() {
            // maintaince
            let service_pirce = $('.service_pirce');
            let quantity = $('.quantity');
            var inputs = $(".total");
            let totalInvoice = 0;
            for (var i = 0; i < inputs.length; i++) {
                //cal the totoal element
                let calTotal = $(service_pirce[i]).val() * $(quantity[i]).val();
                $(inputs[i]).val(calTotal);
                totalInvoice = totalInvoice + calTotal;
            }

            // pipes
            let pipes = $('.pipes');
            for (var i = 0; i < pipes.length; i++)
                totalInvoice = totalInvoice + Number($(pipes[i]).val());


            let installation = $('.installation');
            for (var i = 0; i < installation.length; i++)
                totalInvoice = totalInvoice + Number($(installation[i]).val());


            $('#total_invoice').val(totalInvoice);
        }


        function finishOrder() {
            let form = $('.form');
            let path = "{{route('employe.orders.finishOrderSubmit')}}";
            let data = new FormData(form[0]);
            ajaxRequest(path, data, function (response) {
                if (response.status == 200) {
                    swal("You have Finish The order Successfully", response.messsage, "success");


                    let =message = "لاستخراج الفاتورة الخاصة بطلبك  برجاء الضغط علي الرابط التالي " + window.location.origin+"/adminpanel/orders/getOrderBill/"+response.orderId;
                    let link = "https://api.whatsapp.com/send?phone=+966" + response.phone + "&text=" + message;


                    setTimeout(() => {
                        location.href = link;
                    }, 2000);

                } else if (response.status == 400) {
                    swal("opps!", 'Please Enter All inputs with Correct Answer', "warning");
                    $("input,select,textarea").removeClass("is-invalid");
                    for (let k in response.message)
                        $("input[name=" + k + "],select[name=" + k + "],textarea[name=" + k + "]").addClass("is-invalid");
                } else if (response.status == 401) {
                    swal("opps!", 'The Total Invoice Is 0 please Add Eleemt in detail', "warning");
                } else if (response.status == 402) {
                    swal("opps!", "you Don't have Permission to create this Finish The order Please connect with Mangers", "warning");
                }
            });

        }

        // create purcases section


        function changeInputProduct(elementId) {
            // get price of this element Installation
            let price = $('#installation_product_id_' + elementId).find(':selected').attr('data-price');
            $('#installation_product_price_' + elementId).val(price);
        }


    </script>
@endpush
