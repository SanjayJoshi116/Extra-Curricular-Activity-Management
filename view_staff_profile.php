<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
  echo "<script>window.location='login.php';</script>";
}
if(isset($_SESSION['staff_id']))
{
  $sqledit= "SELECT * FROM staff where staff_id='" . $_SESSION['staff_id'] . "'";
  $qsqledit = mysqli_query($con,$sqledit);
  $rsedit = mysqli_fetch_array($qsqledit);
}
?>
<br>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <br><br>
     <?php 
     if($rsedit['staff_dp'] == "")
        {
          echo "<img src='images/defaultimage.png' alt='Avatar' style='width:300px;height:300px;' />";
        }
        else if(file_exists("staffimg/" . $rsedit['staff_dp']))
        {
          echo "<img src='staffimg/" . $rsedit['staff_dp'] . "' alt='Avatar' style='width: 300px;height:300px;' />";
        }
        else
        {
          echo "<img src='images/defaultimage.png' style='width: 300px;height:300px;' />";
        } ?>
      <b><h1 style="font-size: 400%";><br><b><?php echo $rsedit['staff_name']; ?></b></h1>
      <h1><?php
        $sqldepartment = "SELECT * FROM department WHERE department_status='Active'";
        $qsqldepartment = mysqli_query($con,$sqldepartment);
        echo mysqli_error($con);
        while($rsdepartment = mysqli_fetch_array($qsqldepartment))
        {
          if($rsdepartment['department_id'] == $rsedit['department_id'])
          {
            echo "$rsdepartment[department]";
          }
        }

          ?></h1>
      <p>department</p></b>
    </div>
    <div class="flip-card-back">
      <b><h1><?php
    $arr = array("Admin","HOD","Assistant Professor","Lecturer","Guest Lecturer","Lab Assistant");
    foreach($arr as $val)
    {
      if($val == $rsedit['staff_type'])
      {
      echo "$val";
    }
  }
?></h1>
      <p>Staff Type</p>
      <h1><?php echo $rsedit['login_id']; ?></h1>
      <p>Email Id</p>
      <h1>
          <?php 
        $arr = array("Male","Female");
        foreach($arr as $val)
        {
          if($val == $rsedit['gender'])
          {
          echo "$val";
        }
      }
    ?></h1>
    <p>Gender</p>
    <h1><?php echo $rsedit['dob']; ?></h1>
    <p>Date of Birth</p></b>
    </div>
  </div>
</div><!-- HTML !-->
<style>
.button-3 {
  appearance: none;
  background-color: #2ea44f;
  border: 5px solid rgba(27, 31, 35, .15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
  font-size: 25px;
  font-weight: 600;
  line-height: 20px;
  padding: 20px 50px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
  box-shadow: none;
  outline: none;
}

.button-3:hover {
  background-color: #2c974b;
}

.button-3:focus {
  box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
  outline: none;
}

.button-3:disabled {
  background-color: #94d3a2;
  border-color: rgba(27, 31, 35, .1);
  color: rgba(255, 255, 255, .8);
  cursor: default;
}

.button-3:active {
  background-color: #298e46;
  box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
}
</style>
<br><br>
 <div class="d-flex justify-content-center">
<a href="staffprofile.php"><button class="button-3" role="button">Click here to Edit</button></a>
  </div>
<style>
  /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
.flip-card {
  background-color: transparent;
  width: 600px;
  height: 700px;
   position: relative;
   left: 450px;
  border: 10px solid #96c8ff;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #3498db;
  color: white;
  font-family: "Lucida Console", "Courier New", monospace;
}

/* Style the back side */
.flip-card-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
  font-family: "Lucida Console", "Courier New", monospace;
}
.p3 {
  font-family: "Lucida Console", "Courier New", monospace;
}
</style>
<br><br>
<?php
include("footer.php");
?>