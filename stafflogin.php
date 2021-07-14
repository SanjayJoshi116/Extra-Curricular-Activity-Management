<?php
include("header.php");
//This code checks whether staff already logged in or not.
if(isset($_SESSION['staff_id']))
{
	echo "<script>window.location='dashboard.php';</script>";
}
//..
if(isset($_POST['btnsubmit']))
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
?>
</div>

  <!-- login section -->
  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              STAFF LOGIN PANEL
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
                
              </div>
              <div>
                <input name="login_id" id="login_id" type="text" placeholder="Staff Login ID " />
              </div>
              <div>
                <input name="password"   id="password"  type="password" placeholder="Staff Password" />
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