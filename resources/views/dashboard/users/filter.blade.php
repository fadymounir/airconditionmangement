<div class="col-md-12">
    <div id="accordion">
        <div class="card">
            <div class="card-header alert alert-primary" id="headingOne" data-toggle="collapse"
                 data-target="#collapseOne"
                 aria-expanded="false" aria-controls="collapseOne">
                <h5 class="mb-0 pull-right">
                    العمليات علي المستخدمين<i class="fa fa-calendar-times"></i>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <a class="btn btn-success ml-1 text-light" target="_blank"
                           href="{{route('adminpanel.users.addEditUsers')}}">
                            <i class="fa fa-user-plus"></i> اضافة مستخدم جديد </a>


                        <a class="btn btn-primary ml-1 text-light" onclick="faqsAction('activeUsers')">
                            <i class="fa fa-check-circle"></i> تفعيل المستخدمين المحددة </a>


                        <a class="btn btn-warning ml-1 text-light" onclick="faqsAction('disActiveUsers')">
                            <i class="fa fa-calendar-times"></i> تعطيل المستخدمين المحددة </a>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
