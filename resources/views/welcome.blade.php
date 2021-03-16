@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="text-center">Edris For Air Conditioner</h1>


                    @if(session('status'))
                        <h3 class="text-danger">
                                <p class="text-center">You Finish Your Log Please Contact With The Mangers To Open Your Log or Wait until The Next Day To get Your New Orders With Regards</p>
                        </h3>
                    @endif


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
