<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Permission;
use App\Model\admin\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = role::all();
        return view('admin/role/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
         return view('admin/role/role',compact('permissions'));
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

        'name' => 'required|max:50|unique:roles',

         ]);

       $role = new role;
       $role->name = $request->name;
       $role->save();
       session()->flash('message','Role Created Successfully');
       return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $role = role::find($id);
        return view('admin/role/edit', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $permissions = Permission::all();
         $role = role::find($id);
        return view('admin/role/edit', compact('role','permissions'));
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


        $role = role::find($id);
        $this->validate($request,[

        'name' => 'required',
      
        ]);

       $role->name = $request->name;
       $role->save();
       $role->permissions()->sync($request->permission);
       session()->flash('message','Role Updated Successfully');
       return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = role::find($id);
        $role->delete();
        session()->flash('message','Role Deleted Successfully');
        return redirect(route('role.index'));          
    }
   
}
