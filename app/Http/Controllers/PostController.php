<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'tags'          => Tag::all(),
            'categories'    => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post                   = new Post;
        $post->title            = $request->title;
        $post->slug             = Str::slug($request->title);
        $post->body             = $request->body;
        $post->author_id        = Auth::user()->id;
        $post->category_id      = $request->category_id;
        $post->published_at     = $request->published_at;
        $post->meta_description = $request->meta_description;

        if ($request->hasFile('cover_image')) {
            $image          = $request->file('cover_image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = explode('.', $imageName)[0];
            $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location       = storage_path('app/public/images/' . $fileExtention);
            Image::make($image)->resize(1200, 630)->save($location);

            $post->cover_image = $fileExtention;
        };

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Post created succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags           = Tag::all();
        $categories     = Category::all();
        $oldTags        = $post->tags->pluck('id')->toArray();

        return view('dashboard.posts.edit', compact('post', 'tags', 'categories', 'oldTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title            = $request->title;
        $post->slug             = Str::slug($request->title);
        $post->body             = $request->body;
        $post->author_id        = Auth::user()->id;
        $post->category_id      = $request->category_id;
        $post->published_at     = $request->published_at;
        $post->meta_description = $request->meta_description;

        if ($request->hasFile('cover_image')) {
            $oldFileName    = $post->cover_image;
            $image          = $request->file('cover_image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = explode('.', $imageName)[0];
            $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location       = storage_path('app/public/images/' . $fileExtention);
            Image::make($image)->resize(1200, 630)->save($location);
            $post->cover_image = $fileExtention;

            File::delete(storage_path('app/public/images/' . $oldFileName));
        };

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Post successfully updated!');
    }
}
