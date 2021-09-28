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
<br> 
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Event title</th>
			<th>Event Date</th>
			<th>Ranking</th>
			<th>Total Points</th>
		</tr>
	</thead>
	<tbody>
<?php
$totapoint = 0 ;
$sqlview = "SELECT * FROM  event_participation LEFT JOIN event ON event_participation.event_id=event.event_id where event.event_date_time < '$dttim' AND student_id='$_SESSION[student_id]'";
$sqlview = $sqlview. " ORDER BY event_date_time";
$qsqlview = mysqli_query($con,$sqlview);
while($rsview = mysqli_fetch_array($qsqlview))
{
	$sqlevent_result_status = "SELECT * FROM event_result_status where event_id='$rsview[event_id]' and student_id='$_SESSION[student_id]'";
	$qsqlevent_result_status = mysqli_query($con,$sqlevent_result_status);
	$rsevent_result_status = mysqli_fetch_array($qsqlevent_result_status);
?>
		<tr>
			<td><?php echo $rsview['event_title'];?> (<?php echo $rsview['event_participation_type'];?> Event)</td>
			<td><?php echo date("d-M-Y h:i A",strtotime($rsview['event_date_time']));?></td>
			<td><?php 
			if($rsevent_result_status['winning_position'] == 0)
			{
				if($rsevent_result_status['point'] >= 1)
				{
					echo "Participated";
				}
				else
				{
					echo "Abent";
				}
			}
			else if($rsevent_result_status['winning_position'] == 1)
			{
				echo "1st Rank";
			}
			else if($rsevent_result_status['winning_position'] == 2)
			{
				echo "2nd Rank";
			}
			else if($rsevent_result_status['winning_position'] == 3)
			{
				echo "3rd Rank";
			}
			
				?></td>
			<th style="text-align: center;"><?php echo $rsevent_result_status['point']; ?></th>
		</tr>
<?php
	$totapoint  = $totapoint  + $rsevent_result_status['point'];
}
?>

	<thead>
		<tr>
			<th></th>
			<th></th>
			<th>Total Points</th>
			<th style="text-align: center;"><?php echo $totapoint; ?></th>
		</tr>
	</thead>
	</tbody>
</table>
    </div>
  </section>
<br>
  <!-- end event section -->
<?php
include("footer.php");
?>