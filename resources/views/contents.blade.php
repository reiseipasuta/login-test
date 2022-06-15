<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>コンテンツ</title>
</head>
<body>
<p>ID：{{ $content->user_id }}</p>
@if (Auth::user()->follows()->where('user_id', $content->user_id)->exists())
    <form action="{{ route('unfollow', $content) }}" method="post">
        @csrf
        <button>フォローを外す</button>
    </form>
@else
    <form action="{{ route('follow', $content) }}" method="post">
        @csrf
        <button>フォローする</button>
    </form>
@endif

@if(Auth::user()->favorites()->where('content_id', $content->id)->exists())
{{-- (Auth::user()->favorites()->where('user_id', Auth::user())->exists())
SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'user_id' in where clause is ambiguous --}}
{{-- ($content->usersFavo()->where('user_id', Auth::user())->exists()) --}}
{{-- いいねを一回できたが、いいねを外すに変わらず、エラー
SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '2' for key 'content_user.user_id' --}}
{{-- ($content->usersFavo()->where('content_id', $content->id)->exists()) --}}
{{-- 上記と同様 --}}
    <form action="{{ route('unfavorite', $content) }}" method="post">
        @csrf
        <button>いいねを外す</button>
    </form>
@else
    <form action="{{ route('favorite', $content) }}" method="post">
        @csrf
        <button>いいねする</button>
    </form>
@endif

<p>タイトル：{{ $content->title }}</p>
<p>内容：{{ $content->body }}</p>

{{-- いいね：{{ $content->good }}
    <form method="post" action="{{ route('good', $content) }}">
        @csrf
        <button>いいねする</button>
    </form> --}}


<h2>コメント</h2>
<ul>
    <li>
        <form action="{{ route('comments', $content) }}" method="post">
            @csrf
            <input type="text" name="body">
            <button>送信</button>
        </form>
    </li>
    @foreach ($content->comments as $comment)
        <li>
            {{ $comment->body }}
        </li>
        @endforeach
</ul>
    @if ($content->user_id === Auth::id())
        <a href="{{ route('change', $content) }}">編集する</a>
        <form method="post" action="{{ route('delete', $content) }}">
            @csrf
            <button>【削除】</button>
        </form>
    @endif

    <a href="{{ route('top') }}">トップへ戻る</a>
</body>
</html>
