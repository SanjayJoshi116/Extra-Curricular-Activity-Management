<?php
include "header.php";
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_GET['attendanceentry']))
{
	$sqlatt = "SELECT * FROM event_participation WHERE event_id='$_GET[event_id]' AND event_participation_status='Applied'";
	$qsqlatt  = mysqli_query($con,$sqlatt);
	$rsatt = mysqli_fetch_array($qsqlatt);
	if(mysqli_num_rows($qsqlatt) >= 1)
	{
	$sqlattendance = "UPDATE event_participation SET event_participation_status='Present' WHERE event_id='$_GET[event_id]'";
	$qsqlattendance = mysqli_query($con,$sqlattendance);
	}
	echo "<script>window.location='attendance.php?event_id=$_GET[event_id]';</script>";
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
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Event Title</th>
			<th>Event Type</th>
			<th>Event Date and Time</th>
			<th>Department</th>
			<th>Event Venue</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT event.*,department.department,event_type.event_type FROM  event LEFT JOIN department ON event.department_id=department.department_id LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id WHERE event.event_id='$_GET[event_id]'";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_title]</td>
				<td>$rsview[event_type]</td>
				<td>" . date('d-m-Y',strtotime($rsview['event_date_time'])) . "</td>
				<td>$rsview[department]</td>
				<td>$rsview[event_venue]</td>
			</tr>";
		}
		?>
	</tbody>
</table>
<hr>
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
<thead>
		<tr>
			<th>Student Rollno</th>
			<th>Student Name</th>
			<th>Attendance</th>
		</tr>
	</thead>
	<tbody>
  <?php 
  	$sqlview = "SELECT event_participation.*,event.event_title,student.student_name,student.student_rollno FROM event_participation LEFT JOIN event ON event.event_id=event_participation.event_id LEFT JOIN student ON event_participation.student_id=student.student_id WHERE event_participation.event_id='$_GET[event_id]' ORDER BY event_id";
	$qsqlview = mysqli_query($con,$sqlview);
	while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[student_name]</td>
				<td>";
				echo "<input type='radio' name='attstatus$rsview[0]' id='attstatus$rsview[0]'  style='-ms-transform: scale(1.5);
    -webkit-transform: scale(1.5); transform: scale(1.5);'  onclick='fadeToZero($rsview[0],`Present`)' ";
	if($rsview['event_participation_status'] == "Present")
	{
		echo "checked";
	}
	echo "> Present &nbsp; ";
				echo "<input type='radio' name='attstatus$rsview[0]' id='attstatus$rsview[0]' style='-ms-transform: scale(1.5);
    -webkit-transform: scale(1.5); transform: scale(1.5);' onclick='fadeToZero($rsview[0],`Absent`)' ";
	if($rsview['event_participation_status'] == "Absent")
	{
		echo "checked";
	}
	echo "> Absent";
				echo "&nbsp;<span id='attst$rsview[0]' style='right: 0;color: green;display: none;'><i class='fa fa-hand-o-right' aria-hidden='true'></i> Submitted</span>";
			echo"</td></tr>";
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
<script>
function fadeToZero(viewid, attendance)
{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		document.querySelector('#attst' + viewid).style.display = "";
		setTimeout(function(){
		document.querySelector('#attst' + viewid).style.display = "none";
		}, 3000);
	  }
	};
	xmlhttp.open("GET","ajaxattendance.php?viewid="+viewid+"&attendance="+attendance,true);
	xmlhttp.send();
}
</script>