<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
$dt = date("Y-m-d");
include("dbconnection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="SDM College Extra Curricular Activities" />
  <meta name="description" content="SDM College Extra Curricular Activities" />
  <meta name="author" content="SDM College" />

  <title>SDM College Extra Curricular Activities</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="css/jquery.dataTables.min.css" rel="stylesheet" />
  <style>
	.labelproperty
	{
		color: white;
		padding-top: 15px;
		margin-bottom: -4.5rem;
	}
  </style>
</head>

<body
<?php
if(basename($_SERVER['PHP_SELF']) != "index.php")
{
?>
class="sub_page"
<?php
}
?>>
<?php
include("testmenu.php");
?>
<?php
include("headerpage.php");
?>