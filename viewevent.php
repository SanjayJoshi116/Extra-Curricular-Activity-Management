<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM event where event_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event Record deleted successfully..');</script>";
		echo "<script>window.location='viewevent.php';</script>";
	}
}
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
			<th>Event Title</th>
			<th>Event Date and Time</th>
			<th>Department</th>
			<th>Event Venue</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT event.*,department.department FROM  event LEFT JOIN department ON event.department_id=department.department_id";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_title]</td>
				<td>$rsview[event_date_time]</td>
				<td>$rsview[department]</td>
				<td>$rsview[event_venue]</td>
				<td>Edit | 
				<a href='viewevent.php?delid=$rsview[event_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
				</td>
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
<script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>