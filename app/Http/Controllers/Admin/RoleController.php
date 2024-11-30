<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:User Roles-open|User Roles-view|User Roles-create|User Roles-edit|User Roles-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:User Roles-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:User Roles-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:User Roles-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        // $role= Role::latest()->get();
    
        // return view('admin.roles.index',['roles'=>$role]);
        $rolesWithPermissions = Role::with('permissions')->latest()->get();

        return view('Admin.roles.index', ['rolesWithPermissions' => $rolesWithPermissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        $menus=Menu::all();
        return view('Admin.roles.create',['permissions'=>$permissions],compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
   
       
        $request->validate(['name'=>'required']);
        $existingRole = Role::where('name', $request->name)->first();

        if ($existingRole) {
            return redirect()->back()->with('error', 'The Role Name already exists');
        }

        $role = Role::create(['name'=>$request->name]);

        $role->syncPermissions($request->permissions);
        
        return redirect()->route('roles.index')->withSuccess('Role created !!!');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permission = Permission::get();
        $role->permissions;
       return view('Admin.roles.edit',['role'=>$role,'permissions' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    { 
      
        $role->update(['name'=>$request->name]);
        $permissionIds = $request->permissions;

        // Find permission models from these IDs
        $permissions = Permission::whereIn('id', $permissionIds)->get();
    
        // Use 'pluck' to extract just the names from the permission models
        $permissionNames = $permissions->pluck('name');
    
        // Sync permissions with the role using permission names
        $role->syncPermissions($permissionNames);
        // $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->withSuccess('Role updated !!!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->withSuccess('Role deleted !!!');
    }
}
