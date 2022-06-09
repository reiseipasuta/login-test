<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOP</title>
</head>
<body>
<div>
    <h1>コンテンツ</h1>

    <a href="{{ route('dashboard') }}">会員メニュー</a>

    <ul>
        @foreach ($contents as $content)
            <li>
                <a href="{{ route('contents', $content) }}">
                    {{ $content->title }}
                </a>
            </li>
        @endforeach
    </ul>


    <form action="{{ route('create') }}" method="post">
        @csrf
        <h3>タイトル</h3>
        <input type="text" name="title">
        <h3>本文</h3>
        <textarea name="body" id="" cols="30" rows="10"></textarea>
        <button>送信</button>
    </form>


</div>

</body>
</html>
