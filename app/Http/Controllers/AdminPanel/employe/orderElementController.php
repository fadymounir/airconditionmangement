<?php

namespace App\Http\Controllers\AdminPanel\employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
class orderElementController extends Controller
{
    public function getRow(Request $request)
    {
        return (string)view('employe.orderElement.orderElementRow', ['id' => $request->rowId]);
    }


}
