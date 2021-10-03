<?php
include("header.php");
include("slider.php");
?>
  </div>
  <!-- special section -->

  <section class="special_section">
    <div class="container">
      <div class="special_container">
        <div class="box b1">
          <div class="img-box">
            <img src="images/award.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Apply Competitions <br />
              Through Online
            </h4>
          </div>
        </div>
        <div class="box b2">
          <div class="img-box">
            <img src="images/study.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              View upcoming Events <br />
              & Competition Result
            </h4>
          </div>
        </div>
        <div class="box b3">
          <div class="img-box">
            <img src="images/books-stack-of-three.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              BEST <br />
              LIBRARY & STORE
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end special section -->

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
              <img src="images/sdmujire.jpg" alt="" />
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
                SDM College, Ujire is an autonomous college under Mangalore University. Founded in 1966, the college offers Bachelors and Masters Programmes in a serene campus at the foothills of the Western Ghats in Karnataka (India). The college is a recognized centre for research programmes of Mangalore University, Tumkur University and Kannada University Hampi. Managed by SDM Educational Society, it is headed by the visionary, Dr. D. Veerendra Heggade, Dharmadhikari of Shri Kshetra Dharmasthala. 
              </p>
              <a href="about.php">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
<hr>
  <!-- course section -->

  <section class="course_section layout_padding-bottom">
    <div class="side_img">
      <img src="images/side-img.png" alt="" />
    </div>
    <div class="container">
      <div class="heading_container">
        <h3>
          Extra Curricular Activity Management
        </h3>
        <p>
          Extra Curricular Activity Management for SDM College, Ujire
        </p>
      </div>
      <div class="course_container">
        <div class="course_content">
          <div class="box" style="border-style: outset;border-width: 1px;border-color: coral;">
            <img src="images/Practical-Skills.png" alt=""  style="width: 401px;height: 401px;"/>
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5 style="background-color: black;opacity: 0.6;text-align: center; padding: 10px;width: 75%;">
              Explore your Skills <br />
              By participating events
            </h5>
          </div>
          <div class="box" style="border-style: outset;border-width: 1px;border-color: coral;">
            <img src="images/competiton.jpg" alt=""  style="width: 401px;height: 401px;" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5 style="background-color: black;opacity: 0.6;text-align: center; padding: 10px;width: 75%;">
              Apply competitions <br />
              Through Online
            </h5>
          </div>
          <div class="box" style="border-style: outset;border-width: 1px;border-color: coral;">
            <img src="images/winder.jpg" alt=""   style="width: 401px;height: 401px;"/>
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5 style="background-color: black;opacity: 0.6;text-align: center; padding: 10px;width: 75%;">
              Competition Results<br />
              Through Online
            </h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end course section -->

  <!-- login section -->
<?php 
if(!isset($_SESSION['staff_id']))
{
	if(!isset($_SESSION['student_id']))
	{
?>
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              Are you new to this portal?
            </h3>
            <p>
              Create account now and get immediate access..
            </p>
            <a href="student.php">
              REGISTER NOW
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="login_form">
            <h5>
              Student Login
            </h5>
            <form action="login.php" method="post">
				<input type="hidden" name="login_type" id="login_type" value="Student" >
              <div>
				<input name="login_id" id="login_id" type="text" placeholder="Login ID " />
              </div><br>
              <div>
                <input name="password"   id="password"  type="password" placeholder="Password" />
              </div>
              <button type="submit" name="btnsubmit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
}
}
?>

  <!-- end login section -->

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <center><h3>
          Upcoming Events
        </h3></center>
      </div>
      <?php
		    $sqlview = "SELECT * FROM  event where event_date_time > '$dttim' ";
        if($_GET['eventtype'] == "Single")
        {
          $sqlview = $sqlview . " AND  event.event_participation_type='Single' ";
        }
        if($_GET['eventtype'] == "Team")
        {
          $sqlview = $sqlview . " AND  event.event_participation_type='Team' ";
        }
        $sqlview = $sqlview. " ORDER BY event_date_time DESC";
		    $qsqlview = mysqli_query($con,$sqlview);
	    	while($rsview = mysqli_fetch_array($qsqlview))
		    {
          ?>
      <div class="event_container">
        <div class="box">
          <div class="img-box">
           <h5>
		  <?php
      $imge=$rsview['event_banner'];
      echo '<img src="imgbanner/' .$imge .'" width="150" height="150">';
      ?>
		   </h5>
          </div>
          <div class="detail-box">
            <h4>
            <?php echo $rsview['event_title'];?>
            </h4>
            <h6>
              <?php echo $rsview['event_venue'];?>
            </h6>
          </div>
          <div class="date-box">
            <h3>
            <?php echo date("d-M-Y h:i A",strtotime($rsview['event_date_time']));?>
            </h3>
			      <a href="event_more_det.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-info btn-lg">View More</a>
            (<?php echo $rsview['event_participation_type'];?> Event)
          </div>
        </div>
    </div>
        <?php
      }
        ?>
	</div>
  </section>
  <!-- end event section -->
  

<?php
include("footer.php");
?>