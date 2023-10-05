<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Redirect;
use Revolution\Line\Facades\Bot;
use Illuminate\Http\Request;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/vote_kan_index';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Line login
    public function redirectToLine(Request $request)
    {
        $request->session()->put('redirectTo', $request->get('redirectTo'));

        return Socialite::driver('line')->redirect();
    }

    public function redirectToLine_vote_kan_login(Request $request, $go_to)
    {   
        if($go_to == "register_stations"){

            $re_to = 'http://itkanpao.dyndns.org/vote_kan_2023/public/vote_kan_stations/create' ;

        }else if($go_to == "submit_scores"){

            $re_to = 'http://itkanpao.dyndns.org/vote_kan_2023/public/vote_kan_scores/create' ;

        }

        $request->session()->put('check_officer', 'officer');
        $request->session()->put('redirectTo', $re_to);

        return Socialite::driver('line')->redirect();
    }

    // Line callback
    public function handleLineCallback(Request $request)
    {
        $user = Socialite::driver('line')->stateless()->user();
        
        $check_officer = $request->session()->get('check_officer');

        // register general
        $this->_registerOrLoginUser($user , $check_officer);
        
        $value = $request->session()->get('redirectTo');
        $request->session()->forget('redirectTo');

        return redirect()->intended($value);

    }

    protected function _registerOrLoginUser($data, $check_officer)
    {
        //GET USER 
        $user = User::where('provider_id', '=', $data->id)->first();
        // print_r($data) ;

        if (!$user) {
            //CREATE NEW USER
            $user = new User();
            $user->name = $data->name;
            $user->provider_id = $data->id;
            $user->username = $data->name;

            if (!empty($data->email)) {
                $user->email = $data->email;
            }

            if (empty($data->email)) {
                $user->email = "กรุณาเพิ่มอีเมล";
            }

            // AVATAR
            if (!empty($data->avatar)) {
                $user->avatar = $data->avatar;
            }
            else if (empty($data->avatar)) {
                $user->avatar = null;
            }

            $user->save();
        }else{
            // AVATAR
            if (!empty($data->avatar)) {
                $user->avatar = $data->avatar;
            }
            else if (empty($data->avatar)) {
                $user->avatar = null;
            }
            
            DB::table('users')
                ->where('provider_id', $data->id)
                ->update([
                    'name' => $data->name,
                    'avatar' => $user->avatar,
                ]);
        }

        //LOGIN
        Auth::login($user);
        // $data_user = Auth::user();

        if ($check_officer == 'officer') {
            $data_user = Auth::user();

            if(empty($data_user->role)){
                DB::table('users')
                    ->where([ 
                            ['provider_id', $data_user->provider_id],
                        ])
                    ->update(['role' => 'officer']);
            }
        }

    }
}
