<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スライドパズル</title>
    <style>
		body{
			margin:0;
			padding:0;
			background-color:#f0ffff;
		}
		h1{
			border-left: 0.5rem solid #6495ed;
			font-family:sans-serif;
		}
		.head2 {
    	border-left: 0.5rem solid #6495ed;
		font-family:sans-serif;
    	border-bottom: 1px solid #6495ed;
    	border-color: #6495ed;
   		margin: 2rem 0 1.5rem 0;
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
		.button_solid004 input{
			border: none;
			position: relative;
    		display: flex;
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
		.button_solid004 input:hover{
			border-bottom: solid 2px #1d7fde;
    		transform: translateY(3px);
		}
		.footer1{
			background-color:#6495ed;
			height:50px;
			width:100%;
			position: absolute;
    		bottom: 0; 
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
		}
		
    </style>
        <h1>ハッカソンEチーム</h1>
		<h2 class="head2 marginB3">スライドパズル</h2>
</head>
<?php
	if(isset($_POST['puzzlename'])){
?>
<body>
	<div>
	</div>
	<div class="button_solid004">
  		<a href="#">シェアする</a>
	</div>
<?php
	}else{
?>
<body>
	<div class="word">
		<h2>パズルにしたい画像のワードを入力</h2>
		<form action="index.php"method="post">
		<input type="text" size="40"name="puzzlename">
	</div>
	<div class="button_solid004">
  		<input type="submit" value="送信">
	</div>
	</form>
<?php
	}
?>
<footer class="footer1">
		<p class="p1">© 2023 hackathon_e_team</p>
	</footer>
</body>
</html>