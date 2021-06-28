<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

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
    public function LoginAzure()
    {
        return Socialite::driver('azure')->redirect();
    }
    public function AzureCallback()
    {
        $user = Socialite::driver('azure')->user();

        $this->_registerOrLoginUser($user);

        if (Auth::user()->hasRole('writer') || Auth::user()->hasRole('admin')) {
            return redirect()->route('dashboard');
        } else {
            return redirect('/');
        }

    }
    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->getName();
            $user->email = $data->getEmail();
            $user->provider_id = $data->getId();
            $user->avatar = 'https://cambodiaict.net/wp-content/uploads/2019/12/computer-icons-user-profile-google-account-photos-icon-account.jpg';
            $user->save();
        }
        if(User::get()->count()==1 && Role::get()->count() == 0){
            Role::create(['name'=>'admin']);
            Role::create(['name'=>'writer']);

            $user->assignRole('admin');
        }
        // elseif (User::get()->count() > 1) {
        //     $user->assignRole('none');
        // }

        Auth::login($user);

    }
}
