<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
?>

  </div>

  <!-- special section -->

  <section class="special_section">
    <div class="container">
      <div class="special_container">
        <div class="box b1">
          <div class="img-box">
          </div>
          <div class="detail-box">
          </div>
        </div>
        <div class="box b2">
          <div class="img-box">
            <img src="images/award.png" alt="" />
          </div>
          <div class="detail-box">
              <H4>ADMIN DASHBOARD</H4>
          </div>
        </div>
        <div class="box b3">
          <div class="img-box">
          </div>
          <div class="detail-box">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end special section -->


  <!-- course section -->

  <section class="course_section layout_padding-bottom">
    <div class="side_img">
      <img src="images/side-img.png" alt="" />
    </div>
    <div class="container">
	 
      <div class="course_container">
        <div class="course_content">
          <div class="box">
            <img src="images/complaint.jpg" style="width: 353px;height: 322px;" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM complaint_report";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
              Complaint Reports
            </h5>
          </div>
          <div class="box">
            <img src="images/c-4.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
			<?php
			  $sqlcount = "SELECT * FROM course";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
              <br />
              Courses
            </h5>
          </div>
          <div class="box">
            <img src="images/c-5.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM department";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
			  Departments
            </h5>
          </div>
        </div>
      </div>
 	 
      <div class="course_container">
        <div class="course_content">
          <div class="box">
            <img src="images/complaint.jpg" style="width: 353px;height: 322px;" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM event";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
              Events
            </h5>
          </div>
          <div class="box">
            <img src="images/c-4.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM event_participation";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
              Event Applications
            </h5>
          </div>
          <div class="box">
            <img src="images/c-5.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM event_result";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
			  Event Results Uploaded
            </h5>
          </div>
        </div>
      </div>
 	 
      <div class="course_container">
        <div class="course_content">
          <div class="box">
            <img src="images/complaint.jpg" style="width: 353px;height: 322px;" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM event_result_status";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
              Event Results
            </h5>
          </div>
          <div class="box">
            <img src="images/c-4.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM event_type";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
			  Event Types
            </h5>
          </div>
          <div class="box">
            <img src="images/c-5.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM staff";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
			  Staff
            </h5>
          </div>
        </div>
      </div>
 	 
      <div class="course_container">
        <div class="course_content">
          <div class="box">
            <img src="images/complaint.jpg" style="width: 353px;height: 322px;" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              <?php
			  $sqlcount = "SELECT * FROM student";
			  $qsqlcount = mysqli_query($con,$sqlcount);
			  echo mysqli_num_rows($qsqlcount);
			  ?>
			  <br />
              Students
            </h5>
          </div>
          <div class="box">
            <img src="images/c-4.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              Your <br />
              Complete Guide
            </h5>
          </div>
          <div class="box">
            <img src="images/c-5.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              Photography
            </h5>
          </div>
        </div>
      </div>
 
    </div>
  </section>

  <!-- end course section -->

<?php
include("footer.php");
?>