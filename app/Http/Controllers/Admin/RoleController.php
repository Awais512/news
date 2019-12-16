<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Roles';
        $roles = Role::all();
        return view('admin.roles.list', compact('page_name', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Roles Create';
        $permission = Permission::pluck('name', 'id');
        return view('admin.roles.create', compact('page_name', 'permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required|array',
            'permission.*' => 'required|string'
        ], [
            'name.required' => 'Name Field is Required',
            'permission.required' => 'You must select permission',
            'permission.*.required' => 'You must select a permission'
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        foreach ($request->permission as $value) {
            $role->attachPermission($value);
        }
        return redirect(route('admin.role.list'))->with('success', 'Role Created Successfully');
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
        $role = Role::findOrFail($id);
        $permission = Permission::pluck('name', 'id');
        $selectedPermission = DB::table('permission_role')->where('permission_role.role_id', $id)->pluck('permission_id')->toArray();
        return view('admin.roles.edit', compact('role', 'permission', 'selectedPermission'));
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required|array',
            'permission.*' => 'required'
        ], [
            'name.required' => 'Name Field is Required',
            'permission.required' => 'You must select permission',
            'permission.*.required' => 'You must select a permission'
        ]);
        $role =  Role::findOrFail($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        DB::table('permission_role')->where('role_id', $id)->delete();
        foreach ($request->permission as $value) {
            $role->attachPermission($value);
        }
        return redirect(route('admin.role.list'))->with('success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
