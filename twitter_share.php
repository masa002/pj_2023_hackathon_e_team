<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>なに見てんだよ</title>
<!--Twitterカード部分、以下。Twitter上でurlを貼られたページにこのタグがあると、参照して設定されたモノを表示する。らしい-->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="AI生成画像パズル(仮)" />
<meta name="twitter:description" content="AI生成画像パズルは、AIによって生成される画像を用いてパズルを行うサイトです。(仮)" />
<meta name="twitter:image" content="<?php echo $URL; ?>" />
<!--Twitterカード部分、以上-->
</head>
<body>
    <!--Twitterボタン部分、以下。ページ上で表示されるこのボタンを押すと、このページのurlと、タグに設定された文でツイートを行うページへ飛ぶ-->
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="AI生成画像パズルで、パズルを組み立てました。(仮)" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <!--Twitterボタン以上、以上-->
</body>
</html>