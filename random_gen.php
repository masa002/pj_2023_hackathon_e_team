<?php
    // postで送られてきた文字列を取得
    $text = $_POST['puzzlename'];

    // htmlspecialcharsでエスケープ処理
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

    // envファイルからAPIキーを取得
    $env = parse_ini_file('.env');
    $apiKey = $env["API_KEY"];

    // 翻訳用のURLとパラメータを設定
    $target = "en";
    $url = "https://translation.googleapis.com/language/translate/v2?key=" . $apiKey . "&q=" . rawurlencode($text) . "&target=" . $target;

    // 翻訳
    $response = file_get_contents($url);
    $response = json_decode($response, true);

    // 翻訳した文字列を取得
    $puzzlename = $response["data"]["translations"][0]["translatedText"];

    // 画像の名前（乱数)
    $image_name = "ai_image/" . hash('sha256', rand()) . ".png";
    // 画像の名前をクライアントに送る為にセッションに保存
    $_SESSION['image_name'] = $image_name;

    // // URLエンコード
    // $puzzlename = urlencode($puzzlename);
    // // img タグ取得
    // $url = "https://aiimg.jatinsharma24.repl.co/v1/" . $puzzlename;
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // $html = curl_exec($ch);
    // curl_close($ch);

    // // wildcardで配列に格納
    // preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $html, $matches);
    // // alt=をリプレイス
    // $img_src = preg_replace('/ alt=/', '', $matches[1][0]);

    // // 画像取得
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $img_src);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    // curl_setopt($ch, CURLOPT_HEADER, 1);
    // $data = curl_exec($ch);
    // curl_close($ch);

    // json 作成
    $json_array = ["prompt" => $puzzlename, "high_quality" => "true"];
    $json = json_encode($json_array);

    $url = "https://ulhcn-01gd3c9epmk5xj2y9a9jrrvgt8.litng-ai-03.litng.ai/api/predict";
    
    // data:image/png;base64,の形で返ってくる
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json)
    ));
    $data = curl_exec($ch);
    curl_close($ch);

    // ヘッダーとボディーに分ける
    $data = explode("\r\n\r\n", $data);
    $data = $data[1];

    // json形式を配列に変換
    $data = json_decode($data, true);

    // base64でエンコードされた画像をデコードして保存
    $data = $data["image"];
    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);
    $data = base64_decode($data);
    file_put_contents($image_name, $data);


    // 保存した画像をリサイズして上書き保存
    $image = imagecreatefrompng($image_name);
    $width = imagesx($image);
    $height = imagesy($image);
    $new_width = 500;
    $new_height = 500;
    $new_image = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    imagepng($new_image, $image_name);
?>