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
			.button_solid004 #button1:hover{
				border-bottom: solid 2px #1d7fde;
				transform: translateY(3px);
			}
			.p1{
				text-align:center;
			}
			.p2{
				padding-top: 13px;
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
    </style>
		<a href="index.php"><h1 class="head2 marginB3">AIスライドパズル</h1></a>
</head>
<?php
	if(isset($_POST['puzzlename'])){
?>
<body>
	<?php
		require_once('random_gen.php');
		require_once('puzzle.php'); ?>
	<div class="button_solid004 share" hidden>
  		<a href="#">シェアする</a>
	</div>
	<footer class="footer1"style="background-color:#6495ed;
			height:50px;
			width:100%;
			margin-top:5px;
      		bottom: 0;">
		<p class="p2">© 2023 hackathon_e_team</p>
	</footer>
<?php
	}else{
?>
<style>
	.footer1{
		background-color:#6495ed;
			height:50px;
			width:100%;
			position: absolute;
      		bottom: 0;
	}
</style>
<body>
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
<?php
	}
?>
</body>
</html>