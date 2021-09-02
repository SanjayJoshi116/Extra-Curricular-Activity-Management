<?php
include("header.php");
if(isset($_POST['submit']))
{
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
	$sql = "UPDATE event_result SET event_id='$_POST[event_id]',result_detail='$_POST[result_detail]',event_documentry='$imgarr',staff_id='$_POST[staff_id]' WHERE event_result_id='$_GET[editid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			$insid = mysqli_insert_id($con);
			$sqlevent_result_status ="UPDATE event_result_status SET point='' WHERE ";
			echo "<script>alert('Event Result Published successfully...');</script>";
		echo "<script>alert('Event Result record Published  successfully...');</script>";
		//echo "<script>window.location='view_event_result.php';</script>";
	}
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
}
//Step2: for edit statement ends here
?>
</div>
<?php
include("radio.php");
?>
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
<form action="" method="post" name="frmevent_result" id="frmevent_result" enctype="multipart/form-data">
          <div class="login_form">
			<div class="row">
				  <div style="text-align: left;" class="col-md-6">
					<label class="labelproperty">Staff</label>
					<select name="staff_id" id="staff_id" class="form-control" >
						<option value="">Select Staff</option>
						<?php
						$sqlstaff = "SELECT * FROM staff WHERE staff_status='Active'";
						$qsqlstaff = mysqli_query($con,$sqlstaff);
						while($rsstaff = mysqli_fetch_array($qsqlstaff))
						{
							if($rsstaff[0] == $rsedit['staff_id'])
							{
							echo "<option value='$rsstaff[0]' selected>$rsstaff[staff_name]</option>";
							}
							else
							{
							echo "<option value='$rsstaff[0]'>$rsstaff[staff_name]</option>";
							}
						}
						?>
					</select>
				  </div>
				  <div style="text-align: left;" class="col-md-12">
					<label class="labelproperty">About  Event Result</label>
					<textarea name="result_detail" id="result_detail" class="form-control" ></textarea>
				  </div>
				  <div style="text-align: left;" class="col-md-12">
					<label class="labelproperty">Event Images & Videos</label>
					<input type="file" multiple name="event_documentry[]" id="event_documentry" class="form-control" >
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
			<th style='width: 220px;'>Student Name</th>
			<th>Ranking</th>
			<th>Point</th>
		</tr>
	</thead>
	<tbody>
  <?php 
  	$sqlview = "SELECT event_result_status.*,student.student_name, student.student_rollno, student.st_class, student.student_image FROM event_result_status LEFT JOIN student ON student.student_id=event_result_status.student_id WHERE event_result_status.event_id='$_GET[event_id]' AND event_result_status.point='1' ORDER BY event_id";
	$qsqlview = mysqli_query($con,$sqlview);
	while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td><img src='studentimg/$rsview[student_image]' style='width: 50px;height: 50px;' ></td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[student_name]</td>
				<td>";
?>
<input  data-radiocharm-background-color="3498DB" data-radiocharm-label="1st" name="ranking<?php echo $rsview[0]; ?>" onclick="fun_load_points(<?php echo $rsview[0]; ?>,this.value)"  type="radio" value="1"
<?php
if($rsview['winning_position'] == 1)
{
	echo " checked ";
}
?> />
<input data-radiocharm-label="2nd" data-radiocharm-background-color="F1C40F" name="ranking<?php echo $rsview[0]; ?>"  type="radio" value="2" 
<?php
if($rsview['winning_position'] == 2)
{
	echo " checked ";
}
?>  onclick="fun_load_points(<?php echo $rsview[0]; ?>,this.value)" />
<input data-radiocharm-label="3rd" data-radiocharm-background-color="C0392B" name="ranking<?php echo $rsview[0]; ?>"  type="radio" value="3" 
<?php
if($rsview['winning_position'] == 3)
{
	echo " checked ";
}
?>  onclick="fun_load_points(<?php echo $rsview[0]; ?>,this.value)" />
<input data-radiocharm-label="NA" data-radiocharm-background-color="#0e0e0e" name="ranking<?php echo $rsview[0]; ?>" type="radio" value="0" 
<?php
if($rsview['winning_position'] == 0)
{
	echo " checked ";
}
?>  onclick="fun_load_points(<?php echo $rsview[0]; ?>,this.value)" />
<?php
			echo "</td>
				<td><input type='number' name='point$rsview[0]' id='point[]' style='width: 75px;' class='btn btn-secondary' readonly value='$rsview[point]' ></td>";
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
function fun_load_points(result_status_id,winning_position)
{
	$.post("js_loadpoints.php",
	{
		result_status_id: result_status_id,
		winning_position: winning_position
	},
	function(data){
		//alert("Data: " + data + "\nStatus: " + status);
		$('#point' + result_status_id).val(data);
	});
}
</script>