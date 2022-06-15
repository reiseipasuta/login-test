<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>TOP</title>
</head>
<body>
<div class="top-container">
    <div class="menu">
        <h2>コンテンツ</h2>

        <a href="{{ route('dashboard') }}">会員メニュー</a>
    </div>

    <p>投稿記事</p>
    <ul>
        @foreach ($contents as $content)
            <li>
                <a href="{{ route('contents', $content) }}">
                    {{ $content->title }}
                </a>
                いいね：{{ $content->usersFavo()->count() }}
            </li>
        @endforeach
    </ul>


    <form action="{{ route('create') }}" method="post">
        @csrf
        <p>タイトル</p>
        <input type="text" name="title">
        <p>本文</p>
        <textarea name="body" id="" cols="30" rows="10"></textarea>
        <button>送信</button>
    </form>


</div>

</body>
</html>
