<?php
include("header.php");
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='studentlogin.php';</script>";
}
?>
  </div>

  <!-- login section -->
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              STUDENT DASHBOARD
            </h3>
            <p>
              View my Statistics
            </p>
            <a href="viewpointstable.php">
            <center>View Points Table</center>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="login_form">
            <h3>
             MY POINTS
            </h3>
            <form action="">
              <div class="mypointslabel">
<?php
$sqlpoint= "SELECT ifnull(sum(point),0) FROM event_result_status WHERE student_id='$_SESSION[student_id]' ";
$qsqlpoint = mysqli_query($con,$sqlpoint);
$rspoint = mysqli_fetch_array($qsqlpoint);
echo $rspoint[0];
?>               
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-3">
          <div class="login_form">
            <h3>
             MY RANKING
            </h3>
            <form action="">
              <div class="mypointslabel">
<?php
$sqlpoint= "SELECT z.rank FROM (SELECT student_id, student_name, student_rollno, ifnull((SELECT sum(point) FROM event_result_status WHERE student_id=student.student_id),0) as totalpoint, @rownum := @rownum + 1 AS rank FROM `student`, (SELECT @rownum := 0) r ORDER BY `totalpoint` DESC) as z WHERE student_id='$_SESSION[student_id]' ";
$qsqlpoint = mysqli_query($con,$sqlpoint);
$rspoint = mysqli_fetch_array($qsqlpoint);
echo $rspoint[0];
?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end login section -->
<br>

  <!-- special section -->

  <section class="special_section">
    <div class="container">
      <div class="special_container">
<span style="width: 300px;">Team Token Code :</span>
 <input type="text" name="token_code" id="token_code" class="form-control" style="background-color: #e1dddd;" value="<?php echo md5($_SESSION['student_id'].$hr); ?>">
 <input type="button" name="btn_token_code" id="btn_token_code" class="btn btn-info" value="Copy to Clipboard" onclick="fun_copy_to_clipboard()" >
<script>
function fun_copy_to_clipboard() {
  /* Get the text field */
  var copyText = document.getElementById("token_code");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Team Token Code Copied" );
}
</script>
      </div>
    </div>
  </section>
  <!-- end special section -->
  <br>
  


  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="side_img">
      <img src="images/side-img.png" alt="" />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img_container">
            <div class="img-box b1">
              <img src="images/a-1.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                About Our College
              </h3>
              <p>
                It is a long established fact that a reader will be distracted
                by the readable content of a page when looking at its layout.
                The point of using Lorem Ipsum is that it has a more it
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- course section -->

  <section class="course_section layout_padding-bottom">
    <div class="side_img">
      <img src="images/side-img.png" alt="" />
    </div>
    <div class="container">
      <div class="heading_container">
        <h3>
          POPULAR COURSES
        </h3>
        <p>
          It is a long established fact that a reader will be distracted
        </p>
      </div>
      <div class="course_container">

        <div class="course_content">
          <div class="box">
            <img src="images/c-3.jpg" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5>
              Learn <br />
              Python – Interactive
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
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>
  <!-- end course section -->

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          Events
        </h3>
        <p>
          Upcoming Education Events to feed your brain.
        </p>
      </div>
      <div class="event_container">
        <div class="box">
          <div class="img-box">
            <img src="images/event-img.jpg" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Education Events 2021
            </h4>
            <h6>
              8:00 AM - 5:00 PM VENICE, ITALY
            </h6>
          </div>
          <div class="date-box">
            <h3>
              <span>
                15
              </span>
              March
            </h3>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/event-img.jpg" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Education Events 2021
            </h4>
            <h6>
              8:00 AM - 5:00 PM VENICE, ITALY
            </h6>
          </div>
          <div class="date-box">
            <h3>
              <span>
                15
              </span>
              February
            </h3>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- end event section -->



  <!-- contact section -->

  <section class="contact_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                Contact Us
              </h3>
              <p>
                It is a long established fact that a reader will be distracted
                by the readable
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Get In Touch
            </h5>
            <form action="">
              <div>
                <input type="text" placeholder="Full Name " />
              </div>
              <div>
                <input type="text" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" placeholder="Email Address" />
              </div>
              <div>
                <input type="text" placeholder="Message" class="input_message" />
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn_on-hover">
                  Send
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
<?php
include("footer.php");
?>