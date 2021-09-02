<?php
session_start();
include("dbconnection.php");
$sqlupd = "UPDATE event_participation SET event_participation_status='$_GET[attendance]' where event_participation_id='$_GET[viewid]'";
$qsql = mysqli_query($con,$sqlupd);
if($_GET['attendance'] == "Absent")
{
$sqldel = "UPDATE event_result_status SET point='0' where event_participation_id='$_GET[viewid]'";
$qsqldel = mysqli_query($con,$sqldel);
}
if($_GET['attendance'] == "Present")
{	
$sqlpoint_settings = "SELECT * from point_settings";
$qsqlpoint_settings = mysqli_query($con,$sqlpoint_settings);
$rspoint_settings = mysqli_fetch_array($qsqlpoint_settings);
$sqldel = "UPDATE event_result_status SET point='$rspoint_settings[participation_point]' where event_participation_id='$_GET[viewid]'";
$qsqldel = mysqli_query($con,$sqldel);
}
?>