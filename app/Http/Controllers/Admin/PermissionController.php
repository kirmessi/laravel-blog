<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()


    {
        $permissions = Permission::all();
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.permission');
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

        'name' => 'required|max:50|unique:permissions',
        'for' => 'required',  
         ]);

       $permission = new Permission;
       $permission->name = $request->name;
       $permission->for = $request->for;
       $permission->save();
       session()->flash('message','Permission Created Successfully');
       return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $permissions = Permission::find($id);
        return view('admin/permission/edit', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
         $permission = Permission::find($permission->id);
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission = Permission::find($permission->id);
        $this->validate($request,[

        'name' => 'required',
        'for' => 'required',
      
        ]);

       $permission->name = $request->name;
       $permission->for = $request->for;
       $permission->save();

       session()->flash('message','Permission Updated Successfully');
       return redirect(route('permission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
       Permission::where('id',$permission->id)->delete();
        session()->flash('message','Permission Deleted Successfully');
        return redirect(route('permission.index'));   
    }
}
