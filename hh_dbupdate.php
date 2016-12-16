<?php
require_once("hh_dbcontrol.php");
$db_handle = new DBController();

$result = mysql_query("UPDATE starships set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  id=".$_POST["id"]);
?>