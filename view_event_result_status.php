<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM event_result_status where result_status_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event Result Status Record deleted successfully..');</script>";
		echo "<script>window.location='view_event_result_status.php';</script>";
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
         Check your results
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
<thead>
		<tr>
			<th>Event Result ID</th>
			<th>Event Id</th>
			<th>Student Rollno</th>
			<th>Event Participation ID</th>
			<th>Winning Position</th>
			<th>Points</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT event_result_status.*,student.student_rollno,student.student_name FROM  event_result_status LEFT JOIN student ON event_result_status.student_id=student.student_id";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_result_id]</td>
				<td>$rsview[event_id]</td>
				<td>$rsview[student_rollno] ($rsview[student_name])</td>
				<td>$rsview[event_participation_id]</td>
				<td>$rsview[winning_position]</td>
				<td>$rsview[point]</td>
				<td>
				<a href='event_result_status.php?editid=$rsview[result_status_id]' class='btn btn-info'>Edit</a>
				<a href='view_event_result_status.php?delid=$rsview[result_status_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
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