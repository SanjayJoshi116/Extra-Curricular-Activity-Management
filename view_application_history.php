<?php
include "header.php";
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='login.php';</script>";
}
?>
</div>

<section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
         Application History
        </h3>
        <p>
         View all event applications
        </p>
      </div>
      <div class="event_container">
        <div class="">
		<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Event Title</th>
			<th>Partcipation Type</th>
			<th>Department</th>
			<th>Participation Status</th>
			<th>Winning Position</th>
			<th>Points</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$sql = "SELECT event_result_status.*,event.*,department.department,event_participation.* FROM event_result_status LEFT JOIN event ON event.event_id = event_result_status.event_id LEFT JOIN department ON department.department_id = event.department_id LEFT JOIN event_participation ON event_participation.event_id = event_result_status.event_id AND event_participation.student_id='$_SESSION[student_id]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);	
		while($rsview = mysqli_fetch_array($qsql))
		{
			
			echo 
			"<tr>
				  <td>$rsview[event_title]
				  <td>$rsview[event_participation_type]</td>
				  <td>$rsview[department]</td>
				  <td>$rsview[event_participation_status]</td>
				  <td>$rsview[winning_position]</td>
				  <td>$rsview[point]</td>
			</tr>";
		}
	?>
	</tbody>
	</table>
   </div>	
      </div>
    </div>
  </section>

		
<?php
include "footer.php";
?>