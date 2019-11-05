<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.user.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('theme.backoffice.pages.user.show', [
            'user' => $user
        ]);
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

    /*
     * Mostrar formulario para asignar roles
     */
    public function assign_role(User $user)
    {
        return view('theme.backoffice.pages.user.assign_role', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /*
     * Asignar los roles en la tabla pivote de la base de datos
     * (por estudiar aún mas)
     */
    public function role_assignment(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->very_permission_integrity();
        return redirect()->route('backoffice.user.show', $user);
    }

    /*
     * Mostrar formulario para asignar permisos
     */
    public function assign_permission(User $user)
    {
        return view('theme.backoffice.pages.user.assign_permission', [
            'user' => $user,
            'roles' => $user->roles
        ]);
    }

    /*
     * Asignar los permisos en la tabla pivote de la base de datos
     * (por estudiar aún mas)
     */
    public function permission_assignment(Request $request, User $user)
    {
        $user->permissions()->sync($request->permissions);
        // mensaje de alerta
        return redirect()->route('backoffice.user.show', $user);
    }
}
