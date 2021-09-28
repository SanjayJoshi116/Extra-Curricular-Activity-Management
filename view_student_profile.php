<?php
include("header.php");
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_SESSION['student_id']))
{
	$sqledit= "SELECT * FROM student where student_id='$_SESSION[student_id]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}?><br>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <br><br>
      <?php
					if($rsedit['student_image'] == "")
					{
						echo "<img src='images/defaultimage.png' alt='Avatar' style='width: 270px;height:350px;' />";
					}
					else if(file_exists("studentimg/" . $rsedit['student_image']))
					{
						echo "<img src='studentimg/" . $rsedit['student_image'] . "' alt='Avatar' style='width: 270px;height:350px;' />";
					}
					else
					{
						echo "<img src='images/defaultimage.png' alt='Avatar' style='width: 270px;height:350px;' />";
					}
		?>
		      <h1><b><?php echo $rsedit['student_name']; ?></b></h1>
		      <h1><b><?php echo $rsedit['student_rollno']; ?></b></h1>
		      <h1><b><?php 
				$arr = array("First Year","Second Year","Third Year");
				foreach($arr as $val)
				{
					if($val == $rsedit['st_class'])
					{
						echo "$val";
					}
				}
					$sqlcourse = "SELECT * FROM course WHERE course_status='Active'";
					$qsqlcourse = mysqli_query($con,$sqlcourse);
					echo mysqli_error($con);
					while($rscourse = mysqli_fetch_array($qsqlcourse))
					{
						if($rscourse['course_id'] == $rsedit['course_id'])
						{
							echo " $rscourse[course_title] ";
						}
					}
					?></b></h1>
				<p>Class</p>
					<h2><b><?php echo $rsedit['dob']; ?></b></h2>
					<p>Date of birth</p></div>
					<div class="flip-card-back">
      <b><h1><?php
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
			<h1><b><?php echo $rsedit['dob']; ?></b></h1>
					<p>Date of birth</p>
			<h1><?php
				$arr = array("Sanskrit","Hindi","Kannada");
				foreach($arr as $val)
				{
					if($val == $rsedit['language'])
					{
					echo "$val";
					}
				}?>
				</h1>
				<p>Language</p>
				<h1><?php
				$arr = array("Sanskrit","Hindi","Kannada","English","History","Economics and Rural Development","Political Science","Journalism","Home Science","Physics","Chemistry");
				foreach($arr as $val)
				{
					if($val == $rsedit['elective_paper'])
					{
					echo "$val";
					}
				}
				?></h1>
				<p>Elective Paper</p>
				<h1>
					<?php
					$arr = array("NCC","NSS","Rovers & Rangers","Cultural","Sports","None");
					foreach($arr as $val)
					{
						if($val  == $rsedit['extension_activities'])
						{
						echo "$val";
						}
					}
				?></h1>
				<p>Extension Activities</p></b>




		  </div>
		</div>
	</div>
	<style>
  /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
.flip-card {
  background-color: transparent;
  width: 600px;
  height: 800px;
   position: relative;
   left: 450px;
  border: 20px solid #f1f1f1;
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
  background-color: #007bffbd;
  color: white;
}

/* Style the back side */
.flip-card-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
}
</style>
<br><br>
<?php
include("footer.php");
?>
