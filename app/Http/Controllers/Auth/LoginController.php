<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Request as RequestGetIP;
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
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $checkblock = User::select('block')->where('name', $request->username)->value('block');

        if($checkblock == 1){
          return  redirect('/')->with('error_block', 1);
          die;
        }

        //$checadmin = User::select('ffadminprivgg')->where('name', $request->username)->value('ffadminprivgg');

        // if($checadmin == 'YESSUKAPRO' or $checadmin == 'YESSUKA') {

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
          User::where('account_id', Auth::user()->account_id)->update(['last_ip' => RequestGetIP::ip()]);
            return redirect()->route('home');
        }else{
            return redirect()->route('login')
                ->with('error','Email или Пароль не верны');
        }
          // }
          // else {
          //     return  redirect('/')->with('error_block', 1);
          //     die;
          // }
    }

}
