<?php
include("header.php");
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_GET['unenroll_id']))
{
	$sqlevent_participation = "DELETE FROM event_participation WHERE event_participation_id='" . $_GET['unenroll_id'] ."'";
	$qsqlevent_participation= mysqli_query($con,$sqlevent_participation);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Your Event Participation Unenrolled successfully..');</script>";
		echo "<script>window.location='my_upcoming_events.php';</script>";
	}
}
?>
</div>
  <!-- event section -->
<hr>

  <!-- event section -->
  <section class="event_section">
    <div class="container">
      <div class="heading_container">
       <h3>
          &nbsp; My Upcoming Events
        </h3>
      </div>
      <hr>
<?php
$sqlview = "SELECT * FROM  event_participation LEFT JOIN event ON event_participation.event_id=event.event_id where event.event_date_time > '$dttim'";
if(isset($_SESSION['student_id']))
{
$sqlview = $sqlview  . " AND student_id='$_SESSION[student_id]'";
}
$sqlview = $sqlview. " ORDER BY event_date_time DESC";
//echo $sqlview;
$qsqlview = mysqli_query($con,$sqlview);
$flag=0;
while($rsview = mysqli_fetch_array($qsqlview))
{
	$flag=1;
	$sqlevent_result_status = "SELECT * FROM event_result_status where event_id='$rsview[event_id]' and student_id='$_SESSION[student_id]'";
	$qsqlevent_result_status = mysqli_query($con,$sqlevent_result_status);
	$rsevent_result_status = mysqli_fetch_array($qsqlevent_result_status);
?>
<div class="boxd">
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
		  <centeR><?php echo date("d-M-Y h:i A",strtotime($rsview['event_date_time']));?><br>
		  <?php echo $rsview['event_venue'];?> (<?php echo $rsview['event_participation_type'];?> Event)<br>
		</centeR>
		</h6>
		</div>
		<div class="date-box">
		<h3>
		</h3>
			<a href="my_upcoming_events.php?unenroll_id=<?php echo $rsview[0]; ?>" class="btn btn-danger btn-lg" onclick="return fununenroll()">UnEnroll</a>
		</div>
	</div>
</div>
</div>
<?php
}
if($flag==0)
{
  ?>
  <div style="  font-family: Lucida Console, Courier New, monospace;">
    <br><h3 style=" color : red"> You are not partcipated in any events...</h3>
  <a href="upcoming-event.php">Click here to check new events to participate...</a>
      <br><br>
  </div>
  <?php
}
?>
    </div>
  </section>

<style>
.boxd {
  background: white;
}

.boxd:hover {
  background-color: #febfb9;
  cursor: pointer;
  -webkit-transition: background-color 2s ease-out;
  -moz-transition: background-color 2s ease-out;
  -o-transition: background-color 2s ease-out;
  transition: background-color 2s ease-out;
}
</style>
  <!-- end event section -->
<?php
include("footer.php");
?>
<script>
function fununenroll()
{
	if(confirm("Are you sure?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>