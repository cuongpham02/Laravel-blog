<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::all();
        return view('admin.roles.create')->with(compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:roles,name|max:100',
        ]);
        $data = $request->all();
        try {
            DB::beginTransaction();
            $new_role = new Role;   
            $new_role->name = $request->name;
            $new_role->save();
            $new_role->permissions()->attach($request->permission);
            DB::commit();
            return redirect()->route('admin.show-role')->with('message','Add role success!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error:' . $exception->getMessage() . $exception->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($id);
        $permission_role = DB::table('permission_role')->where('role_id', $id)->pluck('permission_id');
        return view('admin.roles.edit')->with(compact('permissions', 'role', 'permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|unique:roles,name,' . $id . ',id|max:100',
        ]);
        $data = $request->all();
        try {
        DB::beginTransaction();
            $role =Role::findOrFail($id);
            $role->update($data);
            DB::table('permission_role')->where('role_id', $id)->delete();

            $role->permissions()->attach($request->permission);
        DB::commit();    
            return redirect()->route('admin.show-role')->with('message','Update role success');
        } catch (\Exception $exception) {
            DB::rollBack();
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if($role){
            $role->permissions()->detach();
            $role->users()->detach();
            $role->delete();
        }
        return redirect()->route('admin.show-role')->with('message','Delete role success!');
    }
}
