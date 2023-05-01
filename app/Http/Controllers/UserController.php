<?php

namespace App\Http\Controllers;

use App\User;
// use App\Role;
// use App\Permission;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function __construct()
    {   
        // $this->middleware('role:admin')->only(['index']);
        // $this->middleware('permission:show')->only(['show']);

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        if ($request->ajax()) {
           
             $roles = Role::where('id',$request->role_id)->first();
             $permissions = $roles->permissions;
             return $permissions;
        }
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        $user->save();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }


        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    
        return view('admin.user.show' , compact('user') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $userRole = $user->roles->first();
        // dd($rolePermissions);
        if($userRole != null){
            $rolePermissions = $userRole->allRolePermissions;
            
            
        }else{
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;
        // dd($userRole);

        
        return view('admin.user.edit' , compact('user','roles', 'userRole','userPermissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        // dd($request);

        $request->validate([
            'name' => 'required|max:255',

        ]);  
        
        $user->name = $request->name;
        $user->email = $request->email;

       if ($request->password != null) {
           $user->password = hash::make($request->password);
       }
        
        $user->save();

        
        $user->roles()->detach();
        $user->permissions()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect('/users');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();

        return redirect('/users');
    }
}
