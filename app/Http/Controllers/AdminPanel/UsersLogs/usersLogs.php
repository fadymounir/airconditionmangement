<?php

namespace App\Http\Controllers\AdminPanel\UsersLogs;

use App\Http\Controllers\Controller;
use App\Models\UserLog;
use Illuminate\Http\Request;

class usersLogs extends Controller
{
    public function index(){


        if (\request()->ajax()) {

            $UserLog = UserLog::query()->whereNotNull('is_closed')->orderBy('id', 'DESC');
            $userId = \request('_userId', 'all');
            $is_closed = \request('_is_closed', 'all');

            if($userId !="all") $UserLog=$UserLog->where('user_id',$userId);
            if($is_closed !="all") $UserLog=$UserLog->whereDate('is_closed',$is_closed);


            return datatables($UserLog)
                ->addColumn('checkbox_operation', function ($row) {
                    return view('dashboard.layouts.components.checkbox_operation', ['id' => $row->id]);
                })
                ->addColumn('userName', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->User->name]);
                })
                ->make();
        }



        return view('dashboard.UsersLogs.index');
    }
}
