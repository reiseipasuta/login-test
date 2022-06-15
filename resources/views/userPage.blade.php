<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザーページ</title>
</head>
<body>
    <h2>ユーザーページ</h2>

    <ul>
        <li>名前：{{$user->name}}</li>
        <li>ユーザーID：{{$user->id}}</li>
    </ul>
        <h3>投稿一覧</h3>
        <ul>
            @foreach ($contents as $content)
                @if ($content->user_id === $user->id)
                    <li><a href="{{ route('contents', $content) }}">{{$content->title}}</a></li>
                @endif
            @endforeach
        </ul>

        <a href="{{ route('dashboard') }}">戻る</a>

</body>
</html>
