<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->can('users.create')) {
        $roles = role::all();
         return view('admin/user/create',compact('roles'));
        }
     return redirect (route('admin.home'));
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

        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'phone' => 'required|numeric|unique:admins',
        'password' => 'required|string|min:6|confirmed',


        ]);

       $user = new admin;
       $request['password'] = bcrypt($request->password);
       $user = admin::create($request->all());
       $user->roles()->sync($request->role);
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

    {  
        if (Auth::user()->can('users.update')) {
        $roles = role::all();
        $user = admin::find($id);
        return view('admin/user/edit', compact('user','roles'));
        }

        return redirect (route('admin.home'));
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

        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone' => 'required|numeric',

        ]);

      
       $user->name = $request->name;
       $user->email = $request->email;
       $user->status = $request->status;
       $user->phone = $request->phone;
       $user->save();
       $user->roles()->sync($request->role);
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
