<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
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
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <h3>
              SDM College
            </h3>
            <span>Extra Curricular Activities</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="event.php"> Events </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="course.php"> Result </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="student.php">Registration</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
			  <li class="nav-item">
			    <a class="nav-link" href="logout.php">Logout</a>
			  </li>
			  
            </ul>
            <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
              <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
            </form>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
	</body>
	</html>