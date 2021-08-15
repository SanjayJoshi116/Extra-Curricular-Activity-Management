<?php
include("header.php");
if($_SESSION['sessionid'] == $_SESSION['resetsession'])
{
	$sqlupd = "UPDATE student SET student_status='Active' WHERE student_id='$_GET[studentid]'";
	$qsqlupd = mysqli_query($con,$sqlupd);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Account activated successfully...');</script>";
		echo "<script>window.location='login.php';</script>";
	}
}
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
	//login_type login_id password btnsubmit
	if($_POST['login_type'] == "Student")
	{
		$encpass = md5($_POST['password']);
		$sql = "SELECT * FROM student where student_rollno='$_POST[login_id]' AND student_password='$encpass' AND student_status='Active'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_num_rows($qsql) == 1)
		{
			$rslogin = mysqli_fetch_array($qsql);
			$_SESSION['student_id'] = $rslogin['student_id'];
			echo "<script>window.location='student-dashboard.php';</script>";
		}
		else
		{
			echo "<script>alert('You have entered invalid Login credentials. Please try again...');</script>";
		}
	}
	if($_POST['login_type'] == "Staff")
	{
		$encpass = md5($_POST['password']);
		$sql = "SELECT * FROM staff where login_id='$_POST[login_id]' AND password='$encpass' AND staff_status='Active'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_num_rows($qsql) == 1)
		{
			$rslogin = mysqli_fetch_array($qsql);
			$_SESSION['staff_id'] = $rslogin['staff_id'];
			echo "<script>window.location='dashboard.php';</script>";
		}
		else
		{
			echo "<script>alert('You have entered invalid Login credentials. Please try again...');</script>";
		}
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
              LOGIN PANEL
            </h3>
            <p>
             Kindly enter Valid Login credentials to login website..
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="login_form">
            <h5>
              Login Now
            </h5>
            <form action="" method="post">
              <div>
                <select name="login_type" id="login_type" class="form-control">
					<option value="">Select Login Type</option>
					<?php
					$arr = array("Student","Staff");
					foreach($arr as $val)
					{
						echo "<option value='$val'>$val</option>";
					}
					?>
				</select><br>
              </div>
              <div>
                <input name="login_id" id="login_id" type="text" placeholder="Login ID " />
              </div><br>
              <div>
                <input name="password"   id="password"  type="password" placeholder="Password" />
              </div>
              <button type="submit" name="btnsubmit">Login</button>
			  <hr>
			  Did you forget password - <a href="forgotpassword.php" class="btn-info">&nbsp; Click Here &nbsp;</a>
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