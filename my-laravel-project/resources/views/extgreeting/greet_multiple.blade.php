<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>挨拶(複数)</title>
</head>
<body>
    <h1>挨拶一覧</h1>

    <ul>
        @foreach ($messages as $index => $message)
            <li>{{ $index + 1 }}人目: {{ $message }}</li>
        @endforeach
    </ul>

    <a href="{{ route('extgreeting.input-multiple') }}">戻る</a>
</body>
</html>