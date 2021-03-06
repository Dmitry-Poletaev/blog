<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //делаем валидацию данных
        $validated = $request->validated();
        //создаем запись в дб
        $post = new Post();
        $post->title = $request->get('title');
        $post->author = $request->get('author');
        $post->body = $request->get('body');
        $post->slug = Str::slug($post->title);
        $post->save();

        //переходим на страницу с постом
        return redirect('posts/' . $post->slug)->with('success', 'Пост успешно сохранен!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();

        $comments = Comment::where('post_id',$post->id)->orderBy('created_at','desc')->paginate(10);

        return view('blog.show', compact('post', 'comments'));

 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();

        return view('blog.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $validated = $request->validated();

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->author = $request->get('author');
        $post->slug = Str::slug($post->title);
        $post->body = $request->input('body');
        $post->save();

        return redirect('posts/' . $post->slug)->with('success', 'Пост успешно изменен!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
