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
//Attendance for Team Members starts here
$sqlviewteammembers = "SELECT event_participation.*,event.event_title,student.student_name,student.student_image,student.student_rollno FROM event_participation LEFT JOIN event ON event.event_id=event_participation.event_id LEFT JOIN student ON event_participation.student_id=student.student_id WHERE event_participation.team='$_GET[viewid]' AND event_participation.event_participation_type='Team' AND team!='Team Leader' ORDER BY event_id";
$qsqlviewteammembers = mysqli_query($con,$sqlviewteammembers);
while($rsviewteammembers = mysqli_fetch_array($qsqlviewteammembers))
{
	$sqlupd = "UPDATE event_participation SET event_participation_status='$_GET[attendance]' where event_participation_id='$rsviewteammembers[0]'";
	$qsql = mysqli_query($con,$sqlupd);
	if($_GET['attendance'] == "Absent")
	{
	$sqldel = "UPDATE event_result_status SET point='0' where event_participation_id='$rsviewteammembers[0]'";
	$qsqldel = mysqli_query($con,$sqldel);
	}
	if($_GET['attendance'] == "Present")
	{	
	$sqlpoint_settings = "SELECT * from point_settings";
	$qsqlpoint_settings = mysqli_query($con,$sqlpoint_settings);
	$rspoint_settings = mysqli_fetch_array($qsqlpoint_settings);
	$sqldel = "UPDATE event_result_status SET point='$rspoint_settings[participation_point]' where event_participation_id='$rsviewteammembers[0]'";
	$qsqldel = mysqli_query($con,$sqldel);
	}
}
//Attendance for Team Members Ends here
?>