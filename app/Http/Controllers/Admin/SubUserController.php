<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SubUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Sub Users-open|Sub Users-view|Sub Users-create|Sub Users-edit|Sub Users-delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Sub Users-create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Sub Users-edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Sub Users-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $user = User::latest()->get();

        return view('Admin.user.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('Admin.user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 

      
        $validated=$request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'roles' => 'required',
        ]);
       
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

       
        $roleId = intval($request->roles); // Convert the role ID to an integer

        $role = Role::find($roleId);
        if ($role) {
            $user->syncRoles($role);
        } else {
            // Handle the error, e.g., return an error response if the role doesn't exist
        }

        return redirect()->route('subuser.index')->with('success','product Added Successfully');
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
    public function edit($id)
    {

        $user = User::findOrFail($id);

        $role = Role::get();
        $user->roles;

        return view('Admin.user.edit', ['user' => $user, 'roles' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
     
        $user = User::findorFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
          
        ]);

        if ($request->password != null) {
            $request->validate([
                'password' => 'required'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        $user->update($validated);
        $roleId = intval($request->roles); // Convert the role ID to an integer

        $role = Role::find($roleId);
        if ($role) {
            $user->syncRoles($role);
        } else {
            // Handle the error, e.g., return an error response if the role doesn't exist
        }
        return redirect()->route('subuser.index')->withSuccess('User updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->withSuccess('user deleted !!!');
    }
}
