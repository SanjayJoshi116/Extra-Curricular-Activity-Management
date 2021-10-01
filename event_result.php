<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sqlevent_result ="SELECT * FROM event_result WHERE event_id='$_GET[event_id]'";
	$qsqlevent_result = mysqli_query($con,$sqlevent_result);
	$rsevent_result = mysqli_fetch_array($qsqlevent_result);
	// Count # of uploaded files in array
	$total = count($_FILES['event_documentry']['name']);
	// Loop through each file
	if($total >= 1)
	{
		for( $i=0 ; $i < $total ; $i++ ) 
		{
			$imgname	= $_FILES['event_documentry']['name'][$i];
			move_uploaded_file($_FILES['event_documentry']['tmp_name'][$i], "docsevent/" . $imgname);
			$arrimg[] = $imgname;
		}
	}
	$imgarr = serialize($arrimg);
	//Step: 3 - Update statement starts here
	$sql = "UPDATE event_result SET result_detail='$_POST[result_detail]'";
	if($_FILES['event_documentry']['name'][0] != "")
	{
	$sql = $sql . ",event_documentry='$imgarr'";
	}
	$sql = $sql . " ,staff_id='$_SESSION[staff_id]' WHERE event_result_id='$rsevent_result[0]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	$sqlevent_result ="SELECT * FROM event_result_status WHERE event_id='$_GET[event_id]'";
	$qsqlevent_result = mysqli_query($con,$sqlevent_result);
	$winning_position = $_POST['ranking'];
	$point = $_POST['point'];
	while($rsevent_result = mysqli_fetch_array($qsqlevent_result))
	{ 
		$sqle_r_s = "UPDATE event_result_status SET winning_position='" . $winning_position[$rsevent_result[0]] . "',point='" . $point[$rsevent_result[0]] . "' WHERE result_status_id='$rsevent_result[0]'";
		mysqli_query($con,$sqle_r_s);
	}
	echo "<script>alert('Event Result Published successfully...');</script>";
	echo "<script>window.location='event_result.php?event_id=$_GET[event_id]';</script>";
	//Step: 3 - Update statement Ends here
}
/*
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE event_result_status SET event_result_id='$_POST[event_result_id]',event_id='$_POST[event_id]',student_id='$_POST[student_id]',event_participation_id='$_POST[event_participation_id]',winning_position='$_POST[winning_position]',point='$_POST[point] WHERE result_status_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Event result status record updated successfully...');</script>";
			echo "<script>window.location='view_event_result_status.php';</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO event_result_status(event_result_id,event_id, student_id, event_participation_id, winning_position, point) VALUES('$_POST[event_result_id]','$_POST[event_id]','$_POST[student_id]','$_POST[event_participation_id]','$_POST[winning_position]','$_POST[point]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con)==1)
		{
			echo "<script>alert('Event Result Status Published successfully...');</script>";
			echo "<script>window.location='event_result_status.php';</script>";
		}
	}
}
*/
//Step2: for Edit statement starts here
if(isset($_GET['event_id']))
{
	$sqledit = "SELECT * FROM event_result where event_id='$_GET[event_id]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	$sqlevent_result_status = "SELECT * FROM event_result_status where event_id='$_GET[event_id]'";
	$qsqlevent_result_status = mysqli_query($con,$sqlevent_result_status);
	$rsevent_result_status = mysqli_fetch_array($qsqlevent_result_status);
}
//Step2: for edit statement ends here
?>
</div>
<?php
//include("radio.php");
?>
<link rel="stylesheet" href="radiocss.css">
  <!-- login section -->
  <section class="login_section layout_padding">
    <div class="container"><br>
      <div class="row">
        <div class="col-md-12"><br>
          <centeR><div class="detail-box">
            <h3>
              Publish Event Result
            </h3>
            <p>
             Kindly enter Event Result
            </p>
          </div></center>
        </div>
        <div class="col-md-12">
<form action="" method="post" name="frmevent_result" id="frmevent_result" enctype="multipart/form-data" onsubmit="return validateform()">
          <div class="login_form">
			<div class="row">
				  <div style="text-align: left;" class="col-md-6">
					<label class="labelproperty">Reported by</label>
						<?php
						$sqlstaff = "SELECT * FROM staff WHERE staff_status='Active'";
						$qsqlstaff = mysqli_query($con,$sqlstaff);
						while($rsstaff = mysqli_fetch_array($qsqlstaff))
						{
							if($rsstaff['staff_id'] == $_SESSION['staff_id'])
							{
								?>
								<br><input type="text" name="staff_name" id="staff_name"  value="<?php echo $rsstaff['staff_name']; ?>" disabled />
						<?php
							}
						}
						?>
					</select>
				  </div>
				  <div style="text-align: left;" class="col-md-12">
					<label class="labelproperty">About  Event Result</label>
					<span class="errormessage" id="id_result_detail"></span>
					<textarea name="result_detail" id="result_detail" class="form-control" ><?php echo $rsedit['result_detail']; ?></textarea>
				  </div>
				  <div style="text-align: left;" class="col-md-12">
					<label class="labelproperty">Event Images & Videos</label>
					<span class="errormessage" id="id_event_documentry[]"></span>
					<input type="file" multiple name="event_documentry[]" id="event_documentry" class="form-control" accept="image/*,video/mp4" >
					<div class="row">
					<?php
					$event_documentry = unserialize($rsedit['event_documentry']);
					if(count($event_documentry) >= 1)
					{
						foreach($event_documentry as $eventdoc)
						{
							$ext = pathinfo($eventdoc, PATHINFO_EXTENSION);
							if($ext == "mp4")
							{
								echo "<div class='col-md-2'><video style='width: 150px;height: 150px;' controls><source src='docsevent/$eventdoc' type='video/mp4'></video></div>";
							}
							else
							{
								echo "<div class='col-md-2'><img src='docsevent/"  . $eventdoc . "' style='width: 150px;height: 150px;' ></div>";
							}
						}
					}
					?>
					</div>
				  </div>
			</div>
          </div>
		  <br>
          <div class="login_form">
			<div class="row">
				  <div style="text-align: left;" class="col-md-12">
<table id="datatableplugin" class="table table-bordered">
<thead>
		<tr style="color: white;">
			<th>Image</th>
			<th style='width: 120px;'>Student Roll No.</th>
			<th style='width: 230px;'>Student Name</th>
			<th>Ranking</th>
			<th>Point</th>
		</tr>
	</thead>
	<tbody>
  <?php 
  	$sqlview = "SELECT event_participation.*,student.student_name, student.student_rollno, student.st_class, student.student_image FROM event_participation LEFT JOIN student ON student.student_id=event_participation.student_id WHERE event_participation.event_id='$_GET[event_id]' AND event_participation.event_participation_status='Present'  ORDER BY event_id";
	$qsqlview = mysqli_query($con,$sqlview);
	while($rsview = mysqli_fetch_array($qsqlview))
		{
			$sqlevent_result_status = "SELECT * FROM event_result_status where event_participation_id='$rsview[0]'";
			$qsqlevent_result_status = mysqli_query($con,$sqlevent_result_status);
			$rsevent_result_status = mysqli_fetch_array($qsqlevent_result_status);
			echo "<tr>
				<td><img src='studentimg/$rsview[student_image]' style='width: 50px;height: 50px;' ></td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[student_name]</td>
				<td onclick='fun_load_points($rsview[result_status_id])' id='td$rsview[result_status_id]'>";
?>
<style>
#option-1<?php echo $rsview[0]; ?>:checked:checked ~ .option-<?php echo $rsview[0]; ?>{
  border-color: #0069d9;
  background: #0069d9;
}
#option-2<?php echo $rsview[0]; ?>:checked:checked ~ .option-2<?php echo $rsview[0]; ?> .dot{
  background: #fff;
}
#option-3<?php echo $rsview[0]; ?>:checked:checked ~ .option-3<?php echo $rsview[0]; ?> .dot::before{
  opacity: 1;
  transform: scale(1);
}
#option-4<?php echo $rsview[0]; ?>:checked:checked ~ .option-4<?php echo $rsview[0]; ?> span{
  color: #fff;
}

#option-1<?php echo $rsview[0]; ?>:checked:checked ~ .option-1<?php echo $rsview[0]; ?>,
#option-2<?php echo $rsview[0]; ?>:checked:checked ~ .option-2<?php echo $rsview[0]; ?>,
#option-3<?php echo $rsview[0]; ?>:checked:checked ~ .option-3<?php echo $rsview[0]; ?>,
#option-4<?php echo $rsview[0]; ?>:checked:checked ~ .option-4<?php echo $rsview[0]; ?>{
  border-color: #0069d9;
  background: #0069d9;
}
#option-1<?php echo $rsview[0]; ?>:checked:checked ~ .option-1<?php echo $rsview[0]; ?> .dot,
#option-2<?php echo $rsview[0]; ?>:checked:checked ~ .option-2<?php echo $rsview[0]; ?> .dot,
#option-3<?php echo $rsview[0]; ?>:checked:checked ~ .option-3<?php echo $rsview[0]; ?> .dot,
#option-4<?php echo $rsview[0]; ?>:checked:checked ~ .option-4<?php echo $rsview[0]; ?> .dot{
  background: #fff;
}
#option-1<?php echo $rsview[0]; ?>:checked:checked ~ .option-1<?php echo $rsview[0]; ?> .dot::before,
#option-2<?php echo $rsview[0]; ?>:checked:checked ~ .option-2<?php echo $rsview[0]; ?> .dot::before,
#option-3<?php echo $rsview[0]; ?>:checked:checked ~ .option-3<?php echo $rsview[0]; ?> .dot::before,
#option-4<?php echo $rsview[0]; ?>:checked:checked ~ .option-4<?php echo $rsview[0]; ?> .dot::before{
  opacity: 1;
  transform: scale(1);
}
#option-1<?php echo $rsview[0]; ?>:checked:checked ~ .option-1<?php echo $rsview[0]; ?> span,
#option-2<?php echo $rsview[0]; ?>:checked:checked ~ .option-2<?php echo $rsview[0]; ?> span,
#option-3<?php echo $rsview[0]; ?>:checked:checked ~ .option-3<?php echo $rsview[0]; ?> span,
#option-4<?php echo $rsview[0]; ?>:checked:checked ~ .option-4<?php echo $rsview[0]; ?> span{
  color: #fff;
}
</style>
<div class="wrapper">
  <input type="radio" name="ranking[<?php echo $rsevent_result_status[0]; ?>]" id="option-1<?php echo $rsview[0]; ?>" value="1" onchange="loadrec(<?php echo $rsview[0]; ?>,1)"  
  <?php
  if($rsevent_result_status['winning_position'] == 1)
  {
	  echo " checked ";
  }
  ?>
  >
  <input type="radio" name="ranking[<?php echo $rsevent_result_status[0]; ?>]" id="option-2<?php echo $rsview[0]; ?>" value="2" onchange="loadrec(<?php echo $rsview[0]; ?>,2)"  
  <?php
  if($rsevent_result_status['winning_position'] == "2")
  {
	  echo " checked ";
  }
  ?>
  >
  <input type="radio" name="ranking[<?php echo $rsevent_result_status[0]; ?>]" id="option-3<?php echo $rsview[0]; ?>" value="3" onchange="loadrec(<?php echo $rsview[0]; ?>,3)"
  <?php
  if($rsevent_result_status['winning_position'] == "3")
  {
	  echo " checked ";
  }
  ?>
  >
  <input type="radio" name="ranking[<?php echo $rsevent_result_status[0]; ?>]" id="option-4<?php echo $rsview[0]; ?>" value="0" onchange="loadrec(<?php echo $rsview[0]; ?>,0)" 
  <?php
  if($rsevent_result_status['winning_position'] == "0")
  {
	  echo " checked ";
  }
  ?>
  >
  
  <label for="option-1<?php echo $rsview[0]; ?>" class="option option-1<?php echo $rsview[0]; ?>">
	<div class="dot"></div>
	<span>1st</span>
  </label>
  <label for="option-2<?php echo $rsview[0]; ?>" class="option option-2<?php echo $rsview[0]; ?>">
	<div class="dot"></div>
	<span>2nd</span>
  </label>
  <label for="option-3<?php echo $rsview[0]; ?>" class="option option-3<?php echo $rsview[0]; ?>">
	<div class="dot"></div>
	<span>3rd</span>
  </label>
  <label for="option-4<?php echo $rsview[0]; ?>" class="option option-4<?php echo $rsview[0]; ?>">
	<div class="dot"></div>
	<span>NA</span>
  </label>
</div>
<?php
			echo "</td>
				<td><input type='number' name='point[$rsevent_result_status[0]]' id='point" . $rsview[0]. "' style='width: 75px;' class='btn btn-secondary' readonly value='$rsevent_result_status[point]' ></td>";
			echo"</tr>";
		}
  ?>
	</tbody>
</table>
				  </div>
				  <div style="text-align: left;" class="col-md-12">
					<hr>
					<center><input type="submit" name="submit" id="submit" value="Click Here to Submit" class="btn btn-info btn-lg" ></center>
				  </div>
			</div>
          </div>
</form>
        </div>
		</div>
    </div>
  </section>
  <!-- end contact section -->
<?php
include("footer.php");
?>
<script>
function validateform()
{
	$('.errormessage').html('');
	var errmsg = "No";
	if($('#staff_id').val() == "")
	{
		$('#id_staff_id').html("Kindly select staff name..");
		errmsg = "Yes";
	}
	if($('#result_detail').val() == "")
	{
		$('#id_result_detail').html("Kindly fill result details..");
		errmsg = "Yes";
	}
	if($('#event_documentry[]').val() == "")
	{
		$('#id_event_documentry[]').html("Kindly input image/video..");
		errmsg = "Yes";
	}
	if(errmsg == "Yes")
	{
		return false;
	}
	if(errmsg == "No")
	{
		return true;
	}
}
function loadrec(result_status_id,rank)
{
	$.post("js_loadpoints.php",
	{
		result_status_id: result_status_id,
		winning_position: rank
	},
	function(data){
		//alert("Data: " + data + "\nStatus: " + status);
		$('#point' + result_status_id).val(data);
	});
}
</script>
