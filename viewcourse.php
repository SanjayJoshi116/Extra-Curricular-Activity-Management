<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM course where course_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Course Record deleted successfully..');</script>";
		echo "<script>window.location='viewcourse.php';</script>";
	}
}
//Approve or Suspend course starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE course SET course_status='$_GET[st]' WHERE course_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('course status updated to $_GET[st]');</script>";
		echo "<script>window.location='viewcourse.php';</script>";
	}
}
//Approve or Suspend course ends here
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
           View Course
        </h3>
        <p>
          View Course Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Course Title</th>
			<th>Course Description</th>
			<th>Course Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  course ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[course_title]</td>
				<td>$rsview[course_description]</td>
				<td>$rsview[course_status]<br>";
				if($rsview['course_status'] == "Active")
				{
				echo "<a href='viewcourse.php?st=Suspended&acid=$rsview[course_id]' class='btn btn-secondary' onclick='return confirmst()' >Suspend</a>";
				}	
				else
				{
				echo "<a href='viewcourse.php?st=Active&acid=$rsview[course_id]' class='btn btn-primary' onclick='return confirmst()'  >Approve</a>";
				}
				echo "</td><td> 
				
				<a href='courseentry.php?editid=$rsview[course_id]' class='btn btn-info' >Edit</a>
				 
				<a href='viewcourse.php?delid=$rsview[course_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
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