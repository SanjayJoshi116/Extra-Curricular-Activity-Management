<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM complaint_report where complaint_report_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Complaint Record deleted successfully..');</script>";
		echo "<script>window.location='view-complaint.php';</script>";
	}
}
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE complaint_report SET complaint_status='$_GET[st]' WHERE complaint_report_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Complaint status updated to $_GET[st]');</script>";
		echo "<script>window.location='view-complaint.php';</script>";
	}
}
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
         Complaints
        </h3>
        <p>
         Check complaints
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Student Rollno</th>
			<th>Staff ID</th>
			<th>Reply Complaint ID</th>
			<th>Complaint Details</th>
			<th>Complaint Document</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT complaint_report.*,student.student_name, student.student_rollno, staff.staff_name, staff.login_id FROM complaint_report LEFT JOIN student ON student.student_id=complaint_report.student_id LEFT JOIN staff ON complaint_report.staff_id=staff.staff_id";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[student_name] ($rsview[student_rollno])</td>
				<td>$rsview[staff_name] ($rsview[login_id])	</td>
				<td>$rsview[reply_complaint_report_id]</td>
				<td>$rsview[complaint_detail]</td>
				<td>$rsview[complain_doc]</td>
				<td>$rsview[complaint_status] <br>";
				if($rsview['complaint_status'] == "Active")
{
	echo "<a href='view-complaint.php?st=Resolved&acid=$rsview[complaint_report_id]' class='btn btn-primary' onclick='return confirmst()' >Resolve</a>";
}
				echo"</td>
				<td>
				<a href='view-complaint.php?delid=$rsview[complaint_report_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
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