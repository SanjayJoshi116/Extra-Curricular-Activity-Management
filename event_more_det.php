<?php
include("header.php");
$sqlviewevent = "SELECT event.*, event_type.event_type, department.department,course.course_title, staff.staff_name, staff.staff_type FROM event 
LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id 
LEFT JOIN department ON department.department_id=event.department_id LEFT JOIN course ON course.course_id=event.course_id 
LEFT JOIN  staff ON staff.staff_id=event.staff_id
where event.event_id='$_GET[event_id]'";
$qsqlviewevent = mysqli_query($con,$sqlviewevent);
echo mysqli_error($con);
$rsviewevent = mysqli_fetch_array($qsqlviewevent);
if(isset($_POST['submit']))
{
	$apply_dt_tim=date('Y-m-d H:i:s');
	$sql = "INSERT INTO event_participation(event_id,student_id,event_participation_type,team,apply_dt_tim,event_participation_status) VALUES ('$_GET[event_id]','$_SESSION[student_id]','$rsviewevent[event_participation_type]','0','$apply_dt_tim','Applied')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('You have Enrolled successfully...');</script>";
		echo "<script>window.location='upcoming-event.php';</script>";
	}
}
?>
</div>
<br>
  <!-- special section -->

  <section class="special_section">
    <div class="container">
      <div class="special_container">
        <div class="box b1">
          <div class="img-box">
            <img src="images/award.png" alt="" />
          </div>
          <div class="detail-box">
            <h4><?php echo  $rsviewevent['event_type']; ?></h4>
          </div>
        </div>
        <div class="box b2">
          <div class="img-box">
            <img src="images/study.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              <?php echo $rsviewevent['event_title']; ?>
            </h4>
          </div>
        </div>
        <div class="box b3">
          <div class="img-box">
            <img src="images/books-stack-of-three.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              <?php echo date("d-m-Y h:i A",strtotime($rsviewevent['event_date_time'])) ?>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end special section -->

  <!-- about section -->
  <section class="about_section layout_padding">

    <div class="container  table table-bordered">
      <div class="row">
        <div class="col-md-5">
          <div class="img_container">
            <div class="img-box b1">
<?php
$imge=$rsviewevent['event_banner'];
echo '<img src="imgbanner/' .$imge .'" >';
?>			  
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h3> &nbsp;  <?php echo  $rsviewevent['event_title']; ?></h3>
            <p>
				<table class="table table-bordered table-striped" style="width: 100%;">
					<tr>
						<th style="width: 40%;">Event Type : </th><td><?php echo  $rsviewevent['event_type']; ?> </td>
					</tr>
					<tr>
						<th>Event Participation Type : </th><td><?php echo  $rsviewevent['event_participation_type']; ?> </td>
					</tr>
					<?php
					if($rsviewevent['event_participation_type'] == "Team")
					{
					?>
					<tr>
						<th>Number of Members in the Team : </th><td><?php echo  $rsviewevent['no_of_participants']; ?> </td>
					</tr>
					<?php
					}
					?>
					<tr>
						<th>Department : </th><td><?php echo  $rsviewevent['department']; ?> </td>
					</tr>
					<tr>
						<th>Course : </th><td><?php
						if($rsviewevent['course_id'] == 0)
						{
							echo "All Courses";
						}
						else
						{
							echo $rsviewevent['course_title']; 
						}
							?> </td>
					</tr>
					<tr>
						<th>Class : </th><td><?php
						if($rsviewevent['st_class'] == 0)
						{
							echo "All Class";
						}
						else
						{
							echo $rsviewevent['st_class']; 
						}
							?></td>
					</tr>
					<tr>
						<th>Staff Incharge : </th><td><?php echo  $rsviewevent['staff_name']; ?> (<?php echo  $rsviewevent['staff_type']; ?>) </td>
					</tr>
					<tr>
						<th>Last date for Participation: </th><td><?php echo $stop_date = date('d-m-Y', strtotime($rsviewevent['event_date_time'] . ' -2 day')); ?> </td>
					</tr>
					<tr>
						<th>Maximum Limit: </th><td><?php echo $rsviewevent['participation_limit']; ?> </td>
					</tr>
					<tr>
						<th>Club: </th><td><?php echo $rsviewevent['club']; ?> </td>
					</tr>
					<tr>
						<th>Points: </th><td><?php 
							echo "First Place - " . $rsviewevent['firstplace_point'] . "<br>"; 
							echo "Second Place - " . $rsviewevent['secondplace_point'] . "<br>"; 
							echo "Third Place - " . $rsviewevent['thirdplace_point'] . "<br>"; 
							echo "Participation Point - " . $rsviewevent['participation_point'] . "<br>"; 
							?> </td>
					</tr>
				</table> 
			</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container  table table-bordered" >
      <div class="heading_container">
        <h3>
           &nbsp;  Event Details
        </h3>
        <p><?php echo  $rsviewevent['event_description']; ?></p>
      </div>
    </div>
    <div class="container  table table-bordered" >
      <div class="heading_container">
        <h3>
          &nbsp;   Event Rules
        </h3>
        <p><?php echo  $rsviewevent['event_rules']; ?></p>
      </div>
    </div>
  </section>


  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="detail-box">
           <center> 
			<h3>
              Participate Event
            </h3>
            <p>
              No. of Participants - 
			  <?php
			  $sqlparticipantscount  = "SELECT * FROM `event_participation` WHERE event_id='$_GET[event_id]'";
			  $qsqlparticipantscount = mysqli_query($con,$sqlparticipantscount);
			  echo mysqli_num_rows($qsqlparticipantscount);
			  ?>
            </p>       
<?php
$sqlchkparticipation = "SELECT * FROM event_participation WHERE event_id='$_GET[event_id]' AND student_id='$_SESSION[student_id]'";
$qsqlchkparticipation = mysqli_query($con,$sqlchkparticipation);
if(mysqli_num_rows($qsqlchkparticipation) >= 1)
{
?>
<a href="#" onclick="alert('You have already applied for this Event..')" class="btn btn-danger">You have already applied for this Event</a>
<?php
}
else
{
	$stop_date = date('Y-m-d', strtotime($rsviewevent['event_date_time'] . ' -2 day'));
	$eventdate  = strtotime($dt);
	$last_date = strtotime($stop_date);
	if($last_date >= $eventdate)
	{
		if(isset($_SESSION['student_id']))
		{
	?>
	<form method="post" action="">
	<button type="submit" name="submit" id="submit" class="btn btn-info" onclick="return confirmparticipation()">Click Here to participate</button>
	</form>
	<?php
		}
		else
		{
		?>
		<a href="#" onclick="alert('Participation not allowed..')" class="btn btn-secondary">Participation Option Closed</a>
		<?php
		}
	}
	else
	{
	?>
	<a href="#" onclick="alert('Participation not allowed..')" class="btn btn-secondary">Participation Option Closed</a>
	<?php
	}
	?>
<?php
}
?>
			</center>
          </div>
        </div>

	  </div>
    </div>
  </section>

  <!-- end login section -->



<?php
include("footer.php");
?>
<script>
function confirmparticipation()
{
	if(confirm("Are you sure want to participate?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>