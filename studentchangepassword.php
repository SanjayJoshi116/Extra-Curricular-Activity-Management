<?php
include("header.php");
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='login.php';</script>";
}
//opassword npassword cpassword submit
if(isset($_POST['submit']))
{
	$opassword = md5($_POST['opassword']);
	$npassword = md5($_POST['npassword']);
    $sql="UPDATE student SET student_password='$npassword' WHERE student_id='$_SESSION[student_id]' AND student_password='$opassword'";
    $qsql = mysqli_query($con,$sql);
    echo mysqli_error($con);
    if(mysqli_affected_rows($con) == 1)
    {
        echo "<script>alert('Student Password updated successfully..');</script>";
        echo "<script>window.location='studentchangepassword.php';</script>";
    }
}
?>
<style>
.sub_page .contact_section {
    margin: 5px 0;
}
</style>
  <!-- contact section -->
  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
              Change Password
              </h3>
              <p>
              Change Password By entering old password, New password and Confirm Password
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
            Change Password
            </h5>
            <form action="" method="post" name="registration" id="registration" enctype="multipart/form-data">
			
            <div>
                <label class="labelproperty">Old Password</label>
                <input type="password" name="opassword" id="opassword" class="form-control" placeholder="Old Password" />
            </div>
            
              <div>
				<label class="labelproperty">New Password</label>
				<input type="password" name="npassword" id="npassword" class="form-control" placeholder="New Password" />
              </div>
			  
              <div>
				<label class="labelproperty">Confirm Password</label>
				<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password"  />
              </div>
			  
              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Check here to Change password</button>
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