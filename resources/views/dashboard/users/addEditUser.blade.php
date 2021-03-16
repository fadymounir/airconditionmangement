@extends("dashboard.layouts.master")
@section("title","المستخدمين")
@section("link-css")
@endsection

@section("content-header")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('adminpanel.home.index')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item "><a href="{{route('adminpanel.users.index')}}">المستخدمين </a></li>
                        <li class="breadcrumb-item active">{{$title}} </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection




@section("content")


    <div class="card card-primary">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            <form class="form" action="{{route('adminpanel.users.addeditUsersAction')}}" method="POST"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        @component('dashboard.layouts.components.selectTag')
                            @slot('label','نوع المستخدم')
                            @slot('icon','fas fa-eye-dropper')
                            @slot('name','type')
                            @slot('selected') @if(isset($user)) {{$user->type}} @endif @endslot
                            @slot('options')
                                <option value="admin">مسئول</option>
                                <option value="employe">موظف</option>
                            @endslot
                        @endcomponent
                    </div>

                    <div class="col-md-6">
                        @component('dashboard.layouts.components.inputTag')
                            @slot('name','name')
                            @slot('label','اسم المستخدم')
                            @slot('icon','fas fa-user')
                            @slot('type','text')
                            @slot('value')   @if(isset($user)) {{$user->name}}  @endif @endslot
                            @slot('placeHolder','اسم المستخدم')
                        @endcomponent
                    </div>


                    <div class="col-md-6">
                        @component('dashboard.layouts.components.inputTag')
                            @slot('name','phone')
                            @slot('label','رقم الهاتف ')
                            @slot('icon','fas fa-phone')
                            @slot('type','text')
                            @slot('placeHolder','رقم الهاتف')
                            @slot('value')   @if(isset($user)) {{$user->phone}}  @endif @endslot
                        @endcomponent
                    </div>



                    <div class="col-md-6">
                        @component('dashboard.layouts.components.inputTag')
                            @slot('name','password')
                            @slot('label','الرقم السري')
                            @slot('icon','fas fa-lock')
                            @slot('type','text')
                            @slot('placeHolder','الرقم السري')
                        @endcomponent
                    </div>


                    <div class="col-md-12 mb-1">
                        <a href="#" class="btn btn-primary btn-block" id="submit">حفظ</a>

                    </div>
                </div>
            </form>
            <input type="hidden" id="actionType" value="{{$actionType}}">
            <input type="hidden" id="userId" value="{{isset($user) ?$user->id:''}}">
        </div>
    </div>
    </div>

@endsection



@section('scripts')
<script>


    $('#submit').click(function () {
        let form = $(".form");
        let url = form.attr('action');
        let data = new FormData(form[0]);
            data.append('actionType',$('#actionType').val());
            data.append('userId',$('#userId').val());



        ajaxRequest(url, data, function (response) {

            if (response.status == 400) {
                swal("خطا!", "برجاء التاكد من اضافة كافة البيانات بالطريقة الصحيحة", "warning");
                $("input,select,textarea").removeClass("is-invalid");
                for (let k in response.message)
                    $("input[name=" + k + "],select[name=" + k + "],textarea[name=" + k + "]").addClass("is-invalid");
            } else if (response.status == 200) {
                swal("تم!", "تم الحفظ  بنجاح", "success");
                $("input,select,textarea").removeClass("is-invalid");

                if($('#actionType').val() == "add") $(".form :input").val("");
                oTable.draw();
            }


        });


    });
</script>
@endsection
