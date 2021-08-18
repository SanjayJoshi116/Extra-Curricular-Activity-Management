<?php
session_start();
include("dbconnection.php");
$sqlupd = "UPDATE event_result_status SET attend_status='$_GET[attendance]' where event_participation_id='$_GET[viewid]'";
$qsql = mysqli_query($con,$sqlupd);
?>