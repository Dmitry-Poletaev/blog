<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;


class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        //делаем валидацию данных
        $validated = $request->validated();
        //создаем запись в дб
        $comment = new Comment();
        $comment->post_id = $request->get('post-id');
        $comment->name = $request->get('name');
        $comment->body = $request->get('body');
        $comment->save();

        return redirect()->back()->with('success', 'Комментарий успешно опубликован!');

    }
}
