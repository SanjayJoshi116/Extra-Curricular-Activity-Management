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
				<td>$rsview[department_status]</td>
				<td>Edit | 
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