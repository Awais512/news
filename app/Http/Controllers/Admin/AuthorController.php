<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Author';
        $authors = User::where('type', 2)->get();
        return view('admin.author.list', compact('page_name', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Create Author';
        $role = Role::pluck('name', 'id');
        return view('admin.author.create', compact('page_name', 'role'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role.*' => 'required'
        ], [
            'name.required' => 'Name Field is Required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'Email already exist... Choose different',
            'password.min' => 'Password must be atleast 6 characters',
        ]);
        $author = new User();
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->type = 2;
        $author->save();
        foreach ($request->role as $value) {
            $author->attachRole($value);
        }
        return redirect(route('author.index'))->with('success', 'Author Created Successfully');
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
        $page_name = "Edit Author";
        $author = User::findOrFail($id);
        $role = Role::pluck('name', 'id');
        $selectedRole = DB::table('role_user')->where('user_id', $id)->pluck('role_id')->toArray();
        return view('admin.author.edit', compact('page_name', 'author', 'role', 'selectedRole'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
