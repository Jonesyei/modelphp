<?php
include_once("../includes/main_back_inc.php");



$table = PREFIX."sysmenu";
$where = "id=".quotes($_GET["id"]);

$upd["lv"] = quotes($_GET["lv"]);
$upd["parents"] = quotes($_GET["parents"]);
$upd["ifview"] = quotes($_GET["ifview"]);
$upd["url"] = quotes($_GET["url"]);
$upd["name"] = quotes($_GET["name"]);


$conn->AutoExecute($table,$upd,"UPDATE",$where);


?>