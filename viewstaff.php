<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM staff where staff_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Staff Record deleted successfully..');</script>";
		echo "<script>window.location='viewstaff.php';</script>";
	}
}
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          View Staff
        </h3>
        <p>
          View Staff Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Staff Name</th>
			<th>Staff ID</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Designation</th>
			<th>Image</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  staff ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[staff_name]</td>
				<td>$rsview[login_id]</td>
				<td>$rsview[gender]</td>
				<td>$rsview[dob]</td>
				<td>$rsview[staff_type]</td>
				<td>$rsview[staff_dp]</td>
				<td>$rsview[staff_status]</td>
				<td>Edit |
				<a href='viewstaff.php?delid=$rsview[staff_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
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