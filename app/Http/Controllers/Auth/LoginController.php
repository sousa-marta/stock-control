<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function receiveDataGoogle(){
        $userGoogle = Socialite::driver('google')->user();
        // dd($user);
        $userDb = $this->findOrCreateUser($userGoogle);

        Auth::login($userDb, true); //já redireciona logado

        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($userGoogle){
        //ver primeiro se já tem cadastrado o email do usuário (compara email que está no banco de dados) e pede para retornar primeira ocorrência
        $user = User::where('email', $userGoogle->email)->first();   //where qqr condição, find usa id pra procurar

        if($user){
            return $user;
        }
        //Se não tiver, adiciona:
        $newUser = new User();
        $newUser->name = $userGoogle->name;
        $newUser->email = $userGoogle->email;
        $newUser->img_profile = $userGoogle->avatar;
        $newUser->provider_id = $userGoogle->id;
        $newUser->active = 1; //para dizer que o usuário está ativo;

        $newUser->save();

        return $newUser;
    }
}
