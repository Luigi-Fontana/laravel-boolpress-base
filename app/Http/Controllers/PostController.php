<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index() {
         $posts = Post::all();
         return view('posts.index', compact('posts'));
     }
     public function published() {
         $postsPublished = Post::where('published', '1')->get();
         return view('posts.published', compact('postsPublished'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now()->format('Y-m-d-H-i-s');
        $data['slug'] = Str::slug($data['title'] , '-') . $now;

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.create')
                ->withErrors($validator)
                ->withInput();
        }

        $post = new Post;

        if(empty($data['img'])) {
            unset($data['img']);
        }

        $post->fill($data);
        $saved = $post->save();

        if (!$saved) {
            return redirect()->route('posts.create')
                ->with('failure', 'Post non inserito');
        }

        return redirect()->route('posts.index')
            ->with('success', 'Post ' . $post->id . ' inserito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(empty($post)){
            abort('404');
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(empty($post)){
            abort('404');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(empty($post)){
            abort('404');
        }

        $data = $request->all();
        $now = Carbon::now()->format('Y-m-d-H-i-s');
        $data['slug'] = Str::slug($data['title'] , '-') . $now;

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.edit')
                ->withErrors($validator)
                ->withInput();
        }

        if(empty($data['img'])) {
            unset($data['img']);
        }

        $post->fill($data);
        $updated = $post->update();

        if (!$updated) {
            return redirect()->route('posts.edit', $id)
                ->with('failure', 'Post non aggiornato');
        }

        return redirect()->route('posts.show', $slug)
            ->with('success', 'Post aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $deleted = $post->delete();

        if (!$deleted) {
            return redirect()->back()->with('failure', 'Post non Eliminato');
        }

        return redirect()->route('posts.index')
            ->with('success', 'Post ' . $id . ' Eliminato');
    }
}
