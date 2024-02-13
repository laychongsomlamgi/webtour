<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Role;
class RoleController extends Controller
{
    //
    public function index(){
        $role = Role::all();
        return view('admin.role.index', compact('role'));
    }
    public function create(){
        return view('admin.role.create');
    }
    public function store(Request $request){
        $role = Role::query()->create([
            'role_name' => $request->role_name
        ]);
        return redirect()->route('role.index');
    }
    public function edit($id){
        $role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));
    }
    public function update($id, Request $request){
        $role = Role::findOrFail($id);
        $role->fill($request->all());
        $role->save();
        return redirect()->route('role.index');
    }
    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index');
    }
}
