<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function dashboard()
    {
        $contents = Content::all();

        return view('dashboard')
            ->with(['contents' => $contents]);
    }


    public function top ()
    {
        $contents = Content::all();

        return view('top')
            ->with(['contents' => $contents]);
    }

    public function create (Request $request)
    {
        $content = new Content();
        $content->user_id = Auth::id();
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

    public function change(Content $content)
    {


        return view('change')
            ->with(['content' => $content]);
    }

    public function edit(Request $request, Content $content)
    {
        if ($content->user_id !== Auth::id()){
            return view('error')
                ->with(['error' => 'ログインしてください']);
        }

        $content->title = $request->title;
        $content->body = $request->body;
        $content->save();

        return redirect()
            ->route('contents', $content);
    }

    public function delete(Content $content)
    {
        if ($content->user_id !== Auth::id()){
            return view('error')
                ->with(['error' => 'ログインしてください']);
        }

        $content->delete();

        return redirect('top');
    }

}
