<?php
include "header.php";
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE event_participation SET event_participation_status='$_GET[st]' WHERE student_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Student attendance status updated to $_GET[st]');</script>";
		echo "<script>window.location='attendance.php';</script>";
	}
}
?>
</div>
<section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
         Attendance
        </h3>
        <p>
         Attendance for the Event
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
<thead>
		<tr>
			<th>Event ID & Title</th>
			<th>Student Rollno & Name</th>
			<th>Attendance</th>
		</tr>
	</thead>
	<tbody>
  <?php 
  	$sqlview = "SELECT event_participation.*,event.event_title,student.student_name,student.student_rollno FROM event_participation LEFT JOIN event ON event.event_id=event_participation.event_id LEFT JOIN student ON event_participation.student_id=student.student_id ORDER BY event_id";
	$qsqlview = mysqli_query($con,$sqlview);
	while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_id] ($rsview[event_title])</td>
				<td>$rsview[student_rollno] ($rsview[student_name])</td>
				<td>$rsview[event_participation_status]<br>";
			if($rsview['event_participation_status'] == "Present")
			{
				echo "<a href='attendance.php?st=Absent&acid=$rsview[student_id]' class='btn btn-secondary' onclick='return confirmst()' >Absent</a>";
			}
			else
			{
				echo "<a href='attendance.php?st=Present&acid=$rsview[student_id]' class='btn btn-primary' onclick='return confirmst()'  >Present</a>";
			}
			echo"
				</td>
			</tr>";
		}
  ?>
	</tbody>
</table>
</div>
</div>
</div>
</section>

<?php
include "footer.php";
?>	