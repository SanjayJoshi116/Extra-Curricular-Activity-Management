<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM event_type where event_type_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event Type Record deleted successfully..');</script>";
		echo "<script>window.location='view_event_type.php';</script>";
	}
}
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
           View Event Type
        </h3>
        <p>
          View Event Type Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Event Type</th>
			<th>Event Type Info</th>
			<th>First Place Points</th>
			<th>Second Place Points</th>
			<th>Third Place Points</th>
			<th>Other Points</th>
			<th>Event Type Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  event_type ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_type]</td>
				<td>$rsview[event_type_info]</td>
				<td>$rsview[firstplace_point]</td>
				<td>$rsview[secondplace_point]</td>
				<td>$rsview[thirdplace_point]</td>
				<td>$rsview[others_point]</td>
				<td>$rsview[event_type_status]</td>
				<td>Edit | 
				<a href='view_event_type.php?delid=$rsview[event_type_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
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