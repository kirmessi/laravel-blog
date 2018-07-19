<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\tag;
use Illuminate\Http\Request;


class TagController extends Controller
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
        $tags = tag::all();
        return view('admin/tag/index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin/tag/tag');
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

        'slug' => 'required',

        ]);

       $tag = new tag;
       $tag->name = $request->name;
       $tag->slug = $request->slug;
       $tag->save();

       session()->flash('message','Tag Created Successfully');
       return redirect(route('tag.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $tag = tag::find($id);
        return view('admin/tag/edit', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $tag = tag::find($id);
        return view('admin/tag/edit', compact('tag'));
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
        $tag = tag::find($id);
        $this->validate($request,[

        'name' => 'required',

        'slug' => 'required',

        ]);

       $tag->name = $request->name;
       $tag->slug = $request->slug;
       $tag->save();

       session()->flash('message','Tag Updated Successfully');
       return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = tag::find($id);
        $tag->delete();
        session()->flash('message','Tag Deleted Successfully');
        return redirect(route('tag.index'));          
    }
}
