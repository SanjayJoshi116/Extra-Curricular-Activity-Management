<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
  echo "<script>window.location='login.php';</script>";
}
if($rsstaffprofile['staff_type'] == "Admin")
    {
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
 <?php 
}
    if(isset($_SESSION['staff_id']))
    {
   ?>
    <!-- event section -->
    <hr>
  <section class="event_section">
    <div class="container">
      <div class="heading_container">
       <h3>
          My Upcoming Events
        </h3>
      </div>
<?php
$flag=0;
$sqlview = "SELECT * FROM  event where staff_id='$_SESSION[staff_id]'";
$qsqlview = mysqli_query($con,$sqlview);
while($rsview = mysqli_fetch_array($qsqlview))
{
 if(date('Y',strtotime($rsview['event_date_time'])) >= date('Y',strtotime('now')))
      {
        if(date('m',strtotime($rsview['event_date_time'])) >= date('m',strtotime('now')))
        {
          if(date('d',strtotime($rsview['event_date_time'])) > date('d',strtotime('now')))
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
  <br><br>
  <!-- dashboard body starts here -->
  <!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-4 col-md-12 mb-4">

      <!-- Card -->
      <div class="card" id="shadow">

        <div class="card-body">

          <div class="heading_container"><p class="text-uppercase small mb-2"><strong><h3>Add Events Online</h3></strong></p></div>
          <h5 class="font-weight-bold mb-0" style="font-family :monospace">
           Now you can conduct all events through online...<br><br>You can easily organize events through online and students from the college can join to your event ...
          </h5><br>
          <a href="addevent.php"><button class="button-3" role="button"><h1 >Add Events</h1></button></a>
        </div>
      </div>
     </div>
      <!-- Card -->
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4">

      
      <!-- Card -->
      <div class="card" id="shadow">

        <div class="card-body">

          <div class="heading_container"><p class="text-uppercase small mb-2"><strong><h3>Add Result Online</h3></strong></p></div>
          <h5 class="font-weight-bold mb-0" style="font-family :monospace">
           Now you can publish event results online...<br><br>You can easily publish the result of the event you have added and students from the college can view the result of your event ...
          </h5><br>
          <a href="display_eventforresult.php"><button class="button-3" role="button"><h1 >Add Result</h1></button></a>
        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4">

     <!-- Card -->
      <div class="card" id="shadow">

        <div class="card-body">

          <div class="heading_container"><p class="text-uppercase small mb-2"><strong><h3>View Complaints</h3></strong></p></div>
          <h5 class="font-weight-bold mb-0" style="font-family :monospace">
           Now you can view complaints and give reply...<br><br>You can view compaints and reply to the student who sent the complaints and students from the college can add the complaint ...
          </h5><br>
          <a href="view-complaint.php"><button class="button-3" role="button"><h1 >Complaint</h1></button></a>
        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->

</section>
<!--Section: Block Content-->
  <!-- Ends here -->
  <br><br><br>
<?php
include("footer.php");
?>
<style>
#shadow {
  border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px #888888;
}
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
  font-size : 10px;
  font-color: black;
}
.button-3 {
  appearance: none;
  background-color: #2ea44f;
  border: 5px solid rgba(27, 31, 35, .15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
  font-weight: 600;
  line-height: 20px;
  padding: inherit;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
  width:50%;
    margin-left:25%;
    margin-right:75%;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
  box-shadow: none;
  outline: none;
}

.button-3:hover {
  background-color: #2c974b;
}

.button-3:focus {
  box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
  outline: none;
}

.button-3:disabled {
  background-color: #94d3a2;
  border-color: rgba(27, 31, 35, .1);
  color: rgba(255, 255, 255, .8);
  cursor: default;
}

.button-3:active {
  background-color: #298e46;
  box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
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