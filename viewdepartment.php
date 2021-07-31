<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM department where department_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Department Record deleted successfully..');</script>";
		echo "<script>window.location='viewdepartment.php';</script>";
	}
}
//Approve or Suspend department starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE department SET department_status='$_GET[st]' WHERE department_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('department status updated to $_GET[st]');</script>";
		echo "<script>window.location='viewdepartment.php';</script>";
	}
}
//Approve or Suspend department ends here
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          View Department
        </h3>
        <p>
          View Department Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Department ID</th>
			<th>Department</th>
			<th>Department Details</th>
			<th>Department Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  department ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[department_id]</td>
				<td>$rsview[department]</td>
				<td>$rsview[department_detail]</td>
				<td>$rsview[department_status]";
				if($rsview['department_status'] == "Active")
				{
				echo "<a href='viewdepartment.php?st=Suspended&acid=$rsview[department_id]' class='btn btn-secondary' onclick='return confirmst()' >Suspend</a>";
				}	
				else
				{
				echo "<a href='viewdepartment.php?st=Active&acid=$rsview[department_id]' class='btn btn-primary' onclick='return confirmst()'  >Approve</a>";
				}
				echo "</td><td>
				<a href='departmentupdate.php?editid=$rsview[department_id]' class='btn btn-info'>Edit</a> 
				<a href='viewdepartment.php?delid=$rsview[department_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
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
<script>
function confirmst()
{
	if(confirm("Are you sure?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>