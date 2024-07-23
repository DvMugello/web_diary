<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('Main.user.index',[
            'title'=>'My Diary',
             'posts'=> Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Main.user.create',[
            'title'=>'Create Diary'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|unique:posts',
            'date'=>'required',
            'body'=>'required'
        ]);

        $validateData['user_id']=auth()->user()->id;

        Post::create($validateData);

        return redirect('/Main')->with('success','New Diary has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('Main.user.show',[
            'title'=>' Diary Show',
            'posts'=> Post::where('user_id', auth()->user()->id)->get(),
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('Main.user.edit',[
            'title'=>'Edit Diary',
            // 'posts'=> Post::where('user_id', auth()->user()->id)->get(),
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //  return request()->all();
        $rules=[
            'title'=>'required|max:255',
            'date'=>'required',
            'body'=>'required'
        ];


        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }
        $validateData=$request->validate($rules);
        $validateData['user_id']=auth()->user()->id;

        Post::where('id',$post->id)->update($validateData);

        return redirect ('/Main')->with('success','Diary has been updated!');
        // $validateData = $request->validate([
        //     'title'=>'required|max:255',
        //     'date'=>'required',
        //     'body'=>'required'
        // ]);
        //  if($request->slug != $post->slug){
        //     $validateData['slug'] = 'required|unique:posts';
        // }

        // $validateData['user_id']=auth()->user()->id;

        // // Post::update($validateData);
        // Post::where('id',$post->id)->update($validateData);

        // return redirect('/Main')->with('success','Diary has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Post::destroy($post->id);

        // return redirect ('/Main')->with('success','Diary has been deleted!');

        Post::destroy($post->id);
        return redirect ('/Main')->with('success','Diary has been deleted!');
    }
}
