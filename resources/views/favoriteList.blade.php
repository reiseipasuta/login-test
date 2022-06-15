<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FavoriteList</title>
</head>
<body>
いいねリスト
@foreach ($lists as $list)
<ul>
    <li><a href="{{route('contents', $list->id)}}">{{ $list->title }}</a></li>
</ul>
@endforeach
</body>
</html>
