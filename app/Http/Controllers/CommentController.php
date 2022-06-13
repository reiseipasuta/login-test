<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Content;

class CommentController extends Controller
{
    public function create (Request $request, Content $content)
    {
        $comment = new Comment();
        $comment->content_id = $content->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route('contents', $content);
    }
}
