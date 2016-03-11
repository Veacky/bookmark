<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<title>Bookmark</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta name="viewport" content="width=device-width">
</head>
<body>

<header><h1>Bookmark</h1></header>


<div id="bookmarks">
<ul></ul>
</div>


<div id='addForm'>
	<p><label>Nom : </label><input id='name'/></P>
	<p><label>Url : </label><input id='url'/></P>
	<p><button>Ajouter</button></P>
	<div id='error'></div>
</div>

<?php
// $db = new PDO("pgsql:host=localhost;port=5433;dbname=PG_grandval","grandval","gYepOb"); 
// $stm = $db->prepare("select * from bookmark order by idbookmark");
// $stm->execute();

// foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $key => $value) {
// 	var_dump($value);
// }

?>

<footer>
	<span id="rights">Copyleft</span>
	<span class='sep'></spab>
	<span id='author'>Luc Damas</span>
</footer>




<script type='text/javascript' src='jquery.js'></script>
<script type='text/javascript' src='main.js'></script>
</body>
</html>