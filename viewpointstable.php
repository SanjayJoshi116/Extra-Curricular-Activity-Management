<?php
include("header.php");
if(!isset($_SESSION['student_id']) && !isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM student where student_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Student Record deleted successfully..');</script>";
		echo "<script>window.location='viewstudent.php';</script>";
	}
}
//Approve or Suspend Student Account starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE student SET student_status='$_GET[st]' WHERE student_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Student account status updated to $_GET[st]');</script>";
		echo "<script>window.location='viewstudent.php';</script>";
	}
}
//Approve or Suspend Student Account ends here
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <center><h3>
          View Points Table
        </h3>
        <p>
          View Points List
        </p></center>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th style='text-align: center;'>Rank</th>
			<th>Image</th>
			<th>Student Name</th>
			<th>Course & Class</th>
			<th style='text-align: center;'>Total Points</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT student_id, student_name, student_rollno, student_image, st_class, ifnull((SELECT sum(point) FROM event_result_status WHERE student_id=student.student_id),0) as totalpoint, @rownum := @rownum + 1 AS rank, course.course_title FROM student LEFT JOIN course ON course.course_id=student.course_id, (SELECT @rownum := 0) r ORDER BY `totalpoint` DESC;";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			$rsjsonarr = json_encode($rsview);
			if($rsview['student_image'] == "")
			{
				$filename= "images/defaultimage.png";
			}
			else if(file_exists("studentimg/" .$rsview['student_image']))
			{
				$filename= "studentimg/" .$rsview['student_image'];
			}
			else
			{
				$filename= "images/defaultimage.png";
			}
			echo "<tr>
				<th style='text-align: center;vertical-align: middle;'><label class='btn btn-info'>$rsview[rank]</label></th>
				<td><img src='$filename' style='width: 75px;height:90px;' ></td>
				<td>$rsview[student_name]
				<br>
				<b>Roll No.</b> $rsview[student_rollno]
				</td>
				<td>
				<b>Course - </b> $rsview[course_title]
				<br>
				<b>Class - </b> $rsview[st_class]</td>
				<th style='text-align: center;vertical-align: middle;'>";
			if($rsview['rank'] == 1)
			{
			echo "<i class='fa fa-trophy btn btn-success fa-2x' aria-hidden='true'> $rsview[totalpoint]</i> ";
			}
			else
			{
			echo "<label class='btn btn-success'>$rsview[totalpoint] </label>";
			}
			echo "</th>
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
<!-- Modal -->
<div id="loadStudentDetailedModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Student Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="loadstudentprofile"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
function funloadstudentprofile(jsonarr)
{
	var tbl = "";
	var tbl = "<table class='table table-bordered'>"
    tbl += "<tr><th>Name</th><td>" + jsonarr.student_name +"</td></tr>";
    tbl += "<tr><th>Roll No.</th><td>" + jsonarr.student_rollno +"</td></tr>";
    tbl += "<tr><th>Course</th><td>" + jsonarr.course_title +"</td></tr>";
    tbl += "<tr><th>Class</th><td>" + jsonarr.st_class +"</td></tr>";
    tbl += "<tr><th>Course</th><td>" + jsonarr.course_title +"</td></tr>";
    tbl += "<tr><th>Gender</th><td>" + jsonarr.gender +"</td></tr>";
    tbl += "<tr><th>Date of Birth</th><td>" + jsonarr.dob +"</td></tr>";
    tbl += "<tr><th>Language</th><td>" + jsonarr.language +"</td></tr>";
    tbl += "<tr><th>Course</th><td>" + jsonarr.course_title +"</td></tr>";
    tbl += "<tr><th>Elective Paper</th><td>" + jsonarr.elective_paper +"</td></tr>";
    tbl += "<tr><th>Extension Activities</th><td>" + jsonarr.extension_activities +"</td></tr>";
    tbl += "<tr><th>Account Status</th><td>" + jsonarr.student_status +"</td></tr>";
	tbl += "</table>"
	$('#loadstudentprofile').html(tbl)
}
</script>