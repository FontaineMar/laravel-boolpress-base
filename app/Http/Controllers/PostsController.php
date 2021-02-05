<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Categorie;
use App\Information;
use App\Tag;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
        
        $posts = Post::paginate(30);
        
        return view('boolpress.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categorie::all();
        $tags = Tag::all();
        return view('boolpress.create' , compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->all();
        $newPost = Post::firstOrCreate([
            'title' => $date['title'],
            'author' => $date['author'],
            'category_id' => $date['category_id']
        ]);

        $newPost->save();

        $newInfo = Information::firstOrCreate([
            'post_id' => $newPost->id,
            'slug' => Str::slug($newPost->title),
            'description' => $date['description']
        ]);

        $newInfo->save();

        foreach($date['tags'] as $idTag){
            $newPost->tags()->attach($idTag);
        }

        return view('boolpress.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::all();
        $tags = Tag::all();
        $post  = Post::find($id);

        return view('boolpress.edit', compact('post','categories','tags'));
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

        $date = $request->all();
        $post = Post::find($id);
        $post->update([
            'title' => $date['title'],
            'author' => $date['author'],
            'category_id' => $date['category_id']
        ]);

        $post->information->update([
            'description' => $date['description'] 
        ]);
        
        
        return redirect()->route('boolpress.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Information::destroy($id);
        Post::destroy($id);

        
           return redirect()->route('boolpress.index');
    
    }
}
