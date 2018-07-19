<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\role;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = admin::all();

       return view('admin/user/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
         return view('admin/user/create',compact('roles'));
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

        'name' => 'required',

        'email' => 'required',

        'password' => 'required',


        ]);

       $user = new admin;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->save();

       session()->flash('message','Admin Created Successfully');
       return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = role::all();
        $user = admin::find($id);
        return view('admin/user/edit', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {   $roles = role::all();
        $user = admin::find($id);
        return view('admin/user/edit', compact('user','roles'));
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
       $user = admin::find($id);
        $this->validate($request,[

        'name' => 'required',

        'email' => 'required',

        'password' => 'required',

        ]);

       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->save();

       session()->flash('message','Admin Updated Successfully');
       return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = admin::find($id);
        $user->delete();
        session()->flash('message','Admin Deleted Successfully');
        return redirect(route('user.index'));       
    }
}
