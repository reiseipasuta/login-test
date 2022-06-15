<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>フォロー一覧</title>

    <h3>フォロー一覧</h3>
    @foreach ($users as $user)
        <ul>
            <li><a href="{{route('userPage', $user)}}">{{ $user->name }}</a></li>
        </ul>
    @endforeach

    <a href="{{ route('dashboard') }}">戻る</a>
</head>
<body>

</body>
</html>
