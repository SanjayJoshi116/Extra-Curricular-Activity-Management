<?php
include("header.php");
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='login.php';</script>";
}
//Approve or Suspend course ends here
$sqlview = "SELECT * FROM  event_participation LEFT JOIN event ON event_participation.event_id=event.event_id LEFT JOIN student ON student.student_id=event_participation.student_id  where event.event_id='$_GET[event_id]' AND event_participation.student_id='$_SESSION[student_id]'";
$sqlview = $sqlview. " ORDER BY event_date_time DESC limit 1";
$qsqlview = mysqli_query($con,$sqlview);
$rsview = mysqli_fetch_array($qsqlview);
$sqlevent_result_status = "SELECT * FROM event_result_status where event_id='$_GET[event_id]' and student_id='$_SESSION[student_id]'";
$qsqlevent_result_status = mysqli_query($con,$sqlevent_result_status);
$rsevent_result_status = mysqli_fetch_array($qsqlevent_result_status);
$sqlevent_event_result = "SELECT * FROM event_result where event_id='$_GET[event_id]'";
$qsqlevent_event_result = mysqli_query($con,$sqlevent_event_result);
$rsevent_event_result = mysqli_fetch_array($qsqlevent_event_result);
$sqlstaff= "SELECT * FROM staff where staff_id='$rsevent_event_result[staff_id]'";
$qsqlstaff = mysqli_query($con,$sqlstaff);
$rsstaff = mysqli_fetch_array($qsqlstaff);
$sqlviewcourse = "SELECT * FROM  course where course_id='$rsview[course_id]'";
$qsqlviewcourse = mysqli_query($con,$sqlviewcourse);
$rsviewcourse = mysqli_fetch_array($qsqlviewcourse);
$sqlviewdepartment = "SELECT * FROM  department where department_id='$rsview[department_id]'";
$qsqlviewdepartment = mysqli_query($con,$sqlviewdepartment);
$rsviewdepartment = mysqli_fetch_array($qsqlviewdepartment);
$sqlviewclub = "SELECT * FROM  club where club_id='$rsview[club_id]'";
$qsqlviewclub = mysqli_query($con,$sqlviewclub);
$rsviewclub = mysqli_fetch_array($qsqlviewclub);
?>
</div>
  <!-- login section -->
  <section class="login_section layout_padding" style="padding-top: 25px;padding-bottom: 25px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="detail-box">
            <center><h3>
             Certificate
            </h3></center>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end login section -->
<br>

        <style type='text/css'>
		/*
            body, html {
                margin: 0;
                padding: 0;
            }
            body {
                color: black;
                display: table;
                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;
            }
            .container {
                border: 20px solid tan;
                width: 750px;
                height: 563px;
                display: table-cell;
                vertical-align: middle;
            }
            .logo {
                color: tan;
            }
*/

            .marquee {
                color: tan;
                font-size: 48px;
                margin: 20px;
            }
            .assignment {
                margin: 20px;
            }
            .person {
                border-bottom: 2px solid black;
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 400px;
            }
            .reason {
                margin: 20px;
            }
        </style>
  
  <!-- event section -->
  <center>
  <section class="event_section layout_padding">
    <div class="container">
      <div class="event_container">
        <div class="" style="color: black; display: table; font-family: Georgia, serif; font-size: 24px;text-align: center;">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
        <div class="container" style="border: 20px solid tan;width: 750px;display: table-cell;vertical-align: middle;">
		<br>
            <div class="logo" style="color: tan;">
               <center><img src="images/logo_new.jpg" style="width: 350px;"></center>
            </div>

            <div class="marquee">
                CERTIFICATE
            </div>

            <div class="assignment">
                This is to certify that 
				<?php
				if($rsview['gender'] == "Male")
				{
					echo " Mr. ";
				}
				if($rsview['gender'] == "Female")
				{
					echo " MS. ";
				}
				?>
				<u><?php echo $rsview['student_name']; ?></u> of <u><?php echo $rsviewcourse['course_title']; ?></u> has won the first ranking in <U><?php echo $rsview['event_title']; ?></u> organized by <u><?php 
				if($rsview['department_id'] != 0)
				{
				echo $rsviewdepartment['department'] . " department"; 
				}
				if($rsview['club_id'] != 0)
				{
				echo $rsviewclub['club']; 
				}
				?></u> on <u><?php echo date("d-m-Y",strtotime($rsview['event_date_time'])); ?></u>.
            </div>
			<div class="row">
				<div class="col-md-12" style="text-align: right;font-size: 19px;padding-right: 40px;">
			<br>
				<?php echo $rsstaff['staff_name']; ?>
				<br><b>Authorized By</b></div>
				<br><br>
			</div>
        </div>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
      </div>
    </div>
	<hr>
	<a href="print_certificate.php?event_id=<?php echo $_GET['event_id']; ?>" class="btn btn-info" type="button"  >Print/Download</a>
  </section>
</center>
  <!-- end event section -->
<?php
include("footer.php");
?>