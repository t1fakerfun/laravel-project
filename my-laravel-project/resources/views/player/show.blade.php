<!DOCTYPE html>
<html>
<head>
    <title>Player Details</title>
</head>
<body>
    <h1>Player Details</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Score</th>
            <th>Level</th>
        </tr>
        <tr>
            <td>{{ $player->id }}</td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->score }}</td>
            <td>{{ $player->level }}</td>
        </tr>
    </table>
</body>
</html>