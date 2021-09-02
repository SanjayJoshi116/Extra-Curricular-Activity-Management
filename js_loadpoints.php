<?php
session_start();
include("dbconnection.php");
$sql ="SELECT * FROM point_settings";
$qsql = mysqli_query($con,$sql);
$rssql = mysqli_fetch_array($qsql);
if($_POST['winning_position'] == 1)
{
	echo $rssql['firstplace_point']
}
if($_POST['winning_position'] == 2)
{
	echo $rssql['secondplace_point']
}
if($_POST['winning_position'] == 3)
{
	echo $rssql['thirdplace_point']
}
if($_POST['winning_position'] == 0)
{
	echo $rssql['participation_point']
}
?>