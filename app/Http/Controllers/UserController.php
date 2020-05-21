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
        // $adminRole = Role::create(['name' => 'Admin']);
        // $supervisorRole = Role::create(['name' => 'Supervisor']);

        // $upCus = Permission::create(['name' => 'update customer']);
        // $delCus = Permission::create(['name' => 'delete customer']);

        // $upSer = Permission::create(['name' => 'update service']);
        // $delSer = Permission::create(['name' => 'delete service']);

        // $upUser = Permission::create(['name' => 'update user']);
        // $delUser = Permission::create(['name' => 'delete user']);

        // $role = Role::findById(1);
        // $role2 = Role::findById(2);
        // $permission1 = Permission::findById(1);
        // $permission2 = Permission::findById(2);
        // $permission3 = Permission::findById(3);
        // $permission4 = Permission::findById(4);
        // $permission5 = Permission::findById(5);
        // $permission6 = Permission::findById(6);

        // $role->givePermissionTo($permission1);
        // $role->givePermissionTo($permission2);
        // $role->givePermissionTo($permission3);
        // $role->givePermissionTo($permission4);
        // $role->givePermissionTo($permission5);
        // $role2->givePermissionTo($permission1);
        // $role2->givePermissionTo($permission2);
        // $role2->givePermissionTo($permission3);
        // $role2->givePermissionTo($permission4);
        // $role2->givePermissionTo($permission5);
        // $role2->givePermissionTo($permission6);

        // auth()->user()->update([
        //     'role' => "Supervisor"
        // ]);
        // Auth()->user()->assignRole('Supervisor');


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
        if (auth()->user()->id == $user->id) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,            
            ]);
    
        }else{
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,            
            ]);
    
        }
        
        if (auth()->user()->role == "Admin" && is_null($request->role) ) {
            $user->update([
                'role' => null,
            ]);
            $user->syncRoles(['']);
        }else{
            $user->update([
                'role' => $request->role,
            ]);
            $user->syncRoles([$request->role]);
        }
        
        if (auth()->user()->role == "Supervisor" && is_null($request->role)) {
            $user->update([
                'role' => null,
            ]);
            $user->syncRoles(['']);
        }else{
            $user->update([
                'role' => $request->role,
            ]);
            $user->syncRoles([$request->role]);
        }

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
