<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico" />
	<title>AIスライドパズル</title>
    <style>
			a{
				text-decoration: none;
				color: #000000;
			}
			body{
				margin:0;
				padding:0;
				background-color:#f0ffff;
			}
			.head2 {
			border-left: 0.5rem solid #6495ed;
			font-family:sans-serif;
			border-bottom: 1px solid #6495ed;
			border-color: #6495ed;
			margin: 2rem 0 1.5rem 0;
			margin-bottom:100px;
			padding: 0.1rem 0 0.2rem 0.5rem;
			}
			.hr1{
				border-top: 5px solid #cd853f;
				width :100%;
				margin-bottom:100px;
			}
			.button_solid004 a {
				position: relative;
				display: flex;
				justify-content: space-around;
				align-items: center;
				margin: 0 auto;
				margin-bottom: 200px;
				max-width: 240px;
				padding: 10px 25px;
				color: #FFF;
				transition: 0.3s ease-in-out;
				font-weight: 600;
				background: #6bb6ff;
				border-radius: 8px;
				border-bottom: solid 5px #1d7fde;
			}
			.button_solid004 a:hover {
				border-bottom: solid 2px #1d7fde;
				transform: translateY(3px);
			}
			.button_solid004 #button1{
				border: none;
				position: relative;
				display: flex;
				justify-content: space-around;
				align-items: center;
				margin: 0 auto;
				width: 240px;
				padding: 10px 25px;
				color: #FFF;
				transition: 0.3s ease-in-out;
				font-weight: 600;
				font-size: 20px;
				background: #6bb6ff;
				border-radius: 8px;
				border-bottom: solid 5px #1d7fde;
			}
			.button_opera input{
				border: none;
				position: relative;
				display: inline;
				justify-content: space-around;
				align-items: center;
				margin: 0 auto;
				max-width: 240px;
				padding: 10px 25px;
				color: #FFF;
				transition: 0.3s ease-in-out;
				font-weight: 600;
				background: #6bb6ff;
				border-radius: 8px;
				border-bottom: solid 5px #1d7fde;
				
			}
			.button_opera input:hover{
				border-bottom: solid 2px #1d7fde;
				transform: translateY(3px);
			}
			.button_solid004 #button1:hover{
				border-bottom: solid 2px #1d7fde;
				transform: translateY(3px);
			}
			.p1{
				text-align:center;
			}
			.word{
				display: block;
				text-align: center;
				margin-top: 100px;
				margin-bottom: 40px;
			}
			.word input{
				font-size:40px;
				width: 50%;
			}
			#puzzleContainer{
				margin:auto;
				margin-bottom:50px;
			}
			.container {
				min-height: 70vh; 
    			position: relative;
    			padding-bottom: 50px;
    			box-sizing: border-box;
			}
			#hoge{
 				 display: inline;
			}

			#sample-popup-switch {
				/* チェックボックスを非表示 */
				display: none;
			}
			.sample-popup-background {
				/* 画面全体を暗くする透過背景 */
				position: fixed;
				width: 100%;
				height: 100%;
				background: rgba(0,0,0,.5);
				top: 0;
				left: 0;
				z-index: 1000;
			}
			.sample-popup-content {
				/* ポップアップ本体 */
				display: inline-block;
				position: fixed;
				width: 100%;
				z-index: 1100;
				background: #fff;
				padding: 2%;
				top: 50%;
				left: 50%;
				transform: translate(-50%,-50%);
				overflow-y: scroll;
				
			}
			.sample-popup-close {
				/* ポップアップ内の閉じるボタン */
				position: relative;
				display: inline-block;
				background: #09f;
				color: #fff;
				padding: 0 1em;
				border-radius: 3px;
				cursor: pointer;
				left: 50%;
				transform: translateX(-50%);
			}
			#sample-popup-switch:checked ~ .sample-popup-background, #sample-popup-switch:checked ~ .sample-popup-box {
				/* ポップアップ･透過背景を閉じる */
				display: none;

			}
			.button-box {
				width: 100%;
				padding: 8px 16px;
				margin: 16px auto;
			}

			button {
				width: 50%;
				max-width: 300px;
				height: 2.5em;
				margin: 8px auto;
				padding: 4px 0;
				border-radius: 4px;
				background-color: blue;
				color: white;
				font-size: 24px;
				font-weight: bold;
			}

			button:hover {
				opacity: .7;
			}

			.hidden {
				display: none;
			}
			.opera_img{
				width: 50%;
				height: 50%;
				text-align: center;
			}
			.footer1{
				background-color:#6495ed;
				height:50px;
				width:100%;
				position: absolute;
    			bottom: 0;

	}
    </style>
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
<?php
	if(isset($_POST['puzzlename'])){
?>
<body>
	<div class="container">
	<?php
		require_once('random_gen.php');
		require_once('puzzle.php'); ?>
	<div class="button_solid004 share" hidden>
  		<a href="#">シェアする</a>
	</div>
	<footer class="footer1">
		<p class="p1">© 2023 hackathon_e_team</p>
	</footer>
	</div>
<?php
	}else{
?>
<div class="sample-popup-window " id="disp">
			<input type="checkbox" id="sample-popup-switch" />
			<div class="sample-popup-background"></div>
			<div class="sample-popup-box">
				<div class="sample-popup-content">
				
					<img src ="./img/guide.png" class="opera_img">
					<!-- <label for="sample-popup-switch" class="sample-popup-close" id ="close_btn"  onclick="clickBtn1()">閉じる</label> -->
					<input type="button" value="閉じる" onclick="clickBtn1()" />

				</div>
			</div>
		</div>

</div>
<body>
	<div class="container">
	<div class="word">
		<h2>パズルにしたい画像のワードを入力</h2>
		<form action="index.php"method="post">
		<input type="text"name="puzzlename"style="text-align: center;">
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

<script>
//初期表示は非表示
document.getElementById("disp").style.display ="none";

function clickBtn1(){
	const disp = document.getElementById("disp");

	if(disp.style.display=="block"){
		// noneで非表示
		disp.style.display ="none";
	}else{
		// blockで表示
		disp.style.display ="block";
	}
}

function Close(){
	const disp = document.getElementById("disp");

	if(disp.style.display=="block"){
		// noneで非表示
		disp.style.display ="none";
	}else{
		// blockで表示
		disp.style.display ="block";
	}
}
</script>
</body>
</html>