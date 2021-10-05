<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
	$course_id = serialize($_POST['course_id']);
	$st_class = serialize($_POST['st_class']);
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
		$sql = "UPDATE event SET event_type_id='$_POST[event_type_id]', event_participation_type='$_POST[event_participation_type]', no_of_participants='$_POST[no_of_participants]', event_title='$_POST[event_title]', event_description='$event_description', event_rules='$eventrules'";
		if($_FILES["event_banner"]["name"] != "")
		{
		$sql = $sql . ", event_banner='$imgbanner'";
		}
		$sql = $sql . ", department_id='$_POST[department_id]', club_id='$_POST[club_id]', course_id='$course_id', st_class='$st_class', event_date_time='$eventdttime', event_venue='$event_venue', staff_id='$_SESSION[staff_id]', participation_limit='$_POST[participation_limit]', event_status='$_POST[event_status]' WHERE event_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
//####################################################
//####################################################
$subject="Event details modified by Staff";
$sqlevent_participation = "SELECT * FROM event_participation LEFT JOIN event ON event_participation.event_id=event.event_id LEFT JOIN student ON student.student_id=event_participation.student_id where event_participation.event_id='$_GET[editid]'";
$qsqlevent_participation = mysqli_query($con,$sqlevent_participation);
while($rsevent_participation = mysqli_fetch_array($qsqlevent_participation))
{
	$strollno = $rsevent_participation['student_rollno'] . "@sdmcujire.in";
	$participationemailids[] = array("name"=>$rsevent_participation['student_name'],"student_rollno"=>$strollno);
}
include("phpmailer.php");
$protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
$root = $protocol.'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
$link = $root . "/event_more_det.php?event_id=" . $_GET['editid'];
$message = "Hello,<br> This event $_POST[event_title] has been modified by staff. Kindly check updates in the website.<br><br><a href='$link'></a><br><br>Thank you...";
sendbulkmail($participationemailids,$subject,$message);
//####################################################
//####################################################
			echo "<script>alert('Event record updated successfully...');</script>";
			echo "<script>window.location='viewevent.php';</script>";
		}
		//Update statement starts here
	}
	else
	{
		$sql = "INSERT INTO event(event_type_id, event_participation_type, no_of_participants, event_title, event_description, event_rules, event_banner, department_id, club_id, course_id, st_class, event_date_time, event_venue, staff_id, participation_limit, event_status) VALUES('$_POST[event_type_id]','$_POST[event_participation_type]','$_POST[no_of_participants]','$_POST[event_title]','$event_description','$eventrules','$imgbanner','$_POST[department_id]','$_POST[club_id]','$course_id','$st_class','$eventdttime','$event_venue','$_SESSION[staff_id]','$_POST[participation_limit]','$_POST[event_status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		$insid = mysqli_insert_id($con);
		if(mysqli_affected_rows($con)==1)
		{
			//#################################################################
			$sqladminstaff = "SELECT * FROM staff where staff_type ='Admin'";
			$qsqladminstaff = mysqli_query($con,$sqladminstaff);
			echo mysqli_error($con);
			$rsadminstaff = mysqli_fetch_array($qsqladminstaff);
			//#################################################################
			$_SESSION['sessioncode'] = rand(111111,999999);
			include("phpmailer.php");
			$protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
			$root = $protocol.'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
			$link = $root . "/event_more_det.php?event_id=".$insid;
			$email = $_POST['student_rollno'] . "@sdmcujire.in";
			$subject="New Event Notification";
			$message = "<b>Hi Admin,<br><br>
			New Event published by " . $rsstaffprofile['staff_name'] . " ( "  . $rsstaffprofile['login_id'] . " ) .<br>";
			$message = $message . "Event Title is : " . $_POST['event_title'] . " and it is scheduled on "  . date("d-m-Y h:i A",strtotime($eventdttime));
			$message = $message . "<br><br><a href='$link'>Click Here to View</a></b>
			<br><br>
			SDM College (Autonomous), Ujire, PIN - 574240<br>
			sdmcollege@sdmcujire.in<br>
			Call : 08256-236221, 225";
			sendmail($rsadminstaff['login_id'],$rsadminstaff['staff_name'],$subject,$message);
			if($rsstaffprofile['staff_type'] == "Admin")
			{
				echo "<script>alert('Event published successfully...');</script>";
				echo "<script>window.location='upcoming-event.php';</script>";
			}
			else
			{
				echo "<script>alert('Event record inserted successfully. Admin verification required to publish the event...');</script>";
			}			
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
	$course_id = unserialize($rsedit['course_id']);
	$st_class = unserialize($rsedit['st_class']);
}
//Step2: for edit statement ends here
function br2nl($string)
{
    $breaks = array("<br />","<br>","<br/>");  
    return str_ireplace($breaks, "", $string); 
}
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
             <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data" onsubmit="return validateform()">
 <div class="row">
    
	<div class="col-md-6">
		<label class="labelproperty">Event Category</label>
		<span class="errormessage" id="id_event_type_id"></span>
		<select class="form-control" name="event_type_id" id="event_type_id" >
			<option value="">Select Event Category</option>
			<?php
			$sqleventtype = "SELECT * FROM event_type WHERE event_type_status='Active'";
			$qsqleventtype = mysqli_query($con,$sqleventtype);
			echo mysqli_error($con);
			while($rseventtype = mysqli_fetch_array($qsqleventtype))
			{
				if($rseventtype['event_type_id'] == $rsedit['event_type_id'])
				{
				echo "<option value='$rseventtype[event_type_id]' selected>$rseventtype[event_type]</option>";
				}
				else
				{
				echo "<option value='$rseventtype[event_type_id]'>$rseventtype[event_type]</option>";
				}
			}
			?>
		</select>
    </div>
	
			  
  <div class="col-md-6">
	<label class="labelproperty">Event Date & Time</label>
	<span class="errormessage" id="id_event_type_id"></span>
	<input type="datetime-local" name="event_date_time" id="event_date_time" placeholder="Enter Date & Time" min="<?php echo  date("Y-m-d") . "T" .date("H:i"); ?>" value="<?php echo str_replace(" ","T", $rsedit['event_date_time']); ?>" />
  </div>
  
  <div class="col-md-12">
	<label class="labelproperty">Event Title</label>
	<span class="errormessage" id="id_event_title"></span>
	<input type="text" name="event_title" id="event_title" placeholder="Enter Event Title"  value="<?php echo $rsedit['event_title']; ?>" />
  </div>
  
<div class="col-md-6">
	<label class="labelproperty">Event Type</label>
	<span class="errormessage" id="id_event_participation_type"></span>
	<select name="event_participation_type" id="event_participation_type" class="form-control" onchange="fun_check_event_type(this.value)" >
	<option value="">Select Type</option>
	<?php
	$arr = array("Single","Team");
	foreach($arr as $val)
	{
		if($val == $rsedit['event_participation_type'])
		{
		echo "<option value='$val' selected>$val</option>";
		}
		else
		{
		echo "<option value='$val'>$val</option>";
		}
	}
	?>
	</select>
</div>

<div class="col-md-6">
	<label class="labelproperty">No. of Members in Team</label>
	<span class="errormessage" id="id_no_of_participants"></span>
	<input type="number" name="no_of_participants" id="no_of_participants" value="<?php echo $rsedit['no_of_participants']; ?>" > 
</div>

  
  <div class="col-md-6">
	<label class="labelproperty">Event Venue</label>
	<span class="errormessage" id="id_event_venue"></span>
	<textarea name="event_venue" id="event_venue" class="form-control" placeholder="Enter Venue" ><?php echo $rsedit['event_venue']; ?></textarea>
  </div>  
  
  <div class="col-md-6">
	<label class="labelproperty">Max Participant Limit for this Event</label>
	<span class="errormessage" id="id_participation_limit"></span>
	<input type="number" name="participation_limit" id="participation_limit" value="<?php echo $rsedit['participation_limit']; ?>" > 
  </div>
			  
  <div class="col-md-6">
	<label class="labelproperty">Event Description</label>
	<span class="errormessage" id="id_event_description"></span>
	<textarea name="event_description" id="event_description" class="form-control" placeholder="Enter Event Description" ><?php echo br2nl($rsedit['event_description']); ?></textarea>
  </div>
  
  <div class="col-md-6">
	<label class="labelproperty">Event Rules</label>
	<span class="errormessage" id="id_event_rules"></span>
	<textarea name="event_rules" id="event_rules" class="form-control" placeholder="Enter Event Rules" ><?php echo br2nl($rsedit['event_rules']); ?></textarea>
  </div>
			  

              <div class="col-md-6">
				<label class="labelproperty">Course 
				<span class="errormessage" id="id_course_id"></span>
        <select name="course_id[]" id="course_id" class="form-control" multiple   >
		<option value="0" 
		<?php
		if($course_id[0] == 0)
		{
			echo " selected ";
		}
		?> 
		 >All Course</option>
		<?php
		//$course_id $st_class
		$sqlcourse = "SELECT * FROM course WHERE course_status='Active'";
		$qsqlcourse = mysqli_query($con,$sqlcourse);
		echo mysqli_error($con);
		while($rscourse = mysqli_fetch_array($qsqlcourse))
		{
			if(isset($_GET['editid']))
			{
				if(in_array($rscourse['course_id'], $course_id))
				{
					echo "<option value='$rscourse[course_id]' selected>$rscourse[course_title]</option>";
				}
				else
				{
					echo "<option value='$rscourse[course_id]'>$rscourse[course_title]</option>";
				}
			}
			else
			{
				echo "<option value='$rscourse[course_id]'>$rscourse[course_title]</option>";
			}
		}
		?>
				</select>
              </div>
			  
              <div class="col-md-6">
				<label class="labelproperty">Class</label>
				<span class="errormessage" id="id_st_class"></span>
				<select name="st_class[]" id="st_class" class="form-control" multiple >
				<option value="0" 
		<?php
		if($st_class[0] == 0)
		{
			echo " selected ";
		}
		?>
		 >All Class</option>
                <?php
				$arr = array("First Year","Second Year","Third Year");
				foreach($arr as $val)
				{
					if(isset($_GET['editid']))
					{
						if (in_array($val, $st_class))
						{
							echo "<option value='$val' selected>$val</option>";
						}
						else
						{
							echo "<option value='$val'>$val</option>";
						}
					}
					else
					{
							echo "<option value='$val'>$val</option>";
					}
				}
				?>
				</select>
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
<?php
$sqlviewclub = "SELECT club.*,department.department,staff.staff_name FROM club LEFT JOIN department ON department.department_id=club.department_id LEFT JOIN staff ON staff.staff_id=club.coordinator WHERE club.coordinator='$_SESSION[staff_id]'";
$qsqlviewclub = mysqli_query($con,$sqlviewclub);
$rsviewclub = mysqli_fetch_array($qsqlviewclub);
if(mysqli_num_rows($qsqlviewclub) == 0)
{
?>
<input type="hidden" name="department_id" id="department_id" value="<?php echo $rsstaffprofile['department_id']; ?>">
<input type="hidden" name="club_id" id="club_id" value="0">
<?php
}
else
{
?>
<input type="hidden" name="department_id" id="department_id" value="<?php echo $rsviewclub['department_id']; ?>">
<input type="hidden" name="club_id" id="club_id" value="<?php echo $rsviewclub['club_id']; ?>">
<?php
}
?>
<?php
/*			  
              <div class="col-md-6">
				<label class="labelproperty">Department</label>
				<span class="errormessage" id="id_department_id"></span>
                <select name="department_id" id="department_id" class="form-control" />
					<option value="">All Department</option>
		<?php
		$sqldepartment = "SELECT * FROM department WHERE department_status='Active'";
		$qsqldepartment = mysqli_query($con,$sqldepartment);
		echo mysqli_error($con);
		while($rsdepartment = mysqli_fetch_array($qsqldepartment))
		{
			if($rsdepartment['department_id'] == $rsedit['department_id'])
			{
			echo "<option value='$rsdepartment[department_id]' selected>$rsdepartment[department]</option>";
			}
			else
			{
			echo "<option value='$rsdepartment[department_id]'>$rsdepartment[department]</option>";
			}
		}
		?>
				</select>
              </div>
			  

  <div class="col-md-6">
	<label class="labelproperty">Club</label>
	<span class="errormessage" id="id_club_id"></span>
	<select class="form-control" name="club_id" id="club_id" />
				<option value="">--Select--</option>
				<?php
				$sqlevent = "SELECT * FROM club WHERE club_status='Active'";
				$qsqlevent = mysqli_query($con,$sqlevent);
				echo mysqli_error($con);
				while($rsevent = mysqli_fetch_array($qsqlevent))
				{
					if($rsevent['club_id'] == $rsedit['club_id'])
					{
					echo "<option value='$rsevent[club_id]' selected>$rsevent[club]</option>";
					}
					else
					{
					echo "<option value='$rsevent[club_id]'>$rsevent[club]</option>";
					}
				}
				?>
				</select>
  </div>
*/
?>
  
<?php
if($rsstaffprofile['staff_type'] == "Admin")
{
?>
<div class="col-md-6">
	<label class="labelproperty">Select Event Status</label>
	<select name="event_status" id="event_status" class="form-control" />
	<option value="">Select Status</option>
	<?php
	$arr = array("Active","Inactive");
	foreach($arr as $val)
	{
		if($val == $rsedit['event_status'])
		{
		echo "<option value='$val' selected>$val</option>";
		}
		else
		{
		echo "<option value='$val'>$val</option>";
		}
	}
	?>
	</select>
</div>
<?php
}
else
{
	if(isset($_GET['editid']))
	{
?>
<input type="hidden" name="event_status" id="event_status" value="<?php echo $rsedit['event_status']; ?>" />
<?php
	}
	else
	{
?>
<input type="hidden" name="event_status" id="event_status" class="form-control" value="Inactive"  />
<?php
	}
}
?>
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
<script>
function fun_check_event_type(event_participation_type)
{
	if(event_participation_type == "Single")
	{
		$('#no_of_participants').val('1');
		$('#no_of_participants').attr('readonly', true);
		$("#no_of_participants").css({"background-color": "#e6cece"});
	}
	else if(event_participation_type == "Team")
	{
		$('#no_of_participants').val('');
		$('#no_of_participants').attr('readonly', false);
		$("#no_of_participants").css({"background-color": "#ffffff"});
	}
}
function validateform()
{
	//Regex Starts Here
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaSpaceExp = /^[a-zA-Z\s]+$/;
	var alphaNumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	//Regex Ends Here
	$('.errormessage').html('');
	var errmsg = "No";
	if($('#event_type_id').val() == "")
	{
		$('#id_event_type_id').html("Event Type should not be empty..");
		errmsg = "Yes";
	}
	if($('#event_date_time').val() == "")
	{
		$('#id_event_date_time').html("Event date and time should not be empty..");
		errmsg = "Yes";
	}
	if($('#event_title').val() == "")
	{
		$('#id_event_title').html("Event title should not be empty..");
		errmsg = "Yes";
	}
	if($('#event_participation_type').val() == "")
	{
		$('#id_event_participation_type').html("Kindly select event participation type..");
		errmsg = "Yes";
	} 
	    
	if($('#no_of_participants').val() == "")
	{
		$('#id_no_of_participants').html("Number of participants in a team should not be empty..");
		errmsg = "Yes";
	}  
	if($('#event_venue').val() == "")
	{
		$('#id_event_venue').html("Event venue should not be empty..");
		errmsg = "Yes";
	}
	if($('#event_description').val() == "")
	{
		$('#id_event_description').html("Event discription should not be empty..");
		errmsg = "Yes";
	}
	if($('#participation_limit').val() == "")
	{
		$('#id_participation_limit').html("Enter participation limit to the event..");
		errmsg = "Yes";
	}
	if($('#event_rules').val() == "")
	{
		$('#id_event_rules').html("Kindly enter event rules..");
		errmsg = "Yes";
	}     
	if($('#course_id').val() == "")
	{
		$('#id_course_id').html("Kindly select courses ...");
		errmsg = "Yes";
	}
	if($('#st_class').val() == "")
	{
		$('#id_st_class').html("Kindly select the class ...");
		errmsg = "Yes";
	}
	if(errmsg == "Yes")
	{
		return false;
	}
	if(errmsg == "No")
	{
		return true;
	}
} 
</script>