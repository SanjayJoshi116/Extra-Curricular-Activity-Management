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
//Approve or Suspend Event Details starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE event SET event_status='$_GET[st]' WHERE event_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event status updated to $_GET[st]');</script>";
		echo "<script>window.location='viewevent.php';</script>";
	}
}
//Approve or Suspend Event Details ends here
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
         Event
        </h3>
        <p>
         Check all events
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Event Title</th>
			<th>Event Type</th>
			<th>Event Date and Time</th>
			<th>Department</th>
			<th>Event Venue</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT event.*,department.department,event_type.event_type FROM  event LEFT JOIN department ON event.department_id=department.department_id LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_title]</td>
				<td>$rsview[event_type]</td>
				<td>$rsview[event_date_time]</td>
				<td>$rsview[department]</td>
				<td>$rsview[event_venue]</td>
				<td>$rsview[event_status] <br>";
				if($rsview['event_status'] == "Active")
{
	echo "<a href='viewevent.php?st=Completed&acid=$rsview[event_id]' class='btn btn-primary' onclick='return confirmst()' >Completed</a>";
}
else
{
	echo "<a href='viewevent.php?st=Active&acid=$rsview[event_id]' class='btn btn-secondary' onclick='return confirmst()'  >Activate</a>";
}
			echo"<td>
				<a href='addevent.php?editid=$rsview[event_id]' class='btn btn-info'>Edit</a>
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