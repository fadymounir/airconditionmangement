@extends('layouts.app')
@section('style')
    <style>
        .rate {
            float: center;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked) > input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked) > label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked) > label:before {
            content: '★ ';
        }

        .rate > input:checked ~ label {
            color: #ffc700;
        }

        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }

        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="text-center">موسسة ادريس للتكييف والتبريد</h1>
                    <h3 class="text-center mt-5">برجاء الاجابة علي التقييمات التالية لاستخراج الفاتورة الخاصة بك</h3>


                    <div class="row" style="margin-top:30px;">
                        <div class="text-center col-md-3">
                            <h2 class="text-bold">خدمة العملاء</h2>
                        </div>
                        <div class="text-center col-md-4">
                            <span class="text-center" style="font-size: 15px;">هل تم الاجابة علي استفسارك اثناء الحديث معنا ؟</span>

                        </div>

                        <div class="text-center col-md-4">
                            <div class="rate">
                                <input type="radio" id="star5" name="rateCutsomerService" value="5"/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rateCutsomerService" value="4"/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rateCutsomerService" value="3"/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rateCutsomerService" value="2"/>
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rateCutsomerService" value="1"/>
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top:30px;">
                        <div class="text-center col-md-3">
                            <h2 class="text-bold">تقيم الفني</h2>
                        </div>
                        <div class="text-center col-md-4">
                            <span class="text-center" style="font-size: 15px;">ما هو تقييمك لتجربتك مع ممثلنا  الفني  المحتص المتمثلة في انجاز عملة ؟</span>

                        </div>

                        <div class="text-center col-md-4">
                            <div class="rate">
                                <input type="radio" id="rateUser5" name="rateUser" value="5"/>
                                <label for="rateUser5" title="text">5 stars</label>
                                <input type="radio" id="rateUser4" name="rateUser" value="4"/>
                                <label for="rateUser4" title="text">4 stars</label>
                                <input type="radio" id="rateUser3" name="rateUser" value="3"/>
                                <label for="rateUser3" title="text">3 stars</label>
                                <input type="radio" id="rateUser2" name="rateUser" value="2"/>
                                <label for="rateUser2" title="text">2 stars</label>
                                <input type="radio" id="rateUser1" name="rateUser" value="1"/>
                                <label for="rateUser1" title="text">1 star</label>
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top:30px;">
                        <div class="text-center col-md-3">
                            <h2 class="text-bold">يرجى وصف إنشغالك</h2>
                        </div>
                        <div class="text-center col-md-4">
                            <span class="text-center" style="font-size: 15px;">يرجي وصف انشغالك لتحسين الخدمات المقدمة لدينا</span>

                        </div>

                        <div class="text-center col-md-4">
                            @component('dashboard.layouts.components.textarea')
                                @slot('label','يرجي وصف انشغالك')
                                @slot('name','desciption')
                            @endcomponent
                        </div>
                    </div>


                    <div class="row" style="margin-top:30px; margin-bottom:20px; ">
                        <div class="col-md-12">
                            <span class="btn btn-primary btn-block" onclick="submitrate()">ارسال واستخراج الفاتورة</span>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    </div>
@endsection



@push('custom-scripts')
    <script>


        function submitrate() {
                let rateCutsomerService=$('input[name="rateCutsomerService"]:checked').val();
                let rateUser=$('input[name="rateUser"]:checked').val();
                let desciption=$('#desciption').val();

                if(rateCutsomerService === undefined) rateCutsomerService=0;
                if(rateUser === undefined ) rateUser=0;

                let path="{{route('adminpanel.orders.submitRate')}}";
                let data=new FormData();
                    data.append('order_id',{{$order->id}});
                    data.append('customer_service_rate',rateCutsomerService);
                    data.append('user_rate',rateUser);
                    if(desciption !='')
                    data.append('desciption',desciption);
                    ajaxRequest(path, data,function(respponse) {
                            location.href="{{route('adminpanel.orders.getOrderBill',['orderId'=>$order->id])}}"
                    });



        }



    </script>
@endpush
