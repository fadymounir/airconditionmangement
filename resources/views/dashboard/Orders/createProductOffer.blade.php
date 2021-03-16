@extends("dashboard.layouts.master")
@section("title","اضافة عروض الاسعار")
@section("link-css")
@endsection

@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اضافة عروض اسعار المنتجات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("adminpanel.home.index")}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">اضافة عروض اسعار المنتجات</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




@section("content")
    <div class="card">
        <div class="card-header">اضافة عروض اسعار المنتجات</div>
        <div class="card-body">

            <div class="container">
                <form class="form" action="#" method="POST"
                      enctype="multipart/form-data">
                <div class="row">

                        <div class="col-md-6">

                            @component('dashboard.layouts.components.inputTag')
                                @slot('name','name')
                                @slot('label','اسم العميل')

                                @slot('placeHolder','برجاء ادخال اسم العميل')
                            @endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.inputTag')
                                @slot('name','phone')
                                @slot('label','رقم الجاول')

                                @slot('icon','fas fa-phone')
                                @slot('placeHolder','برجاء ادخال رقم الجوال يفضل رقم الوتساب')
                            @endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.inputTag')
                                @slot('name','total_invoice')
                                @slot('label','التكلفة')
                                @slot('type','number')
                                @slot('icon','fas fa-money-check')
                                @slot('value',0)
                            @endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.inputTag')
                                @slot('name','address')
                                @slot('label','العنوان')

                                @slot('icon','fas fa-location-arrow')
                                @slot('placeHolder','برجاء ادخال عنوان العميل تفصيلاأ')
                            @endcomponent
                        </div>
                    <div class="col-md-6">
                        @component('dashboard.layouts.components.selectTag')
                            @slot('name','cityId')
                            @slot('label','الحي')
                            @slot('icon','fas fa-building')
                            @slot('options')
                                @foreach(\App\Models\City::allActive() as $row)
                                    <option value="{{$row->id}}">{{$row->name_ar}}</option>
                                @endforeach
                            @endslot

                        @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('dashboard.layouts.components.inputTag')
                            @slot('name','date_action')
                            @slot('label','تاريخ ووقت التنفيذ')
                            @slot('icon','fas fa-user-cog')
                            @slot('type','datetime-local')
                        @endcomponent
                    </div>



                        <div class="col-md-12">
                            @component('dashboard.layouts.components.textarea')
                                @slot('label','وصف الفاتورة (اختياري)')
                                @slot('icon','fas fa-book-open')
                                @slot('name','desciption')
                            @endcomponent
                        </div>

                        <div class="col-md-12 text-center">
                            <h2 class="text-primary">تفاصيل العرض (المنتجات)</h2>
                        </div>

                        <div id="productContent" class="col-md-12">
                            <input type="hidden" name="numberOfRows" id="numberOfRows" value="0">
                        </div>
                </div>
                </form>

                <div class="card-footer">
                    <span class="btn btn-primary btn-block mb-5" onclick="addNewRow()">اضافة منتجات اخري <i
                            class="fas fa-plus"></i></span>

                    <span class="btn btn-success btn-block" id="submit">حفظ <i class="fas fa-user-edit"></i></span>

                </div>
            </div>
        </div>
        @endsection



        @section("scripts")
            <script src="https://cdn.ckeditor.com/4.15.0/full-all/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('desciption');

                function addNewRow() {
                    let path = "{{route('adminpanel.orders.createNewOrder.getRow')}}";
                    let data = new FormData();
                    let currentRow = $('#numberOfRows').val();
                    $('#numberOfRows').val(Number(currentRow) + Number(1));
                    data.append('id', currentRow);
                    // get record and push in our content
                    ajaxRequest(path, data, function (response) {
                        $('#productContent').append(response);
                        calTotal();
                    });
                }


                function deleteSelectedRow(id) {
                    $('#row_product_' + id).html('');
                    calTotal();
                }


                function calTotal() {
                    var inputs = $(".calTotal");
                    let total = 0;
                    for (var i = 0; i < inputs.length; i++) {
                        let id=$(inputs[i]).attr('data-id');
                        total = total +( Number($(inputs[i]).val())*Number($('#quantity_'+id).val()));
                    }

                    $('#total_invoice').val(total);
                }


                function changeSelect(selectId, id) {
                    let value = $('#' + selectId + ' :selected').attr('data-price');
                    $('#price_' + id).val(value);
                    $('#quantity_'+id).val(1);
                    calTotal();
                }


                $('#submit').click(function (){
                    let form = $('.form');
                    let path = "{{route('adminpanel.orders.createNewOrder.createProductOfferSubmit')}}";
                    let data = new FormData(form[0]);
                    data.append('desciption', CKEDITOR.instances['desciption'].getData());



                    ajaxRequest(path, data, function (response) {
                        if (response.status == 200) {
                            swal("تم!",'تم انشاء عروض اسعار بنجاح', "success");
                        } else if (response.status == 400) {
                            swal("خطاة!", 'برجاء ادخال كافة البيانات بالطريقة الصحيحة', "warning");
                            $("input,select,textarea").removeClass("is-invalid");
                            for (let k in response.message)
                                $("input[name=" + k + "],select[name=" + k + "],textarea[name=" + k + "]").addClass("is-invalid");
                        }else if(response.status == 401)
                            swal("خطاة!", 'برجاء ادخال منتجات لاتمام العرض', "warning");
                    });
                });


            </script>
@endsection


