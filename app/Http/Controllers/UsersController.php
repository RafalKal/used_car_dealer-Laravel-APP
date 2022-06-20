<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    //SHOW ALL USERS
    public function getAll(){
        $users = User::paginate(5);
        return view('pages.users.all')->with('users', $users);
    }

    //REMOVE CHOSEN USER
    public function remove($id){
        User::where('id', $id)->delete();
        return $this->getAll();
    }

    //SHOW PROFILE PAGE
    public function profile(){
        $user = auth()->user();
        return view('pages.users.profile', [
            'user' => $user
        ]);
    }

    //SHOW EDIT PROFILE FORM
    public function showProfileEdit(){
        $user = auth()->user();
        return view('pages.users.edit_profile', [
            'user' => $user
        ]);
    }

    //SHOW CHANGE ROLE OF USER FORM
    public function showChangeRole($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('pages.users.change_role', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    //CHANGE ROLE OF USER
    public function changeRole($id, Request $request){
        $user = User::find($id);
        $user->syncRoles($request['role']);
        return $this->getAll();
    }

    //EDIT USER
    public function profileEdit(UpdateUserProfileRequest $request){
        $request->validated();
        $user = User::where('email', $request->email)->first();
        if($user !== null && $user->id !== auth()->user()->id){
            return Redirect::back()->withErrors([
                'email' => 'This email has already been taken',
            ])->withInput();
        }

        $user = User::find(auth()->user()->id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->save();

        return redirect('/profile');
    }

    //REMOVE PROFILE
    public function removeProfile(){
        User::where('id', auth()->user()->id)->delete();
        return redirect('/');
    }
}
