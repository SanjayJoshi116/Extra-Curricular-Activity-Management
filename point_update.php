<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{	
	if(isset($_GET['editid']))
	{
		$sql="UPDATE point_settings SET firstplace_point='$_POST[firstplace_point]'";
		$sql = $sql . ",secondplace_point='$_POST[secondplace_point]'";
		$sql = $sql . ",thirdplace_point='$_POST[thirdplace_point]',participation_point	='$_POST[participation_point]' WHERE point_set_id ='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Student points updated successfully..');</script>";
			echo "<script>window.location='dashboard.php';</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM point_settings where point_set_id ='$_GET[editid]'";
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
            <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data">
			
              <div>
				<label class="labelproperty">Firstplace Points</label>
                <input type="text" name="firstplace_point" id="firstplace_point" placeholder="Enter Firstplace Points" value="<?php echo $rsedit['department']; ?>" />
              </div>
			  
              <div>
                <label class="labelproperty">Description</label>
				<textarea name="department_detail" id="department_detail" class="form-control" placeholder="Enter Description"><?php echo $rsedit['department_detail']; ?></textarea>
              </div>
			  
              <div>
				<label class="labelproperty">Department Status</label>
				<select name="department_status" id="department_status" class="form-control" >
				<option value="">Select Status</option>
                <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit['department_status'])
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