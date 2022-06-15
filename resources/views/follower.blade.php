<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>フォロワー一覧</title>

    <h3>フォロワー一覧</h3>
    @foreach ($users as $user)
        <ul>
            <li>{{ $user->name }}</li>
        </ul>
    @endforeach

    <a href="{{ route('dashboard') }}">戻るうう</a>
</head>
<body>

</body>
</html>
