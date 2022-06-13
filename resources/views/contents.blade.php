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
<p>タイトル：{{ $content->title }}</p>
<p>内容：{{ $content->body }}</p>

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
