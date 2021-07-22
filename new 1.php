<?php
include "header.php";
if(isset($_SESSION['staff_id']))
{
	echo "<script>window.location='dashboard.php';</script>";
}
if(isset($_SESSION['student_id']))
{
	echo "<script>window.location='student-dashboard.php';</script>";
}
if(isset($_POST['btnsubmit']))
{
	if(isset($_POST['login_id']))
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
	else
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
                <input name="login_id" id="login_id" type="text" placeholder="Login ID " />
              </div>
              <div>
                <input name="password"   id="password"  type="password" placeholder="Password" />
              </div>
              <button type="submit" name="btnsubmit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
 <?php
 include "footer.php";
 ?>