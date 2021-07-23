<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM event_result where event_result_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event Result Record deleted successfully..');</script>";
		echo "<script>window.location='view_event_result.php';</script>";
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
         Check added results
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
<thead>
		<tr>
			<th>Event ID</th>
			<th>Staff ID</th>
			<th>Result Details</th>
			<th>Event Documentry</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  event_result ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_id]</td>
				<td>$rsview[staff_id]</td>
				<td>$rsview[result_detail]</td>
				<td>$rsview[event_documentry]</td>
				<td>Edit |
				<a href='view_event_result.php?delid=$rsview[course_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a></td>
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