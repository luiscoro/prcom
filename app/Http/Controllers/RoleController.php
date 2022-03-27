<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $roles = Role::get();
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        //
    
        return view('admin.roles.create');
    }

   
    public function store(Request $request)
    {
        $role = Role::create(
            ["name"=>$request['nombre']]
        );
        // $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index')->with('mensaje','Rol agregado');

    }

  
    public function show(Role $role)
    {
        //
        return view('admin.role.show', compact('role'));
    }

  
    public function edit(Role $role)
    {
        $permisos = Permission::get();
        return view('admin.role.edit',compact('role','permisos'));
    }

  
    public function update(Request $request, $id)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
