<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;

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
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return string
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();

//       return $userSocial->name;
        $findUser = User::where('email',$userSocial->email)->first();
        if ($findUser){
            Auth::login($findUser);
            return redirect()->route('home');
//            return 'old user';
        }else{
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($user);
            return redirect()->route('home');
        }

    }

    /* login with google*/
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return string
     */
    public function handleProviderCallbackGoogle()
    {
        $userGoogle = Socialite::driver('google')->stateless()->user();
//       return $userGoogle->name;
        $findUserGoogle = User::where('email',$userGoogle->email)->first();
        if($findUserGoogle){
            Auth::login($findUserGoogle);
            return redirect()->route('home');
//            return 'Welcome To Google Login User';
        }else{
            $user = new User;
            $user->name = $userGoogle->name;
            $user->email = $userGoogle->email;
            $user->password = bcrypt(123456789);
            $user->save();
            Auth::login($user);
            return redirect()->route('home');
        }
    }
}
