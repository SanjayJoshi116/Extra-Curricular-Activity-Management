<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM event where event_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event Record deleted successfully..');</script>";
		echo "<script>window.location='viewevent.php';</script>";
	}
}
//Approve or Suspend Event Details starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE event SET event_status='$_GET[st]' WHERE event_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event status updated to $_GET[st]');</script>";
		echo "<script>window.location='viewevent.php';</script>";
	}
}
//Approve or Suspend Event Details ends here
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
         View Events
        </h3>
        <p>
         Check all events
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Banner</th>
			<th>Event Category</th>
			<th>Event Title</th>
			<th>Event Date and Time</th>
			<th>Course</th>
			<th>Event Venue</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT event.*,department.department,event_type.event_type FROM  event LEFT JOIN department ON event.department_id=department.department_id LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id ORDER BY event_date_time DESC";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>";
			if($rsview['event_banner'] == "")
			{
				echo "<img src='images/noimage.jpg' style='width: 75px;height: 75px;'>";
			}
			else if(file_exists("imgbanner/" . $rsview['event_banner']))
			{
				echo "<img src='imgbanner/$rsview[event_banner]' style='width: 50px;height: 50px;'>";
			}
			else
			{
				echo "<img src='images/noimage.jpg' style='width: 75px;height: 75px;'>";
			}				
			echo "</td>
				<td>$rsview[event_type]</td>
				<td>$rsview[event_title]";
			echo "<br><b>$rsview[event_participation_type]</b>";
			echo "<br><a href='event_more_det.php?event_id=$rsview[0]' class='btn btn-warning' target='_blank'>View More</a>";
			echo "</td>
				<td>" . date("d-m-Y h:i A",strtotime($rsview['event_date_time'])) . "</td>
				<td>";
$courseid = unserialize($rsview['course_id']);
if(count($courseid) > 1)
{
	foreach($courseid as $courseid)
	{
		$sqlviewcourse = "SELECT * FROM  course  WHERE course_id='$courseid'";
		$qsqlviewcourse = mysqli_query($con,$sqlviewcourse);
		while($rsviewcourse = mysqli_fetch_array($qsqlviewcourse))
		{
			echo $rsviewcourse['course_title'] . " ";
		}
	}
}
else
{
	echo "All Courses";
}
			echo "</td>
				<td>$rsview[event_venue]</td>
				<td>$rsview[event_status] <br>";
				if($rsview['event_status'] == "Active")
				{
					echo "<a href='viewevent.php?st=Inactive&acid=$rsview[event_id]' class='btn btn-primary' onclick='return confirmst()' >Deactivte</a>";
				}
				else
				{
					echo "<a href='viewevent.php?st=Active&acid=$rsview[event_id]' class='btn btn-secondary' onclick='return confirmst()'  >Activate</a>";
				}
			echo"  <td>";
			if(date('Y',strtotime($rsview['event_date_time'])) <= date('Y',strtotime('now')))
			{
				if(date('m',strtotime($rsview['event_date_time'])) <= date('m',strtotime('now')))
				{
					if(date('d',strtotime($rsview['event_date_time'])) <= date('d',strtotime('now')))
					{
					if($rsview['event_participation_type'] == "Team")
					{
					echo "<a href='team_event_result_report.php?event_id=$rsview[event_id]' class='btn btn-success'>Result</a><br>";
					}
					else
					{
					echo "<a href='event_result_report.php?event_id=$rsview[event_id]' class='btn btn-success'>Result</a><br>";
					}
					}
						else
					{
					echo "<a href='addevent.php?editid=$rsview[event_id]' class='btn btn-info'>Edit</a><br><a href='viewevent.php?delid=$rsview[event_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>";
					}
				}
				else
				{
				echo "<a href='addevent.php?editid=$rsview[event_id]' class='btn btn-info'>Edit</a><br><a href='viewevent.php?delid=$rsview[event_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>";
				}
			}
			else
			{
				echo "<a href='addevent.php?editid=$rsview[event_id]' class='btn btn-info'>Edit</a><br><a href='viewevent.php?delid=$rsview[event_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>";
			}
			echo "
				
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