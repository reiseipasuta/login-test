<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class MainController extends Controller
{
    public function top ()
    {
        $contents = Content::all();

        return view('top')
            ->with(['contents' => $contents]);
    }

    public function create (Request $request)
    {
        $content = new Content();
        $content->title = $request->title;
        $content->body = $request->body;
        $content->save();

        return redirect()
            ->route('top');

    }

    public function contents (Content $content)
    {
        return view('contents')
            ->with(['content' => $content]);
    }

}
