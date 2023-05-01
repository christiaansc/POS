<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->get();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
         return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Role $role)
    {
        // dd($request->roles_permissions);
                $role->name = $request->role_name;
                $role->guard_name = $request->role_slug;
                $role->save();

                $listOfPermissions = explode(',', $request->roles_permissions);//create array from separated/coma permissions
                
                foreach ($listOfPermissions as $permission) {
                    $permissions = new Permission();
                    $permissions->name = $permission;
                    $permissions->guard_name = strtolower(str_replace(" ", "-", $permission));
                    $permissions->save();
                    $role->permissions()->attach($permissions->id);
                    $role->save();
                }   

                return redirect('/roles');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->name = $request->role_name;
        $role->guard_name = $request->role_slug;
        
        
        $role->save();

        $role->permissions()->delete();
        $role->permissions()->detach();

        $listOfPermissions = explode(',', $request->roles_permissions);//create array from separated/coma permissions
        
                
        foreach ($listOfPermissions as $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->guard_name = strtolower(str_replace(" ", "-", $permission));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();
        }  


        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();

        return redirect('/roles');
    }
}
