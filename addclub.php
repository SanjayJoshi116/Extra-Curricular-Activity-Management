<?php
include "header.php";
/*if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}*/
if(isset($_POST['submit']))
{	
	if(isset($_GET['editid']))
	{
		$sql="UPDATE club SET club='$_POST[club]'";
		$sql = $sql . ",department_id='$_POST[department_id]',club_details='$_POST[club_details]'";
		$sql = $sql . ",club_status='$_POST[club_status]' WHERE club_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Club Record updated successfully..');</script>";
			echo "<script>window.location='viewclub.php';</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO club(club,department_id,club_details,club_status) VALUES('$_POST[club]','$_POST[department_id]','$_POST[club_details]','$_POST[club_status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con)==1)
		{
			echo "<script>alert('Club Record Inserted successfully...');</script>";
			echo "<script>window.location='addclub.php';</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM club where club_id='$_GET[editid]'";
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
                Club
              </h3>
              <p>
                Add Club
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly enter club details
            </h5>
            <form action="" method="post" name="frmevent_type" id="frmevent_type" enctype="multipart/form-data">
			
              <div>
				<label class="labelproperty">Club</label>
                <input type="text" name="club" id="club" placeholder="Enter Club Name" value="<?php echo $rsedit['club']; ?>" />
              </div>
			  
			  <div>
			    <label class="labelproperty">Department</label>
				<select name="department_id" id="department_id" class="form-control" />
				<option value="">--Select--</option>
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
				
              <div>
                <label class="labelproperty">Description</label>
				<textarea name="club_details" id="club_details" class="form-control" placeholder="Enter Club Details"><?php echo $rsedit['club_details']; ?></textarea>
              </div>
			  
              <div>
				<label class="labelproperty">Club Status</label>
				<select name="club_status" id="club_status" class="form-control" >
				<option value="">--Select--</option>
                <?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit['club_status'])
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