<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
$dt = date("Y-m-d");
$hr = date("H");
include("dbconnection.php");
//###################
$sqlprofile = "SELECT * FROM student where student_rollno ='" . $_POST['student_rollno'] . "'";
$qsqlprofile = mysqli_query($con,$sqlprofile);
echo mysqli_error($con);
$rsprofile = mysqli_fetch_array($qsqlprofile);
//###################
if(md5($rsprofile['student_id'].$hr) == $_POST['token_key'])
{
	echo $rsprofile[0];
}
else
{
	echo 0;
}
?>