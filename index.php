<?php
	if (!isset($_POST['puzzlename'])) {
		session_start();
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico" />
	<title>AIスライドパズル</title>
	<link rel="stylesheet" href="css/index.css">
	<div class="head2 marginB3">
		<a href="index.php"><h1>AIスライドパズル</h1></a>
		<div class="button_opera" id="hoge">
			<!-- <label for="sample-popup-switch"  onclick="Start()">操作説明</label> -->
			<!-- <input type="button" value="" onclick="Start()" />	 -->
			<!-- <a href="test1.php" onclick="ChangeHidden()">操作説明</a> -->
			<input type="button" value="操作説明" onclick="clickBtn1()" />
		</div>
	</div>
</head>
<body>
	<div class="sample-popup-window " id="disp">
		<input type="checkbox" id="sample-popup-switch" />
		<div class="sample-popup-background"></div>
		<div class="sample-popup-box">
			<div class="sample-popup-content">
				<img src ="./img/guide.png" class="opera_img">
				<!-- <label for="sample-popup-switch" class="sample-popup-close" id ="close_btn"  onclick="clickBtn1()">閉じる</label> -->
				<input id="close" type="button" value="✕" onclick="clickBtn1()" />
			</div>
		</div>
	</div>
<?php
	if(isset($_POST['puzzlename']) && !empty($_POST['puzzlename'])){
?>
	<div class="container">
	<?php
		require_once('components/random_gen.php');
		if (isset($_SESSION['image_name'])) {
			require_once('components/puzzle.php');
		} else {
			header('Location: /');
		}
	?>
	<div class="button_solid004 share" hidden>
		<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" data-text="無料で遊べるAIスライドパズル" data-url="http://gladtech.starfree.jp/840aa32917c41ab4c490f8f2a530bfd4653fe3a7db44089bae2fddf112119d40/" data-show-count="false">Tweet</a>
		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		<button type="submit"><img src="img/downloadicon.png" alt="送信" onclick="savefile('puzzle')"/></button>
		<script src="js/download.js"></script>
	</div>
	<footer class="footer1">
		<p class="p1">© 2023 hackathon_e_team</p>
	</footer>
	</div>
<?php
	}else{
?>
	<div class="container">
	<div class="word">
		<h2>パズルにしたい画像のワードを入力</h2>
		<form action="index.php"method="post">
		<input type="text"name="puzzlename"placeholder="例: space,宇宙"style="text-align: center;">
	</div>
	<div class="button_solid004">
  		<input id="button1" type="submit" value="送信">
	</div>
	</form>
	<footer class="footer1">
		<p class="p1">© 2023 hackathon_e_team</p>
	</footer>
	<div>
<?php
	}
?>

<script src="js/index.js"></script>
<script src="js/loading.js"></script>
</body>
</html>