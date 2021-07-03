<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        if(DB::table('section')->get()->count()==0){
            DB::table('section')->insert([
                ['title' => 'Banner','order'=> 1],
                ['title' => 'News','order'=> 2],
                ['title' => 'Gallery','order'=> 3],
                ['title' => 'Video','order'=> 4],
            ]);
        }
        if(DB::table('category')->get()->count()==0)
        {
            DB::table('category')->insert([
                ['name'=>'สหกิจ','desc'=>'หมวดหมู่สำหรับกิจการโครงการสหกิจศึกษา'],
                ['name'=>'ฝึกงาน','desc'=>'หมวดหมู่สำหรับงานฝึกงานทั่วไป']
            ]);
        }
        if (DB::table('subcategory')->get()->count()==0)
        {
            DB::table('subcategory')->insert([
                ['category_id'=>1,'subname'=>'เอกสารโครงการสหกิจ'],
                ['category_id'=>1,'subname'=>'เอกสารสำหรับนิสิต'],
                ['category_id'=>1,'subname'=>'เอกสารสำหรับอาจารย์'],
                ['category_id'=>1,'subname'=>'เอกสารสำหรับเจ้าหน้าที่'],
                ['category_id'=>1,'subname'=>'เอกสารสำหรับสถานประกอบการ'],
                ['category_id'=>2,'subname'=>'เอกสารฝึกงาน'],
                ['category_id'=>2,'subname'=>'เอกสารสำหรับนิสิต'],
                ['category_id'=>2,'subname'=>'เอกสารสำหรับอาจารย์'],
                ['category_id'=>2,'subname'=>'เอกสารสำหรับเจ้าหน้าที่'],
                ['category_id'=>2,'subname'=>'เอกสารสำหรับสถานประกอบการ'],
            ]);
        }

        Auth::login($user);

    }
}
