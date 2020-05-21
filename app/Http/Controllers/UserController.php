<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = $user->all();
        return view('adminlte.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Role $role)
    {

        if(auth()->user()->role != "Supervisor")
        {
            $guardedRoleList = $role->whereNotIn('name',['Supervisor'])->pluck('name', 'id');
        }else{
            $guardedRoleList = $role->all()->pluck('name', 'id');
        }
       
        return view('adminlte.users.edit', compact('user', 'guardedRoleList'));
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
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,            
        ]);

        if (auth()->user()->role == "Admin" && is_null($request->role) ) {
            $user->update([
                'role' => null,
            ]);
            $user->removeRole('Admin');
        }else{
            $user->update([
                'role' => $request->role,
            ]);
            $user->assignRole($request->role);
        }
        
        // //Check if user can update role
        // if ($request->role == "Supervisor" && auth()->user()->role == "Supervisor" ) {
        //     $user->update([
        //         'role' => $request->role,
        //     ]);
        //     $user->assignRole($request->role);

        // }elseif($request->role == "Supervisor" && auth()->user()->role != "Supervisor"){
        //     return redirect()->back()->with('error', "You are not authorized to update user role");
        // }else{
        //     $user->update([
        //         'role' => $request->role,
        //     ]);
        //     $user->assignRole($request->role);
        // }

        return redirect()->back()->with('success', 'User Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
}
