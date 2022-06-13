<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集画面</title>
</head>
<body>
    <h3>編集</h3>

    <form action="{{ route('edit', $content) }}" method="post">
        @method('PATCH')
        @csrf
        <input type="text" name="title" value="{{ old('title', $content->title) }}">
        <textarea name="body">{{ old('body', $content->body) }}</textarea>
        <button>編集</button>
    </form>
</body>
</html>
