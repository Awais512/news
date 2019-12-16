<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    public function index()
    {
        $page_name = 'Permissions Page';
        $permissions = Permission::latest()->get();
        return view('admin.permissions.list', compact('permissions', 'page_name'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Name Field is Required',
            'name.alpha_num' => 'This Field accepts alpha numeric Characters'
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect(route('admin.permission.index'))->with('success', 'Permission Created Successfully');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Name Field is Required',
            'name.alpha_num' => 'This Field accepts alpha numeric Characters'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect(route('admin.permission.index'))->with('success', 'Permission Updated Successfully');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->back()->with('success', 'Permission Deleted Successfully');
    }
}
