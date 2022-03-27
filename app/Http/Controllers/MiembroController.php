<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MiembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $miembros = User::paginate(10);
       return view('admin.miembros.index', compact('miembros'));
    }

 
    public function create()
    {
        $roles = Role::all();
        return view('admin.miembros.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rol = Role::find($request['rol_id']);
        $passwordHash = Hash::make($request['password']);
        $user = User::create([
            "name"=>$request['name'],
            "email"=>$request['email'],
            "password"=>$passwordHash
        ])->assignRole($rol->name);
            $user->perfil()->create();

        return redirect()->route('miembro.index')->with('mensaje','Miembro con rol '.$rol->name.' agregado');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
