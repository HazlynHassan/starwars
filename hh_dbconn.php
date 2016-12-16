<?php
require_once("hh_dbcontrol.php");
$db_handle = new DBController();

$query ="SELECT * FROM starships ORDER BY crew DESC";
$result = $db_handle->runQuery($query);
print json_encode($result);
?>