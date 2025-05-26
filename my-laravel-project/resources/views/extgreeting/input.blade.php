<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>挨拶用フォーム</title>
</head>
<body>
    <h1>挨拶用フォーム</h1>
    <form method="POST" action="{{ route('extgreeting.greet') }}">
        @csrf
        <div>
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $name ?? '') }}">
        </div>
        <div>
            <label for="type">種族:</label>
            <select id="type" name="type">
                <option value="human" {{ old('type', $type ?? '') == 'human' ? 'selected' : '' }}>人間</option>
                <option value="cat" {{ old('type', $type ?? '') == 'cat' ? 'selected' : '' }}>猫</option>
                <option value="dog" {{ old('type', $type ?? '') == 'dog' ? 'selected' : '' }}>犬</option>
                <option value="pirate" {{ old('type', $type ?? '') == 'pirate' ? 'selected' : '' }}>海賊</option>
            </select>
        </div>
                <div>
            <label for="tension">テンション:</label>
            <select id="tension" name="tension">
                <option value="down" {{ old('tension', $tension ?? '') == 'down' ? 'selected' : '' }}>ダウン</option>
                <option value="average" {{ old('tension', $tension ?? '') == 'average' ? 'selected' : '' }}>アベレージ</option>
                <option value="up" {{ old('tension', $tension ?? '') == 'up' ? 'selected' : '' }}>アップ</option>
            </select>
        </div>
        <button type="submit">送信</button>
    </form>
</body>
</html>
