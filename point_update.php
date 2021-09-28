<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
	$sqlps = "SELECT * FROM point_settings WHERE point_set_id='1'";
	$qsqlps = mysqli_query($con,$sqlps);
	if(mysqli_num_rows($qsqlps) >= 1)
	{
		$sql = "UPDATE point_settings SET firstplace_point='$_POST[firstplace_point]',secondplace_point='$_POST[secondplace_point]',thirdplace_point='$_POST[thirdplace_point]',participation_point='$_POST[participation_point]' where point_set_id='1'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Point settings done successfully...');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO point_settings (firstplace_point,secondplace_point,thirdplace_point,participation_point) VALUES ('$_POST[firstplace_point]','$_POST[secondplace_point]','$_POST[thirdplace_point]','$_POST[participation_point]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Point settings done successfully...');</script>";
		}
	}
}
$point_set_id = $_GET['point_set_id'];
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

  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                Student Points
              </h3>
              <p>
                Update Student Points
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly update student points
            </h5>
            <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data" onsubmit="return validateform()">
			
              <div class="row">
			  
              <div class="col-md-6">
				<label class="labelproperty">Firstplace Points</label>
				<span class="errormessage" id="id_firstplace_point"></span>
                <input type="number" name="firstplace_point" id="firstplace_point" placeholder="Enter Firstplace Points" 
				value="<?php echo $firstplace_point ?>" />
              </div>
              <div class="col-md-6">
                <label class="labelproperty">Secondplace Points</label>
				<span class="errormessage" id="id_secondplace_point"></span>
				<input type="text" name="secondplace_point" id="secondplace_point" placeholder="Enter Secondplace Points"
				value="<?php echo $secondplace_point ?>" />
              </div>
			  
			  <div class="col-md-6">
                <label class="labelproperty">Thirdplace Points</label>
				<span class="errormessage" id="id_thirdplace_point"></span>
				<input type="text" name="thirdplace_point" id="thirdplace_point" placeholder="Enter Thirdplace Points"
				value="<?php echo $thirdplace_point ?>" />
              </div>
			  
			  <div class="col-md-6">
                <label class="labelproperty">Participation Points</label>
				<span class="errormessage" id="id_participation_point"></span>
				<input type="text" name="participation_point" id="participation_point" placeholder="Enter Participation Points"
				value="<?php echo $participation_point ?>" />
              </div>
			  </div>
             </div>
			  
              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn btn-info">Click Here to Submit</button>
              </div>
			  <br>
			  <br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->
<?php
if(isset($_POST['submit']))
{
	$sql = "UPDATE point_settings SET firstplace_point='$_POST[firstplace_point]',secondplace_point='$_POST[secondplace_point]',thirdplace_point='$_POST[thirdplace_point]',participation_point='$_POST[participation_point]' WHERE point_set_id='$point_set_id'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Points updated successfully..');</script>";
		echo "<script>window.location='point_update.php';</script>";
	}
}
include("footer.php");
?>
<script>
function validateform()
{
	$('.errormessage').html('');
	var errmsg = "No"; 
	if($('#firstplace_point').val() == "")
	{
		$('#id_firstplace_point').html("Firstplace point should not be empty..");
		errmsg = "Yes";
	} 
	if($('#secondplace_point').val() == "")
	{
		$('#id_secondplace_point').html("Secondplace point should not be empty..");
		errmsg = "Yes";
	}
	if($('#thirdplace_point').val() == "")
	{
		$('#id_thirdplace_point').html("Thirdplace point should not be empty..");
		errmsg = "Yes";
	}
	if($('#participation_point').val() == "")
	{
		$('#id_participation_point').html("Participation point should not be empty..");
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