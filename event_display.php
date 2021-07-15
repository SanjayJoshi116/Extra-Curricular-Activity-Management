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
			<th>Event Id</th>
			<th>Student Title</th>
			<th>Event Date and Time Id</th>
			<th>Department Id</th>
			<th>Event Venue</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  event";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_id]</td>
				<td>$rsview[event_title]</td>
				<td>$rsview[event_date_time]</td>
				<td>$rsview[department_id]</td>
				<td>$rsview[event_venue]</td>
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