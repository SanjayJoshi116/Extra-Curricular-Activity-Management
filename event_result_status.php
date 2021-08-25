<?php
include("header.php");
/*if(!isset($_SESSION['staff_id']))
{
<<<<<<< HEAD
	echo "<script>window.location='login.php';</script>";
}
=======
	echo "<script>window.location='login.php';</script>";
}*/
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE event_result_status SET event_result_id='$_POST[event_result_id]',event_id='$_POST[event_id]',student_id='$_POST[student_id]',event_participation_id='$_POST[event_participation_id]',winning_position='$_POST[winning_position]',point='$_POST[point] WHERE result_status_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Event result status record updated successfully...');</script>";
			echo "<script>window.location='view_event_result_status.php';</script>";
		}
	}
	else
	{
	$sql = "INSERT INTO event_result_status(event_id, student_id,winning_position, point) VALUES('$_POST[event_result_id]','$_POST[event_id]','$_POST[student_id]','$_POST[event_participation_id]','$_POST[winning_position]','$_POST[point]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Event Result Status Published successfully...');</script>";
		echo "<script>window.location='event_result_status.php';</script>";
	}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM event_result_status where result_status_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
</div>

  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                Event Result Status
              </h3>
              <p>
                Enter/Edit Event Result Status
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly update Event Result Status
            </h5>
            <form action="" method="post" name="frmevent_result" id="frmevent_result">
              <div>
                <label class="labelproperty">Event</label>
				<select class="form-control" name="event_id" id="event_id" />
				<option value="">--Select--</option>
				<?php
				$sqlevent = "SELECT * FROM event WHERE event_status='Active'";
				$qsqlevent = mysqli_query($con,$sqlevent);
				echo mysqli_error($con);
				while($rsevent = mysqli_fetch_array($qsqlevent))
				{
					echo "<option value='$rsevent[event_id]'>$rsevent[event_title]</option>";
				}
				?>
				</select>
			  </div>
              <div>
                <label class="labelproperty"></label>
				<input type="text" name="student_id" id="student_id" class="form-control" value="<?php echo $rsedit['student_id'] ?>" />
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Click Here to Submit</button>
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