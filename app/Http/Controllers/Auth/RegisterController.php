<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request as RequestGetIP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Cookie\CookieJar;
use Redirect;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/profile';
    //protected $redirectTo = redirect('/')->with('info_register', 1);


    public function showRegistrationForm(Request $request)
        {
          if ( $request->input('inviteref') ){
            $user = User::where('name', '=', $request->input('inviteref'))->first();
              if ($user === null) {
                return Redirect::back()->with('valid_user', 1);
             }
              else{
            $response = new \Illuminate\Http\Response(view('auth.register'));
            $response->withCookie(cookie('referal', $request->input('inviteref'), 1440));
            return $response;
                }
              }
                return view('auth.register');
        }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:6', 'max:31', 'unique:users'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'required|captcha',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      if(Cookie::get('referal') != null){
        $refercount = User::select('refer_count')->where('name', Cookie::get('referal'))->get();
        $refercount = $refercount[0]->refer_count;
        $refercountadd = ($refercount + 1);
        User::where('name', Cookie::get('referal'))->update(['refer_count' => $refercountadd]);
      }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'passwd' => Hash::make($data['password']),
            'ip' => RequestGetIP::ip(),
            'last_ip' => RequestGetIP::ip(),
            'passwordgame' => md5('2011'.$data['password']),
            'auth_ok' => '1',
            'block' => '1',
            'rub' => '0',
            'rub_all' => '0',
            'refer_sale' => '20',
            'refer_count' => '0',
            'refer_by' => Cookie::get('referal') ?? "false",
            'server_idx_offset' => '1',
            'gift_guild' => 'false',

        ]);
    }
}
