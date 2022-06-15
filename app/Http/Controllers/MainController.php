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
        // $content->good = 0;
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

    // public function good(Content $content)
    // {
    //     $content->good ++;
    //     $content->save();

    //     return redirect()
    //         ->route('contents', $content);
    // }

    public function follow(Content $content)
    {
        auth()->user()->follows()->attach($content->user_id);

        return redirect()
            ->route('contents', $content);
    }

    public function unfollow(Content $content)
    {
        auth()->user()->follows()->detach( User::find($content->user_id) );

        return redirect()
            ->route('contents', $content);
    }

    public function followlist()
    {
        $users = auth()->user()->follows()->get();

        return view('follow')
            ->with(['users' => $users]);
    }

    public function followerlist()
    {
        $users = auth()->user()->followers()->get();

        return view('follower')
            ->with(['users' => $users]);
    }

    public function favorite(Content $content)
    {
        auth()->user()->favorites()->attach($content->id);

        return redirect()
            ->route('contents', $content);
    }

    public function unfavorite(Content $content)
    {
        auth()->user()->favorites()->detach($content->id);

        return redirect()
            ->route('contents', $content);
    }

    public function favoriteList()
    {
        $lists = Auth::user()->favorites()->get();

        return view('favoriteList')
            ->with(['lists' => $lists]);
    }

    public function userPage(User $user)
    {
        $contents = Content::all();

        return view('userPage')
            ->with(['contents' => $contents,'user' => $user]);
    }
}
