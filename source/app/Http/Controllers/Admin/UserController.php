<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $users = User::where('name', 'like', '%'.request('search').'%')
            ->orWhere('email', 'like', '%'.request('search').'%')->paginate(20);
        } else {
            $users = User::orderBy('id','DESC')->paginate(6);
        }
        return view('admin.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        User::create($data);
        return redirect('/admin/user/show-user')->with('message','Create User Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $user = User::findOrFail($id);
        return view('admin.users.edit')->with(compact('user'));
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
        $data = $request->all();
        $user = User::findOrFail($id);
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }
        $user->update($data);
        return redirect()->route('admin.show-user')->with('message','Update User Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::findOrFail($id)->delete();
        return redirect()->back()->with('message','Delete User Success!');
    }

    public function getRoles(Request $request, $id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        $role_user = DB::table('role_user')->where('user_id', $id)->pluck('role_id');
        return view('admin.users.get_role')->with(compact('roles','role_user','user'));
    }

    public function updateRoleUser(Request $request, $id)
    {
        $data = $request->all();
        try {
        DB::beginTransaction();
            $user = User::findOrFail($id);
            DB::table('role_user')->where('user_id', $id)->delete();

            $user->roles()->attach($request->role);
        DB::commit();    
            return redirect()->route('admin.show-user')->with('message','Update Role User Success!');
        } catch (\Exception $exception) {
            DB::rollBack();
        }    
    }
}
