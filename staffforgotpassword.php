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
if(isset($_POST['btnsubmit']))
{
	$sql = "SELECT * FROM staff where login_id ='$_POST[login_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		if($rslogin['staff_status'] == "Suspended")
		{
			echo "<script>alert('Your account suspended with some reason. you cannot send password recovery request..');</script>";
		}
		else if($rslogin['staff_status'] == "Pending")
		{
			echo "<script>alert('Your account not activated yet. kindly activate your account.');</script>";
		}
		else
		{
			$_SESSION['recoverysession'] = md5($rslogin[0]);
			include("phpmailer.php");
			$protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
			$root = $protocol.'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
			$link = $root . "/staffrecoverpassword.php?recoverysession=".$_SESSION['recoverysession']."&studentid=".$rslogin[0];
			$email = $rslogin['login_id'];
			$subject="ExtraCurricular Staff Password Recovery mail";
			$message = "<b>Hi $rslogin[staff_name],<br><br>
			You have sent password recovery request in Extra Curricular Activity Management. To change the password kindly click the following link:
			<br>
			<a href='$link'>Click Here to Change password</a></b>
			<br><br>
			SDM College (Autonomous), Ujire, 574240<br>
			sdmcollege@sdmcujire.in<br>
			Call : 08256-236221, 225";
			sendmail($email,$rslogin['staff_name'],$subject,$message);
			echo "<script>alert('Password Recovery mail sent to registered account. Kindly check..');</script>";
			echo "<script>window.location='index.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('You have entered invalid Roll No...');</script>";
	}
}
?>
  <!-- login section -->
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              Did you Forgot password?
            </h3>
            <p>
             Kindly enter Login ID to Recover password..
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="login_form">
            <h5>
              Staff - Recover Password
            </h5>
            <form action="" method="post">
              <div>
                <input name="login_id" id="login_id" type="text" placeholder="Enter Login ID" />
              </div>
              <button type="submit" name="btnsubmit">Click Here to Recover Password</button><br>&nbsp;
			  <hr>
			  Do you Remember Password? - <a href="login.php" class="btn-info">&nbsp; Click Here to Login &nbsp;</a>
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