@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <a href="{{route('employe.Installation.index')}}" class="btn btn-primary btn-block"> <i class="fas fa-fan fa-5x"></i>
                            <p style="font-size:30px;">Installation</p></a>
                        <a href="{{route('employe.Maintenance.index')}}" class="btn btn-danger btn-block"> <i class="fas fa-cogs fa-5x"></i>
                            <p style="font-size: 30px;">Maintenance</p></a>
                            <a href="{{route('employe.Pipes.index')}}" class="btn btn-success btn-block"> <i
                                class="fas fa-expand fa-5x"></i>
                            <p style="font-size: 30px;">Pipes Extension</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
