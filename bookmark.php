<?php

// bookmark(idbookmark, name, url)
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

$db = new PDO("pgsql:host=localhost;port=5433;dbname=PG_grandval","grandval","gYepOb");

$error = array("value"=>false, "message"=>"Pas d'erreur");

if (isset($_POST["name"]) && isset($_POST["url"])) {
	if (empty($_POST["name"]) || empty($_POST["url"])) {
		$error["value"] = true;
		$error["message"] = "Champs vides interdits";
	} else {
		$stm = $db->prepare("select * from bookmark where url=:url");
		$stm->bindValue(":url",$_POST["url"]);
		$stm->execute();
		if ($stm->rowCount() != 0) {
			$error["value"] = true;
			$error["message"] = "Cette URL est déjà enregistrée";
		} else {
			$stm = $db->prepare("insert into bookmark(name, url) values (:name, :url)");
			$stm->bindValue(":name",$_POST["name"]);
			$stm->bindValue(":url",$_POST["url"]);
			$stm->execute();
		}
	}
}

if (isset($_POST["idbookmark"])) {
	$stm = $db->prepare("delete from bookmark where idbookmark=:idbookmark");
	$stm->bindValue(":idbookmark", $_POST["idbookmark"]);
	$stm->execute();
}

$stm = $db->prepare("select * from bookmark order by idbookmark");
$stm->execute();

echo json_encode(
	array(
		"bookmarks" => $stm->fetchAll(PDO::FETCH_ASSOC),
		"error" => $error)
	);



