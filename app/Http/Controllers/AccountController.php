<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Model\Role;
use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    //
    public function index(){
        $account = User::join('roles', 'roles.role_id', 'users.role_id')
        ->select(
            'users.id',
            'users.name',
            'users.email',
            'roles.role_name'
        )->get();
        return view('admin.account.index', compact('account'));
    }
    public function edit($id){
        $roles = Role::all();
        $account = User::findOrFail($id);
        return view('admin.account.edit', compact('account', 'roles'));
    }
    public function update($id, AccountRequest $request){
        $user = User::findOrFail($id);
        $user->fill($request->except('password'));
        $user->save();
        return redirect()->route('account.index');
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('account.index');
    }
}
