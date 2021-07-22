<?php
include("header.php");
if(isset($_SESSION['student_id']))
{
	echo "<script>window.location='student-dashboard.php';</script>";
}
if(isset($_POST['btnsubmit']))
{
	$encpass = md5($_POST['student_password']);
	$sql = "SELECT * FROM student where student_rollno='$_POST[student_rollno]' AND student_password='$encpass' AND student_status='Active'";
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
?>
</div>

  <!-- login section -->

  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              STUDENT LOGIN PANEL
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
                <input type="text" name="student_rollno" id="student_rollno" placeholder="Enter your Roll Number" />
              </div>
              <div>
                <input type="password" name="student_password" id="student_password" placeholder="Student Password" />
              </div>
              <button type="submit" name="btnsubmit">Login</button>
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