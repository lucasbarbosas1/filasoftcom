<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }
    public function username()
    {
        return "login";
    }

    public function postEntrar(Request $request)
    {
        $credentials = array(
            'login' => Input::get('login'),
            'password' => Input::get('senha')
        );


        $user = User::where("login",$credentials["login"])->first();

        if(is_null($user))
        {
            return Redirect::to("login")->with('flash_error', "login invalido.")->withInput();
        }

        $check = $user->ativo == "Desativado" ? true:false;

        if($check)
        {
            return Redirect::to("login")->with('flash_error', "Login não ativado.")->withInput();
        }

        else
        {
            if(Auth::attempt($credentials)){
                $request->session()->put("tipo",$user->tipo);
                return Redirect::to("/");
            }
            else
            {
                return Redirect::to("login")->with('flash_error', "login invalido.")->withInput();
            }
        }

    }

}
