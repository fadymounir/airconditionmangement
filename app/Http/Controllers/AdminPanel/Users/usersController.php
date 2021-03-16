<?php

namespace App\Http\Controllers\AdminPanel\Users;

use App\Http\Controllers\Controller;
use App\Models\UserLog;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;

class usersController extends Controller
{

    public function index()
    {
        if (\request()->ajax()) {
            $users = User::query()->orderBy('id', 'DESC');
            return datatables($users)
                ->addColumn('checkbox_operation', function ($row) {
                    return view('dashboard.layouts.components.checkbox_operation', ['id' => $row->id]);
                })
                ->addColumn('name', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->name]);
                })
                ->addColumn('phone', function ($row) {
                    return view('dashboard.layouts.components.spanTag', ['name' => $row->phone]);
                })
                ->addColumn('type', function ($row) {
                    if ($row->type == "admin") $userType = "مسئول";
                    else if ($row->type == "employe") $userType = "موظف";


                    return view('dashboard.layouts.components.spanTag', ['name' => $userType]);
                })
                ->addColumn('is_active', function ($row) {
                    if ($row->is_active == 1)
                        return view('dashboard.layouts.components.spanTag', ['name' => "مفعل", 'class' => "badge badge-success"]);
                    else if ($row->is_active == 0)
                        return view('dashboard.layouts.components.spanTag', ['name' => "معطل", 'class' => "badge badge-danger"]);

                })
                ->addColumn('orderClosed', function ($row) {
                    if ($row->type != "admin")
                        return $row->ordersClosed();
                })
                ->addColumn('orderOpen', function ($row) {
                    if ($row->type != "admin")
                        return $row->ordersOpen();
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addColumn('updateInfo', function ($row) {
                    return view('dashboard.layouts.components.aTag', ['name' => 'تعديل',
                        'class' => 'btn btn-success editPerson',
                        'blank' => 'blank',
                        'link' => route('adminpanel.users.addEditUsers', ['userId' => $row->id])]);
                })
                ->addColumn('is_logged', function ($row) {
                    if ($row->type != "admin")
                        if ($row->is_loged == 0)
                            if(UserLog::whereNotNull('is_closed')->where('user_id',$row->id)->whereDate('is_closed',Carbon::now())->count() !=0)
                            return view('dashboard.layouts.components.spanTag', ['name' => 'فتح السجل ',
                                'class' => 'btn btn-danger',
                                'onclick' => "openLog(" . $row->id . ")"
                            ]);
                })
                ->make();
        }


        return view('dashboard.users.index');
    }

    public function addEDit($userId = null)
    {

        if ($userId == null) {
            $title = "اضافة مستخدم جديد";
            $actionType = "add";
        } else {
            $title = "تعديل بيانات مستخدم";
            $actionType = "edit";
        }

        $return = ['title' => $title, 'actionType' => $actionType];
        if ($userId != null) $return['user'] = User::find($userId);
        return view('dashboard.users.addEditUser', $return);
    }


    public function additAction(Request $request)
    {

        $validateArray = [
            'name' => 'required|min:3',
            'type' => 'required|in:admin,branchManger,employe',
            'actionType' => 'required|in:add,edit',

        ];

        if ($request->actionType == "add") {
            $validateArray["password"] = 'required|min:8';
            $validateArray["phone"] = 'required|numeric|unique:users,phone';

        }
        if ($request->actionType == "edit") {
            $validateArray["userId"] = "required|integer|exists:users,id";
            $validateArray["phone"] = 'required|numeric|unique:users,phone,' . $request->userId;
        }
        $validate = Validator::make($request->all(), $validateArray);

        if ($validate->fails()) return response()->json(['status' => 400, 'message' => $validate->errors()]);


        if ($request->actionType == "edit")
            $user = User::find($request->userId);
        else $user = new User();


        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->password = Hash::make($request->password);


        if ($request->actionType == "add")
            $user->created_at = Carbon::now();
        $user->save();


        return response()->json(['status' => 200]);
    }


    public function usersActions(Request $request)
    {
        $usersItems = array_map('intval', explode(',', $request->users));
        if ($request->type == "deleteOneUsers" || $request->type == "deleteUsers")
            $userAction = User::whereIn('id', $usersItems)->update(['delated_at' => Carbon::now()]);
        elseif ($request->type == "disActiveUsers")
            $userAction = User::whereIn('id', $usersItems)->update(['is_active' => 0]);
        elseif ($request->type == "activeUsers")
            $userAction = User::whereIn('id', $usersItems)->update(['is_active' => 1]);

        return response()->json(['stauts' => 200]);
    }


    public function openLog(Request  $request){
        // update is_logged in users table
        User::find($request->userId)->update(['is_loged'=>1]);

        // now update the Last log  for this user

        UserLog::where('user_id',$request->userId)->whereNotNUll('is_closed')->orderBy('id','DESC')->first()->update(['is_closed'=>null]);
        return response()->json(['stauts' => 200]);
    }
}
