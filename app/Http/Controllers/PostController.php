<?php

namespace App\Http\Controllers;

use App\Post;
use App\CategoriePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoriePost::all();
        $posts = Post::latest()->paginate(4);
        return view('posts.index', compact(['posts', 'categories']));
    }

    /**
     * redirige vers l'index du blog avec en parametre la categorie
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategorie($categorie)
    {
        $categories = CategoriePost::all();
        $posts = Post::where('categorie_id', $categorie)->latest()->paginate(4);
        
        return view('posts.index', compact(['posts', 'categories']));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( Gate::denies('permission-users')) {
            return redirect()->route('blog');
        } 

        $categories = CategoriePost::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data =  request()->validate([
            'title' => 'required|min:5|max:200',
            'content' => 'required|min:10',
            'image' => 'required|image',
            'categorie' => 'integer'
        ]);


        $destination_path = 'public/posts';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs($destination_path, $image_name);
        Auth()->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image_name,
            'categorie_id' => $request->categorie,
        ]);

        return redirect()->route('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = CategoriePost::all(); //Toutes les categories
        $posts = Post::latest()->paginate(3); // les 3 derniers posts
         return view('posts.show', compact(['post', 'categories', 'posts']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ( Gate::denies('permission-users')) {
            return redirect()->route('blog');
        } 

        $categories = CategoriePost::all();
        return view('admin.posts.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ( Gate::denies('permission-users')) {
            return redirect()->route('blog');
        } 

        $data =  request()->validate([
            'title' => 'required|min:5|max:200',
            'content' => 'required|min:10',
            'image' => 'image',
            'categorie_id' => 'integer'
        ]);

            if(request()->hasFile('image'))
            {
                $destination_path = 'public/posts';
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs($destination_path, $image_name);
                $data['image'] = $image_name;
            }
            $post->update($data);


            return redirect()->route('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if ( Gate::denies('permission-users')) {
            return redirect()->route('blog');
        }         

        Storage::delete($post->image);
        $post->forceDelete();

        return redirect()->route('blog');
    }
}
