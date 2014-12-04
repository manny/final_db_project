<?php
include "php/DBConnect.php";
?>
<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>GameR PlayeR</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<noscript>
            <link rel="stylesheet" type="text/css" href="lib/chosen/chosen.css" />
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
            <link rel="stylesheet" type="text/css" href="lib/chosen/chosen.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
                    <div id="title">
						<h1>GameR PlayeR</h1>
						<!--<p>Security Chief &nbsp;&bull;&nbsp; Cyborg &nbsp;&bull;&nbsp; Never asked for this</p>-->
						<p id='description'>Use our extensive gamer database to gain insights about</br>gamers and make more effective purchase recommendations</p>
    <div class="search">
        <form class="formContent" action="php/queries.php" method="post">
        <select name="queries[]" data-placeholder="Search by game info (title, rating, genre, etc)" style="width:400px;" class="chosen-select" multiple>
          <option value=""></option>
          <optgroup class="gameGroup" label="Games"></optgroup>
          <optgroup class="titleGroup" label="Titles"></optgroup>
          <optgroup class="webGroup" label="Web Rating"></optgroup>
          <optgroup class="urGroup" label="User Rating"></optgroup>
          <optgroup class="devGroup" label="Developer"></optgroup>
          <optgroup class="pubGroup" label="Publisher"></optgroup>
          <optgroup class="genreGroup" label="Publisher"></optgroup>
          <optgroup class="esrbGroup" label="ESRB"></optgroup>
          <optgroup class="genderGroup" label="Gender "></optgroup>
          <optgroup class="incomeGroup" label="Income "></optgroup>
          <optgroup class="regionGroup" label="Region "></optgroup>
          <optgroup class="gnGroup" label="Given Name "></optgroup>
          <optgroup class="snGroup" label="Surname "></optgroup>
          <optgroup class="miGroup" label="Middle Initial "></optgroup>
          <optgroup class="cityGroup" label="City Group "></optgroup>
          <optgroup class="stateGroup" label="City Group "></optgroup>
          <optgroup class="msGroup" label="City Group "></optgroup>
          <optgroup class="pgGroup" label="City Group "></optgroup>
          <optgroup class="systemGroup" label="System"></optgroup>
          <div class="three columns offset-by-one">
            <input type="submit" id="submit-button" class="submit" value="Go!" class="submit-button" />
          </div>
        </select>
      </div>
      </form>
    </div>
<!--
						<nav>
							<ul>
								<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
								<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
								<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
							</ul>
						</nav>
-->
                    </div>
					</header>

				<!-- Footer -->
					<footer id="footer">
<!--
						<span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
-->
					</footer>
				
			</div>
		</div>
	</body>
</html>
