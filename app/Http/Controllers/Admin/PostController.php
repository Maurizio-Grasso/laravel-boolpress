<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::all()
        ];
        return view('admin.posts.index' , $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $data = [
            'tags' => $tags
        ];
        return view('admin.posts.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Qui le validation

        $data = $request->all();
        
        $new_post = new Post;

        $new_post->fill($data);

        $new_post->slug = Str::slug($new_post->title);
        $new_post->user_id = Auth::id();
        
        $new_post->save();

        if(array_key_exists('tags' , $data)) {
            $new_post->tags()->sync($data['tags']);
        }
        
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id' , $id)->first();

        if(!$post){
            abort(404);
        }

        $data = [
            'post' => $post
        ];

        return view('guest.posts.show' , $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id' , $id)->first();
        
        $data = [
            'post' => $post ,
            'tags' => Tag::all()
        ];
        
        return view('admin.posts.edit' , $data);
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
        
        // Qui le validation

        $data = $request->all();

        $post = Post::where('id' , $id)->first();

        $post -> update($data);

        if(array_key_exists('tags' , $data)) {
            $post->tags()->sync($data['tags']);
        }
        else {
            $post->tags()->sync([]);
        }

        return redirect()-> route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id' , $id)->first();
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
