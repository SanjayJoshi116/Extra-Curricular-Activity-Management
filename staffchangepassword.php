<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
	$opassword = md5($_POST['opassword']);
	$npassword = md5($_POST['npassword']);
	$sql="UPDATE staff SET password='$npassword' WHERE  staff_id='" . $_SESSION['staff_id'] . "' AND password='$opassword'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password updated successfully..');</script>";
		echo "<script>window.location='staffchangepassword.php';</script>";
	}
	else
	{
		echo "<script>alert('Failed to Change password.');</script>";
		echo "<script>window.location='staffchangepassword.php';</script>";
	}
}
?>
<style>
.contact_section::before {
    width: 10%;
}
.sub_page .contact_section {
    margin: 1px 0;
}
</style>
  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form" style="padding-left: 225px;padding-right: 225px;">
			 <center><h3 style="color: white;">Change Password</h3></center>
            <h5>
              Current Password by entering Old Password and New password
            </h5>
            <form action="" method="post" name="registration" id="registration" enctype="multipart/form-data">
<div class="row">			

	  <div class="col-md-12">
		<label class="labelproperty">Current Password</label>
		<input type="password" name="opassword" id="opassword" class="form-control" placeholder="Enter Password"  />
	  </div>
	  
	  <div class="col-md-12">
		<label class="labelproperty">New Password</label>
		<input type="password" name="npassword" id="npassword" class="form-control" placeholder="Enter Password"  />
	  </div>
	  
	  <div class="col-md-12">
		<label class="labelproperty">Confirm Password</label>
		<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm the password" />
	  </div>

</div>


              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Change Password</button>
              </div>
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