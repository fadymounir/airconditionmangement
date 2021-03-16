@extends('layouts.app')

@section('content')
    @include('dashboard.Orders.orderDescriptionModal')
    @include('dashboard.Orders.OrderDetailModal')
    @include('dashboard.Orders.showOrdersMaintenanceProblems')
    @include('employe.addNewPurchases')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color:#21367D; color:#fff">
                        Your Orders

                        <div class="btn-group btn-group-toggle float-right mr-1" data-toggle="buttons">
                            <label class="btn btn-success  globalDraw">
                                <input type="radio" name="orderStatus" value="complete" autocomplete="off"> Complete
                                Order <i
                                    class="fas fa-cogs"></i>
                            </label>
                            <label class="btn btn-danger mr-1 globalDraw">
                                <input type="radio" name="orderStatus" value="notComplete" autocomplete="off"> NoT
                                complete Order <i class="fa fa-cogs"></i>
                            </label>

                            <span onclick="addnewpurchases()" class="btn btn-info">Add New Purchases <i class="fas fa-shopping-cart"></i></span>
                        </div>


                    </div>
                    <div class="card-body">
                        <table id="orders-table" class="table table-responsive table-striped table-bordered">
                            <thead>
                            <tr>

                                <th>Order Number</th>
                                <th>Agent Name</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>Descritpion</th>
                                <th>District</th>
                                <th>quantity</th>
                                <th>Order Detail</th>
                                <th>Action</th>
                                <th>Action At</th>
                                <th>closed At</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection


@push('custom-scripts')
    @include('employe.scripts')
@endpush
