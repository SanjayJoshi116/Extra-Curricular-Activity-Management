<?php
include("header.php");
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='login.php';</script>";
	}
if(isset($_POST['submit']))
{
	$apply_dt_tim=$_POST[date('Y-m-d H:i:s')];
	$sql = "INSERT INTO event_participation() VALUES('$_POST[event_id]','$_SESSION[student_id]',$apply_dt_tim')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('Event application success...');</script>";
		//echo "<script>window.location='applyevent.php';</script>";
	}
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
                Events
              </h3>
              <p>
                Apply Events
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly verify the details to apply
            </h5>
            <form action="" method="post" name="frmevent_apply" id="frmevent_apply">
			
              <div>
	<label class="labelproperty">Event ID</label>
	<select class="form-control" name="event_id" id="event_id">
		<option value="">Select Event Type</option>
		<?php
		$sqleventtype = "SELECT * FROM event WHERE event_status='Active'";
		$qsqleventtype = mysqli_query($con,$sqleventtype);
		echo mysqli_error($con);
		while($rseventtype = mysqli_fetch_array($qsqleventtype))
		{
			echo "<option value='$rseventtype[event_id]'>$rseventtype[event_title]</option>";
		}
		?>
	</select>
			  
			  
			  
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