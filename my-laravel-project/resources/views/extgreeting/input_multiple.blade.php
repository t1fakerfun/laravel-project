<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>複数人の挨拶フォーム</title>
    <script>
        function addRow() {
            const template = document.querySelector('#row-template');
            const clone = template.content.cloneNode(true);
            document.querySelector('#form-rows').appendChild(clone);
        }
        function removeRow(button) {
            const row = button.closest('.person-row');
            row.remove();
        }
    </script>
</head>
（続き）

<body>
    <h1>複数人の挨拶フォーム</h1>

    <form method="POST" action="{{ route('extgreeting.greet-multiple') }}">
        @csrf
        <div id="form-rows">
            <div class="person-row" style="margin-bottom: 1em;">
                <label>名前: <input type="text" name="names[]"></label>
                <label>種族:
                    <select name="types[]">
                        <option value="human">人間</option>
                        <option value="cat">猫</option>
                        <option value="dog">犬</option>
                        <option value="pirate">海賊</option>
                    </select>
                </label>
                <label>テンション:
                    <select name="tensions[]">
                        <option value="up">アップ</option>
                        <option value="average">アベレージ</option>
                        <option value="down">ダウン</option>
                    </select>
                </label>
            </div>
        </div>

        <button type="button" onclick="addRow()">入力フォーム追加</button>
        <button type="submit">送信</button>
    </form>
        <!-- テンプレート -->
    <template id="row-template">
        <div class="person-row" style="margin-bottom: 1em;">
            <label>名前: <input type="text" name="names[]"></label>
            <label>種族:
                <select name="types[]">
                    <option value="human">人間</option>
                    <option value="cat">猫</option>
                    <option value="dog">犬</option>
                    <option value="pirate">海賊</option>
                </select>
            </label>
            <label>テンション:
                <select name="tensions[]">
                    <option value="up">アップ</option>
                    <option value="average">アベレージ</option>
                    <option value="down">ダウン</option>
                </select>
            </label>
            <button type="button" onclick="removeRow(this)">削除</button>
        </div>
    </template>
</body>
</html>
