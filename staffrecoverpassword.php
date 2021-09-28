<?php
include("header.php");
//This code checks whether staff already logged in or not.
if(isset($_SESSION['staff_id']))
{
	echo "<script>window.location='dashboard.php';</script>";
}
if(isset($_SESSION['student_id']))
{
	echo "<script>window.location='student-dashboard.php';</script>";
}
//..
if($_SESSION['recoverysession'] != $_GET['recoverysession'])
{
	$md5stid = md5($_GET['studentid']);
	if($_SESSION['recoverysession'] != $md5stid )
	{
		echo "<script>alert('You have sent invalid password recovery request..');</script>";
		echo "<script>window.location='index.php';</script>";
	}
	else
	{
		echo "<script>alert('Your password recovery request expired..');</script>";
		echo "<script>window.location='index.php';</script>";
	}
}
if(isset($_POST['btnsubmit']))
{
	$encpass = md5($_POST['npassword']);
	$sql = "UPDATE staff  SET password='$encpass' where staff_id ='$_POST[login_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password updated successfully..');</script>";
		echo "<script>window.location='index.php';</script>";
	}
}
?>
<br>
<br>
  <!-- login section -->
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              Change Password
            </h3>
            <p>
             Change Password by entering New password
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="login_form">
            <h5>
              Password Recovery Change Password
            </h5>
            <form action="" method="post">
              <div>
                <input name="login_id" id="login_id" type="hidden" placeholder="Roll No."  readonly value="<?php echo $_GET['studentid']; ?>" />
              </div><br>
              <div>
                <input name="npassword"   id="npassword"  type="password" placeholder="New Password" />
              </div><br>
              <div>
                <input name="cpassword"   id="cpassword"  type="password" placeholder="Confirm Password" />
              </div>
              <button type="submit" name="btnsubmit">Change Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end login section -->
<?php
include("footer.php");
?>