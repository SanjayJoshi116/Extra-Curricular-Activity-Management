<?php
include("header.php");
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
         Results
        </h3>
        <p>
         Check your results
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
<thead>
		<tr>
			<th>Result Status ID</th>
			<th>Event Result ID</th>
			<th>Event ID</th>
			<th>Student ID</th>
			<th>Event Participation ID</th>
			<th>Winning Position</th>
			<th>Points</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  event_result_status ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_status_id]</td>
				<td>$rsview[event_result_id]</td>
				<td>$rsview[event_id]</td>
				<td>$rsview[student_id]</td>
				<td>$rsview[event_participation_id]</td>
				<td>$rsview[winning_position]</td>
				<td>$rsview[point]</td>
			</tr>";
		}
		?>
	</tbody>
</table>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
		
      </div>
    </div>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>