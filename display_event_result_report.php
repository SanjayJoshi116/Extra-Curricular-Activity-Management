<?php
include("header.php");
?>
</div>
  <!-- event section -->
<hr>

  <!-- event section -->
  <section class="event_section">
    <div class="container">
      <div class="heading_container">
       <h3>
          &nbsp; My Recent Participation Result
        </h3>
      </div>
<?php
$sqlview = "SELECT * FROM  event_participation LEFT JOIN event ON event_participation.event_id=event.event_id where event.event_date_time < '$dttim'";
if(isset($_SESSION['student_id']))
{
$sqlview = $sqlview  . " AND student_id='$_SESSION[student_id]'";
}
$sqlview = $sqlview. " ORDER BY event_date_time";
$qsqlview = mysqli_query($con,$sqlview);
$flag=0;
while($rsview = mysqli_fetch_array($qsqlview))
{
	$flag=1;
	$sqlevent_result_status = "SELECT * FROM event_result_status where event_id='$rsview[event_id]' and student_id='$_SESSION[student_id]'";
	$qsqlevent_result_status = mysqli_query($con,$sqlevent_result_status);
	$rsevent_result_status = mysqli_fetch_array($qsqlevent_result_status);
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
		  <centeR><?php echo date("d-M-Y h:i A",strtotime($rsview['event_date_time']));?><br>
		  <?php echo $rsview['event_venue'];?> 
		(<?php echo $rsview['event_participation_type'];?> Event)<br>
		<?php
		if(isset($_SESSION['student_id']))
		{
			if($rsevent_result_status['winning_position'] != 0)
			{
			?>
			<b style="color: green;">Your ranking is <?php echo $rsevent_result_status['winning_position']; ?> and you have scored <?php echo $rsevent_result_status['point']; ?> Points</b>
			<?php
			}
			else
			{
			?>
			<b style="color: red;">Absent</b>
			<?php
			}
		}
		?>
		</centeR>
		</h6>
		</div>
		<div class="date-box">
		<h3>
		</h3>
			<a href="team_event_result_report.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-info btn-lg">View Result</a><hr>
		<?php
		if($rsevent_result_status['winning_position'] != 0)
		{
		?>
			<a href="certificate.php?event_id=<?php echo $rsview['event_id']; ?>" class="btn btn-warning btn-lg">Download Certificate</a>
		<?php
		}
		?>
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

  <!-- end event section -->
<?php
include("footer.php");
?>