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
//Approve or Suspend Staff Account starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE staff SET staff_status='$_GET[st]' WHERE staff_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Staff account status updated to $_GET[st]');</script>";
		echo "<script>window.location='viewstaff.php';</script>";
	}
}
//Approve or Suspend Staff Account ends here
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
			<th>Image</th>
			<th>Staff Name</th>
			<th>Staff ID</th>
			<th>Department</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Designation</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT staff.*,department.department FROM  staff LEFT JOIN department ON department.department_id=staff.department_id";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			$rsjsonarr = json_encode($rsview);
			if($rsview['staff_dp'] == "")
			{
				$filename= "images/defaultimage.png";
			}
			else if(file_exists("staffimg/" .$rsview['staff_dp']))
			{
				$filename= "staffimg/" .$rsview['staff_dp'];
			}
			else
			{
				$filename= "images/defaultimage.png";
			}
			echo "<tr>
				<td><img src='$filename' style='width: 75px;height:90px;' ></td>
				<td>$rsview[staff_name]</td>
				<td>$rsview[login_id]</td>
				<td>$rsview[department]</td>
				<td>$rsview[gender]</td>
				<td>$rsview[dob]</td>
				<td>$rsview[staff_type]</td>
				<td>$rsview[staff_status] <br>";
				if($rsview['staff_status'] == "Active")
{
	echo "<a href='viewstaff.php?st=Suspended&acid=$rsview[staff_id]' class='btn btn-secondary' onclick='return confirmst()' >Suspend</a>";
}
else
{
	echo "<a href='viewstaff.php?st=Active&acid=$rsview[staff_id]' class='btn btn-primary' onclick='return confirmst()'  >Approve</a>";
}
echo"</td>
				<td>
				<a href='staffupdate.php?editid=$rsview[staff_id]' class='btn btn-info'>Edit</a>
				<a href='viewstaff.php?delid=$rsview[staff_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
			</td></tr>";
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