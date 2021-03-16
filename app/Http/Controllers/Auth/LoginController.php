<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserLog;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)
    {


        /**
         * check the admin is exist
         */
        $admin=User::where('phone',$request->phone)->first();

        if(!isset($admin)) return back()->withErrors(['phone'=>'the phone number is not correct']);
        /**
         * chdck if the password is correct
         */
        if(Hash::check($request->password,$admin->password)  == false)
                return back()->withErrors(['password'=>'the password is not correct']);

         Auth::login($admin);

         if($admin->type !="admin") {

            // chk if the use already have log in the same day and it closed return with contact page
             if(UserLog::whereNotNull('is_closed')->where('user_id',Auth::user()->id)->whereDate('is_closed',Carbon::now())->count() !=0){
                 Auth::user()->update(['is_loged'=>0]);
                 Auth::logout();
                 return redirect('/')->with(['status'=>'errorMsg']);
             }

             Auth::user()->update(['is_loged'=>1]);
             return redirect(route('employe.home.index'));
         }

        return redirect(route('adminpanel.home.index'));
    }


}
