<div class="col-md-12">
    <div id="accordion">
        <div class="card">
            <div class="card-header alert alert-primary" id="headingOne" data-toggle="collapse"
                 data-target="#collapseOne"
                 aria-expanded="false" aria-controls="collapseOne">
                <h5 class="mb-0 pull-right">
                    العمليات علي السجلات<i class="fa fa-calendar-times"></i>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @component('dashboard.layouts.components.inputTag')
                                @slot('type','date')
                                @slot('label','السجلات باليوم')
                                @slot('icon','fas fa-clock')
                                @slot('name','is_closed')
                                @slot('class','globalDraw')
                            @endcomponent
                        </div>


                        <div class="col-md-6">
                            @component('dashboard.layouts.components.selectTag')
                                @slot('label','الفني')
                                @slot('icon','fas fa-user-cog')
                                @slot('name','userId')
                                @slot('class','globalDraw')
                                @slot('options')
                                    <option value="all">...</option>
                                    @foreach(\App\User::where('type','employe')->get() as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
