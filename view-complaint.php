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
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT complaint_report.*,student.student_rollno FROM complaint_report LEFT JOIN student ON complaint_report.student_id=student.student_rollno";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[staff_id]</td>
				<td>$rsview[reply_complaint_report_id]</td>
				<td>$rsview[complaint_detail]</td>
				<td>$rsview[complain_doc]</td>
				<td>Edit |
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