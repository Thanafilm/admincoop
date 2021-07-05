<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

use function Symfony\Component\VarDumper\Dumper\esc;

class UserController extends Controller
{
    public function listUser(Request $request)
    {
        $data = User::with('roles')->get();

        return view('usermanage.list', compact('data'));
    }
    public function updateRolesForm($id)
    {
        $user = User::find($id);
        $roles = Role::orderBy('id')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('usermanage.update', compact('user', 'roles', 'userRole'));
    }
    public function updateRoles(Request $request, $id)
    {
        $this->validate($request, [
            'roles' => 'required'
        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return back()
            ->with('success', 'User updated successfully');

    }
    public function UpdateProfile(Request $request)
    {
        $input = $request->all();
        $user = User::find(Auth::user()->id);
        $user->update($input);
        return redirect();
    }
    public function UpdateProfileForm()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id)->get();
            if ($user) {
                return view('usermanage.profile', compact('user'));
            } else return redirect()->back();
        } else return redirect()->back();
    }
    public function hisNews(Request $request)
    {
        $activities = DB::table('users')
            ->join('activity_log','activity_log.causer_id','=','users.id')->get();
        // dd($activities);
        return view('usermanage.history', compact('activities'));
    }
}
