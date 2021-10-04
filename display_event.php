<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          Attendance Entry
        </h3>
        <p>
          Enter Attendance records
        </p>
      </div>
<?php
$sqlview = "SELECT * FROM  event where event_date_time <= CURDATE() AND staff_id='$_SESSION[staff_id]' ORDER BY event_id DESC";
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
			<?php
			if($rsview['event_participation_type'] == "Team")
			{
			?>
			<a href="attendance_team.php?event_id=<?php echo $rsview['event_id']; ?>&attendanceentry=Submit" class="btn btn-success">Attendance Entry</a>
			<?php
			}
			else
			{
			?>
			<a href="attendance.php?event_id=<?php echo $rsview['event_id']; ?>&attendanceentry=Submit" class="btn btn-success">Attendance Entry</a>
			<?php
			}
			?>
            (<?php echo $rsview['event_participation_type'];?> Event)
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