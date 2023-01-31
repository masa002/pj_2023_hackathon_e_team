<?php

    $theme = $_POST['theme'];
    // img タグ取得
    $url = "https://aiimg.jatinsharma24.repl.co/v1/"+$theme;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $html = curl_exec($ch);
    curl_close($ch);

    // wildcardで配列に格納
    preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $html, $matches);
    // alt=をリプレイス
    $img_src = preg_replace('/ alt=/', '', $matches[1][0]);

    // 画像取得
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $img_src);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $data = curl_exec($ch);
    curl_close($ch);

    // 画像保存
    $image_data = substr($data, strpos($data, "\r\n\r\n") + 4);
    $image_name = "img/img" . ".png";
    file_put_contents($image_name, $image_data);
?>