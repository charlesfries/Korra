<?php
require("controller.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Korra</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="apple-touch-icon" href="img/icon.png">
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<div class="top">
	    <div class="nav">
				Korra Platform v1.0<br>
				<a href="/">Home</a><br>
	      <a href="dashboard.php">Dashboard</a><br>
				<a href="javascript:about()">About</a><br>
	    </div>
			<div class="loader" id="loader"></div>
	    <center>
				<input type="text" id="query" placeholder="Hello, I am Korra! Ask me anything!" value="<?=$_GET['q']?>" onkeydown="go()">
				<br>
	    	<span class="response" id="response"><?=$message?></span>
			</center>
		</div>
		<div id="footer">&copy; 2016 Charles Fries</div>
		<script src="lib/three.js/three.min.js"></script>
		<script src="lib/three.js/Projector.js"></script>
		<script src="lib/three.js/CanvasRenderer.js"></script>
		<script src="lib/three.js/example.js"></script>
		<script src="lib/spin.js/spin.min.js"></script>
		<script src="lib/annyang/annyang.min.js"></script>
		<script src="lib/jquery/jquery.min.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>