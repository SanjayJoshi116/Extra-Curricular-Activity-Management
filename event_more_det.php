<?php
include("header.php");
$sqlviewevent = "SELECT event.*, event_type.event_type, department.department, staff.staff_name, staff.staff_type, club.club FROM event 
LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id 
LEFT JOIN department ON department.department_id=event.department_id 
LEFT JOIN  staff ON staff.staff_id=event.staff_id LEFT JOIN club ON club.club_id=event.club_id
where event.event_id='$_GET[event_id]'";
$qsqlviewevent = mysqli_query($con,$sqlviewevent);
echo mysqli_error($con);
$rsviewevent = mysqli_fetch_array($qsqlviewevent);
$course_id = unserialize($rsviewevent['course_id']);
$st_class = unserialize($rsviewevent['st_class']);
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
$sel = "SELECT * FROM point_settings";
$result = mysqli_query($con,$sel);
if(mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_assoc($result);
$firstplace_point = $row['firstplace_point'];
$secondplace_point = $row['secondplace_point'];
$thirdplace_point = $row['thirdplace_point'];
$participation_point = $row['participation_point'];
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
						<th style="width: 40%;">Event Category : </th><td><?php echo  $rsviewevent['event_type']; ?></td>
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
					<?php
					if($rsviewevent['department_id'] != 0)
					{
					?>
					<tr>
						<th>Department : </th><td><?php echo  $rsviewevent['department']; ?> </td>
					</tr>
					<?php
					}
					?>
					<?php
					if($rsviewevent['club_id'] != "")
					{
					?>
					<tr>
						<th>Club : </th><td><?php echo  $rsviewevent['club']; ?> </td>
					</tr>
					<?php
					}
					?>
					<tr>
						<th>Course : </th><td><?php
if($course_id[0]== 0)
{
	echo "all Courses";
}
else
{
	$sqlcourse = "SELECT * FROM course WHERE course_status='Active' AND course_id in (";
	foreach($course_id as $cid)
	{
		$sqlcourse = $sqlcourse . "$cid,";
	}
	$sqlcourse = $sqlcourse .  "0)";
	$qsqlcourse = mysqli_query($con,$sqlcourse);
	while($rscourse= mysqli_fetch_array($qsqlcourse))
	{
		echo $rscourse['course_title'] . " ";
	}
}
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
						if($st_class[0] == 0)
						{
							echo "All Classes";
						}
						else
						{
$cl = "";
foreach($st_class as $cls)
{
	$cl = $cl . $cls . ", ";
}
echo rtrim($cl, ", ");
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
						<th>Participants Limit: </th><td>Maximum <?php echo $rsviewevent['participation_limit']; ?> </td>
					</tr>
					<tr>
						<th>Club: </th><td><?php echo $rsviewevent['club']; ?> </td>
					</tr>
					<tr>
						<th>Event Date & Time: </th><td> <?php echo date("d-m-Y h:i A",strtotime($rsviewevent['event_date_time'])) ?></td>
					</tr>
					<tr>
						<th>Points: </th><td><?php 
							echo "First Place - " . $firstplace_point  . "<br>"; 
							echo "Second Place - " . $secondplace_point . "<br>"; 
							echo "Third Place - " . $thirdplace_point  . "<br>"; 
							echo "Participation Point - " . $participation_point . "<br>"; 
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
	
    <div class="container" >
<div class="row">
    <div class="col-md-6 container  table table-bordered" >
      <div class="heading_container">
        <h3>
          &nbsp;   Event Rules
        </h3>
        <p><?php echo  $rsviewevent['event_rules']; ?></p>
      </div>
    </div>
	
	<div class="col-md-6 container  table table-bordered" >
      <div class="heading_container">
        <h3>
          &nbsp;   Event Venue
        </h3>
        <p><?php echo  $rsviewevent['event_venue']; ?></p>
      </div>
    </div>
</div>
	</div>

  </section>

			<?php
			if(!isset($_SESSION['staff_id']))
			{
			?>
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
			  <?php
			  $sqlparticipantscount  = "SELECT * FROM `event_participation` WHERE event_id='$_GET[event_id]'";
			  $qsqlparticipantscount = mysqli_query($con,$sqlparticipantscount);
			  echo mysqli_num_rows($qsqlparticipantscount);
			  ?>  
				<?php
				if($rsviewevent['event_participation_type'] == "Team")
				{
					echo " Teams joined";
				}
				else
				{
					echo " Participants joined";
				}
				?> / 
				<?php echo $rsviewevent['participation_limit'] - mysqli_num_rows($qsqlparticipantscount); ?> left
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
			if($rsviewevent['event_participation_type'] == "Team")
				{
	?>
	<form method="post" action="">
	<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg" onclick="return confirmparticipation()">Click Here to Add Team</button>
	</form>
	<?php
				}
				else
				{
	?>
	<form method="post" action="">
	<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg" onclick="return confirmparticipation()">Click Here to participate</button>
	</form>
	<?php
				}
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
			<?php
			}
			?>
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