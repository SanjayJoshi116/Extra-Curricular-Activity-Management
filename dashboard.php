<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
  echo "<script>window.location='login.php';</script>";
}
?>
<a href="viewstudent.php"><div id="countingbox" style = "position:relative;left:200px; top:20px;"><span class="count">
        <?php
        $sqlcount = "SELECT * FROM student";
        $qsqlcount = mysqli_query($con,$sqlcount);
        echo mysqli_num_rows($qsqlcount);
        ?></span></div></a>
<a href="viewstaff.php"><div id="countingbox" style = "position:relative;left:300px; top:20px;"><span class="count">    
        <?php
        $sqlcount = "SELECT * FROM staff";
        $qsqlcount = mysqli_query($con,$sqlcount);
        echo mysqli_num_rows($qsqlcount);
        ?></span></div></a>
<a href="viewevent.php"><div id="countingbox" style = "position:relative;left:400px; top:20px;"><span class="count">
        <?php
        $sqlcount = "SELECT * FROM event";
        $qsqlcount = mysqli_query($con,$sqlcount);
        echo mysqli_num_rows($qsqlcount);
        ?>
</span></div></a>
<a href="viewdepartment.php"><div id="countingbox" style = "position:relative;left:500px; top:20px;"><span class="count">
       <?php
        $sqlcount = "SELECT * FROM department";
        $qsqlcount = mysqli_query($con,$sqlcount);
        echo mysqli_num_rows($qsqlcount);
        ?>
</span></div></a>
<div style="clear:both"></div>
<br />
<h2 style = "position:relative;left:200px; top:10px;font-family:Times New Roman, Times,serif;"><b>STUDENTS</b></h2>
<h2 style = "position:relative;left:500px; top:-36px;font-family:Times New Roman, Times,serif;"><b>STAFF</b></h2>
<h2 style = "position:relative;left:750px; top:-83px;font-family:Times New Roman, Times,serif;"><b>EVENTS</b></h2>
<h2 style = "position:relative;left:1000px; top:-130px;font-family:Times New Roman, Times,serif;"><b>DEPARTMENT</b></h2>
<<<<<<< HEAD
 <?php 
    }
    if(isset($_SESSION['staff_id']))
    {
   ?><br><br>
    <!-- event section -->
    <hr>
  <section class="event_section">
    <div class="container">
      <div class="heading_container">
       <h3>
          My Upmcoming Events
        </h3>
      </div>
<?php
$flag=0;
$sqlview = "SELECT * FROM  event where staff_id='$_SESSION[staff_id]'";
$qsqlview = mysqli_query($con,$sqlview);
while($rsview = mysqli_fetch_array($qsqlview))
{
  if(date("d-m-Y",strtotime($rsview['event_date_time'])) > date('d-m-Y',strtotime('now')))
  {
    $flag=1;
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
        <a href="event_more_det.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-info">View More</a>
            (<?php echo $rsview['event_participation_type'];?> Event)
    </div>
  </div>
</div>
<?php
}
}
if($flag==0)
{
  ?>
  <div style="  font-family: Lucida Console, Courier New, monospace;">
    <br><h3 style=" color : red">You dont have any new upcoming events ...</h3>
  <a href="addevent.php">Click here to add new event</a>
      <br><br>
  </div>
  <?php
}
?>
    </div>
  </section>
  <hr>
  <?php
}
?>

  <!-- end event section -->
=======
>>>>>>> b02cc57734791a45931a6df3e11fd18b74a77ab9
  <!-- course section -->

  <section class="course_section layout_padding-bottom">
    <div class="side_img">
      <img src="images/side-img.png" alt="" />
    </div>
    <div class="container">
   
      <div class="course_container">
        <div class="course_content">
          <div class="box">
            <img src="images/complaint.cms" style="width: 353px;height: 322px;" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5 style="background-color: black;opacity: 0.6;text-align: center; padding: 10px;width: 75%;">
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
            <img src="images/course.jpg" alt="" style="height: 322px;" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5  style="background-color: black;opacity: 0.6;text-align: center; padding: 10px;width: 75%;">
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
            <img src="images/application.jpg" style="width: 353px;height: 322px;" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5 style="background-color: black;opacity: 0.6;text-align: center; padding: 10px;width: 75%;">
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
            <img src="images/eventresult.jpg" style="width: 353px;height: 322px;" alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5 style="background-color: black;opacity: 0.6;text-align: center; padding: 10px;width: 75%;">
              <?php
        $sqlcount = "SELECT * FROM event_result";
        $qsqlcount = mysqli_query($con,$sqlcount);
        echo mysqli_num_rows($qsqlcount);
        ?>
        <br />
        Event Results Uploaded
            </h5>
          </div>
          <div class="box">
            <img src="images/sportsandgames.jpg" style="width: 353px;height: 322px;"  alt="" />
            <a href="" class="">
              <img src="images/link.png" alt="" />
            </a>
            <h5 style="background-color: black;opacity: 0.6;text-align: center; padding: 10px;width: 75%;">
              <?php
        $sqlcount = "SELECT * FROM event_type";
        $qsqlcount = mysqli_query($con,$sqlcount);
        echo mysqli_num_rows($qsqlcount);
        ?>
        <br />
        Event Types
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
<style>
  #countingbox
{
  width: 150px;
  height: 150px;
  background: #3b95dc;
  -moz-border-radius: 50px;
  -webkit-border-radius: 50px;
  border-radius: 50px;
  float:left;
  margin:5px;
}
.count
{
  line-height: 100px;
  color:white;
  margin-left:20px;
  font-size:70px;
}
.linker
{
  font-size : 20px;
  font-color: black;
}
</style>
<script>
  $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>