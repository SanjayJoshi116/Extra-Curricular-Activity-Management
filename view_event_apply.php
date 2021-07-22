<?php
include("header.php");
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
         Application
        </h3>
        <p>
         Check applications
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Event Participation ID</th>
			<th>Event ID</th>
			<th>Student ID</th>
			<th>Apply Date & Time</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  event_participation";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_participation_id]</td>
				<td>$rsview[event_id]</td>
				<td>$rsview[student_id]</td>
				<td>$rsview[apply_dt_tim]</td>
				<td>Delete</td>
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