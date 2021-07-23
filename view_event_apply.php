<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM event_participation where event_participation_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event Participation Record deleted successfully..');</script>";
		echo "<script>window.location='view_event_apply.php';</script>";
	}
}
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
				<td>$rsview[event_id]</td>
				<td>$rsview[student_id]</td>
				<td>$rsview[apply_dt_tim]</td>
				<td>Edit |
				<a href='view_event_apply.php?delid=$rsview[event_participation_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
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