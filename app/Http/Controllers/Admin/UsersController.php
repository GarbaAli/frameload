<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin/users/index', compact('users'));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //si il na pas de role admin , alors il est rediriger vers la liste des utilisateurs
       if ( Gate::denies('edit-users')) {
        return redirect()->route('users.index');
       } 

        $roles = Role::all();
        return view('admin.users.edit', compact(array('user', 'roles')) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
            $user->roles()->sync($request->roles); 

            session()->flash('message', 'Mise a jour des role Reussit!');
            return redirect()->route('users.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         //si il na pas de role admin , alors il est rediriger vers la page inde de ladmin
       if ( Gate::denies('delete-users')) {
        return redirect()->route('users.index');
       }


        $user->roles()->detach(); // Detacher ou supprimer les relations qui existe entre user et role 

        $user->delete();

        session()->flash('message', 'Suppression d\'un utilisateur');
        return redirect()->route('users.index');
    }
}
