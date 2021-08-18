<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
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
        <h3>
          View Students
        </h3>
        <p>
          View Student Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Image</th>
			<th>Student Name</th>
			<th>Course</th>
			<th>Roll No.</th>
			<th>Class</th>
			<th>Gender</th>
			<th>More</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT student.*,course.course_title FROM  student LEFT JOIN course ON course.course_id=student.course_id";
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
				<td><img src='$filename' style='width: 75px;height:90px;' ></td>
				<td>$rsview[student_name]</td>
				<td>$rsview[course_title]</td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[st_class]</td>
				<td>$rsview[gender]</td>
				<td>";
echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#loadStudentDetailedModal' onclick='funloadstudentprofile($rsjsonarr)'>View<br> More</button>";				
				echo "</td>
				<td>$rsview[student_status] <br>";
if($rsview['student_status'] == "Active")
{
	echo "<a href='viewstudent.php?st=Suspended&acid=$rsview[student_id]' class='btn btn-secondary' onclick='return confirmst()' >Suspend</a>";
}
else
{
	echo "<a href='viewstudent.php?st=Active&acid=$rsview[student_id]' class='btn btn-primary' onclick='return confirmst()'  >Approve</a>";
}
				echo "</td>
				<td>
				
				<a href='studentadd.php?editid=$rsview[student_id]' class='btn btn-info'>Edit</a>
				
				<a href='viewstudent.php?delid=$rsview[student_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
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