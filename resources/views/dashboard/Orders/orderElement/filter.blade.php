<div class="col-md-12">
    <div id="accordion">
        <div class="card">
            <div class="card-header alert alert-primary" id="headingOne" data-toggle="collapse"
                 data-target="#collapseOne"
                 aria-expanded="false" aria-controls="collapseOne">
                <h5 class="mb-0 pull-right">
                    العمليات علي الطلبات<i class="fa fa-calendar-times"></i>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.inputTag')
                                @slot('type','date')
                                @slot('label','الطلبات باليوم')
                                @slot('icon','fas fa-clock')
                                @slot('name','createdAt')
                                @slot('class','globalDraw')
                            @endcomponent
                        </div>


                        <div class="col-md-6">
                            @component('dashboard.layouts.components.selectTag')
                                @slot('label','حالة الطلب')
                                @slot('icon','fas fa-clock')
                                @slot('name','orderStaus')
                                @slot('class','globalDraw')
                                @slot('options')
                                    <option value="all">...</option>
                                    <option value="complete">انتهي</option>
                                    <option value="notComplete">لم تنهي بعد</option>
                                @endslot
                            @endcomponent
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
