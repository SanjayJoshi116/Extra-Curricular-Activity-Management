<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
	$sqlpoint_settings = "SELECT * FROM point_settings";
	$qsqlpoint_settings = mysqli_query($con,$sqlpoint_settings);
	$rspoint_settings = mysqli_fetch_array($qsqlpoint_settings);
	$imgbanner  = rand() . $_FILES["event_banner"]["name"];
	move_uploaded_file($_FILES["event_banner"]["tmp_name"],"imgbanner/".$imgbanner);
	$eventdttime =  str_replace("T"," ", $_POST['event_date_time']);
	$eventrules = nl2br($_POST['event_rules']);
	$event_description = mysqli_real_escape_string($con,nl2br($_POST['event_description']));
	$event_venue = mysqli_real_escape_string($con,nl2br($_POST['event_venue']));
	if(isset($_GET['editid']))
	{
		// Update statement starts here
		$sql = "UPDATE event SET event_type_id='$_POST[event_type_id]',event_title='$_POST[event_title]',event_description='$event_description',event_rules='$_POST[event_rules]',event_banner='$_POST[event_banner]',department_id='$_POST[department_id]',course_id='$_POST[course_id]',st_class='$_POST[st_class]',event_date_time='$_POST[event_date_time]',event_venue='$event_venue',event_status='$_POST[event_status]' WHERE event_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Event record updated successfully...');</script>";
			echo "<script>window.location='viewevent.php';</script>";
		}
		//Step: 3 - Update statement starts here
	}
	else
	{
		$sql = "INSERT INTO event(event_type_id,event_title,event_description,event_rules,event_banner,department_id,course_id, st_class, event_date_time, event_venue,staff_id,event_status,event_participation_type,no_of_participants,club,participation_limit,firstplace_point,secondplace_point,thirdplace_point,participation_point) VALUES('$_POST[event_type_id]','$_POST[event_title]','$event_description','$eventrules','$imgbanner','$_POST[department_id]','$_POST[course_id]','$_POST[st_class]','$eventdttime','$event_venue','$_SESSION[staff_id]','$_POST[event_status]','$_POST[event_participation_type]','$_POST[no_of_participants]','$_POST[club]','$_POST[participation_limit]','$rspoint_settings[firstplace_point]','$rspoint_settings[secondplace_point]','$rspoint_settings[thirdplace_point]','$rspoint_settings[participation_point]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con)==1)
		{
			echo "<script>alert('Event published successfully...');</script>";
			echo "<script>window.location='addevent.php';</script>";
		}
	}
}
//Insert & Update Statement condition ends here
//Step2: for Edit statement starts here
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM event where event_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
//Step2: for edit statement ends here
?>
</div>
<style>
.sub_page .contact_section {
    margin: 0px 0; 
}
.contact_section::before {
    width: 0%;
}
</style>
  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form">
              <center><h3 style='color: white;'>
                Events
              </h3></center>
            <h5>
              Kindly enter Event details 
            </h5>
            <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data">
 <div class="row">
    
	<div class="col-md-6">
		<label class="labelproperty">Event Type</label>
		<select class="form-control" name="event_type_id" id="event_type_id" >
			<option value="">Select Event Type</option>
			<?php
			$sqleventtype = "SELECT * FROM event_type WHERE event_type_status='Active'";
			$qsqleventtype = mysqli_query($con,$sqleventtype);
			echo mysqli_error($con);
			while($rseventtype = mysqli_fetch_array($qsqleventtype))
			{
				echo "<option value='$rseventtype[event_type_id]'>$rseventtype[event_type]</option>";
			}
			?>
		</select>
    </div>
	
			  
  <div class="col-md-6">
	<label class="labelproperty">Event Date & Time</label>
	<input type="datetime-local" name="event_date_time" id="event_date_time" placeholder="Enter Date & Time" min="<?php echo  date("Y-m-d") . "T" .date("H:i"); ?>" value="<?php echo $rsedit['event_date_time']; ?>" />
  </div>
  
  <div class="col-md-12">
	<label class="labelproperty">Event Title</label>
	<input type="text" name="event_title" id="event_title" placeholder="Enter Event Title"  value="<?php echo $rsedit['event_title']; ?>" />
  </div>
  
<div class="col-md-6">
	<label class="labelproperty">Event Participation Type</label>
	<select name="event_participation_type" id="event_participation_type" class="form-control" />
	<option value="">Select Participation Type</option>
	<?php
	$arr = array("Single","Team");
	foreach($arr as $val)
	{
		echo "<option value='$val'>$val</option>";
	}
	?>
	</select>
</div>

<div class="col-md-6">
	<label class="labelproperty">No. of Members in Team</label>
	<input type="number" name="no_of_participants" id="no_of_participants" value="<?php echo $rsedit['no_of_participants']; ?>" > 
</div>

  
  <div class="col-md-6">
	<label class="labelproperty">Event Venue</label>
	<textarea name="event_venue" id="event_venue" class="form-control" placeholder="Enter Venue" ></textarea>
  </div>  
  
  <div class="col-md-6">
	<label class="labelproperty">Max Limit for this Event</label>
	<input type="number" name="participation_limit" id="participation_limit" value="<?php echo $rsedit['participation_limit']; ?>" > 
  </div>
			  
  <div class="col-md-6">
	<label class="labelproperty">Event Description</label>
	<textarea name="event_description" id="event_description" class="form-control" placeholder="Enter Event Description" ></textarea>
  </div>
  
  <div class="col-md-6">
	<label class="labelproperty">Event Rules</label>
	<textarea name="event_rules" id="event_rules" class="form-control" placeholder="Enter Event Rules" ></textarea>
  </div>
			  
              <div class="col-md-6">
				<label class="labelproperty">Event Banner</label>
                <input type="file" name="event_banner" id="event_banner" placeholder="Enter Event Banner" value="<?php echo $rsedit['event_banner'];?>" />
				<?php
					if(isset($_GET['editid']))
					{
						if($rsedit['event_banner'] == "")
						{
							echo "<img src='images/defaultimage.png' style='width: 170px;height:200px;' />";
						}
						else if(file_exists("imgbanner/" . $rsedit['event_banner']))
						{
							echo "<img src='imgbanner/" . $rsedit['event_banner'] . "' style='width: 170px;height:200px;' />";
						}
						else
						{
							echo "<img src='images/defaultimage.png' style='width: 170px;height:200px;' />";
						}
					}
					?>
              </div>
			  
			  
              <div class="col-md-6">
				<label class="labelproperty">Department</label>
                <select name="department_id" id="department_id" class="form-control" />
					<option value="">All Department</option>
		<?php
		$sqldepartment = "SELECT * FROM department WHERE department_status='Active'";
		$qsqldepartment = mysqli_query($con,$sqldepartment);
		echo mysqli_error($con);
		while($rsdepartment = mysqli_fetch_array($qsqldepartment))
		{
			echo "<option value='$rsdepartment[department_id]'>$rsdepartment[department]</option>";
		}
		?>
				</select>
              </div>
			  
              <div class="col-md-6">
				<label class="labelproperty">Course</label>
        <select name="course_id" id="course_id" class="form-control" required="" />
		<option value="0">All Course</option>
		<?php
		$sqlcourse = "SELECT * FROM course WHERE course_status='Active'";
		$qsqlcourse = mysqli_query($con,$sqlcourse);
		echo mysqli_error($con);
		while($rscourse = mysqli_fetch_array($qsqlcourse))
		{
			echo "<option value='$rscourse[course_id]'>$rscourse[course_title]</option>";
		}
		?>
				</select>
              </div>
			  
              <div class="col-md-6">
				<label class="labelproperty">Class</label>
				<select name="st_class" id="st_class" class="form-control" />
				<option value="0">All Class</option>
                <?php
				$arr = array("First Year","Second Year","Third Year");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
				?>
				</select>
              </div>

  <div class="col-md-6">
	<label class="labelproperty">Club</label>
	<input type="text" name="club" id="club" placeholder="Enter club name"  value="<?php echo $rsedit['club']; ?>" />
  </div>
  
			  
              <div class="col-md-6">
				<label class="labelproperty">Select Event Status</label>
				<select name="event_status" id="event_status" class="form-control" />
				<option value="">Select Status</option>
                <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					echo "<option value='$val'>$val</option>";
				}
				?>
				</select>
              </div>
			  
</div>
			  
			  
              <div class="d-flex justify-content-center">
                <center><button type="submit" name="submit" id="submit" class="btn_on-hover">Click Here to Submit</button></center>
              </div>
			  
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
<?php
include("footer.php");
?>