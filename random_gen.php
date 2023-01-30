<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Random Generator</title>
    </head>
        <body>
            <h1>Random Generator</h1>
            <p>ランダムな文字列を生成します。</p>
            <form action="random_gen.php" method="get">
                <input type="text" name="text" placeholder="文字列を入力してください。">
                <input type="submit" value="生成">
            </form>
            <script>
                let text = document.getElementById("text").value;
                let url = "https://aiimg.jatinsharma24.repl.co/v1/" + text;
                // img の src属性を取得する
            </script>
        </body>
    </html>