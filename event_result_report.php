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
	$sql = $sql . " ,staff_id='$_POST[staff_id]' WHERE event_result_id='$rsevent_result[0]'";
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
  <section class="login_section">
    <div class="container"><br>
      <div class="row">
	  
        <div class="col-md-12"><br>
          <centeR><div class="detail-box">
            <h3>
              Event Result
            </h3>
          </div></center>
        </div>
		
        <div class="col-md-12">
<form action="" method="post" name="frmevent_result" id="frmevent_result" enctype="multipart/form-data">
          <div class="login_form">
        <div class="col-md-12">
          <centeR><div class="detail-box">
            <h5>
              <b style="color: yellow;">Event Detail</b>
            </h5>
          </div></center>
        </div>
<?php
$sqlview = "SELECT event.*,department.department,event_type.event_type FROM  event LEFT JOIN department ON event.department_id=department.department_id LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id WHERE event.event_id='$_GET[event_id]'";
$qsqlview = mysqli_query($con,$sqlview);
$rsview = mysqli_fetch_array($qsqlview);
?>
<table class="table table-bordered" style="color: white">
	<tr>
		<th>About Event</th>
		<td style="text-align: left;">
			<h4><?php echo $rsview['event_title']; ?></h4>
			<b><?php echo $rsview['event_type']; ?></b>
			<br><?php
			if($rsview['event_banner'] == "")
			{
				echo "<img src='images/noimage.jpg' style='width: 275px;height: 175px;'>";
			}
			else if(file_exists("imgbanner/" . $rsview['event_banner']))
			{
				echo "<img src='imgbanner/$rsview[event_banner]' style='width: 275px;height: 175px;'>";
			}
			else
			{
				echo "<img src='images/noimage.jpg' style='width: 275px;height: 175px;'>";
			}		
			?>
		</td>
	</tr>		
	<tr>
		<th>Event Date</th>
		<td style="text-align: left;"><?php echo date("d-m-Y h:i A",strtotime($rsview['event_date_time'])); ?></td>
	</tr>
</table>
          </div>
		  <br>
          <div class="login_form">
        <div class="col-md-12">
          <centeR><div class="detail-box">
            <h5>
              <b style="color: yellow;">Event Report</b>
            </h5>
          </div></center>
        </div>		  
<table class="table table-bordered" style="color: white">
	<tr>
		<th style="width: 250px;">Reported by</th>
		<td style="text-align: left;">
			<?php
			$sqlstaff = "SELECT * FROM staff WHERE staff_status='Active' AND staff_type!='Admin'";
			$qsqlstaff = mysqli_query($con,$sqlstaff);
			while($rsstaff = mysqli_fetch_array($qsqlstaff))
			{
				if($rsstaff[0] == $rsedit['staff_id'])
				{
				echo "<option value='$rsstaff[0]' selected>$rsstaff[staff_name]</option>";
				}
			}
			?>
		</td>
	</tr>	
	<tr>
		<th>About Event Result</th>
		<td style="text-align: left;">
			<?php echo $rsedit['result_detail']; ?>
		</td>
	</tr>	
	<tr>
		<th>Event Images & Videos</th>
		<td style="text-align: left;"><div class="row">
			<?php
			$event_documentry = unserialize($rsedit['event_documentry']);
			if(count($event_documentry) >= 1)
			{
				foreach($event_documentry as $eventdoc)
				{
					$ext = pathinfo($eventdoc, PATHINFO_EXTENSION);
					if($ext == "mp4")
					{
						echo "<div class='col-md-4'><video  style='width: 100%;height: 200px;' controls><source src='docsevent/$eventdoc' type='video/mp4'></video></div>";
					}
					else
					{
						echo "<div class='col-md-4'><img src='docsevent/"  . $eventdoc . "' style='width: 100%;height: 200px;' ></div>";
					}
				}
			}
			?>
			</div>
		</td>
	</tr>
</table>
          </div>
		  <br>
          <div class="login_form">
		  
		          <div class="col-md-12">
          <centeR><div class="detail-box">
            <h5>
              <b style="color: yellow;">Participant Result</b>
            </h5>
          </div></center>
        </div>	
			<div class="row">
				  <div style="text-align: left;" class="col-md-12">
<table class="table table-bordered" style="color: white">
<thead>
		<tr style="color: white;">
			<th style='width: 50px;height: 50px;'>Image</th>
			<th style='width: 120px;'>Student Roll No.</th>
			<th style='width: 230px;'>Student Name</th>
			<th>Ranking</th>
			<th>Point</th>
		</tr>
	</thead>
	<tbody>
  <?php 
  	$sqlview = "SELECT event_result_status.*,student.student_name, student.student_rollno, student.st_class, student.student_image FROM event_result_status LEFT JOIN student ON student.student_id=event_result_status.student_id WHERE event_result_status.event_id='$_GET[event_id]' AND  event_result_status.winning_position IN (1,2,3)  ORDER BY winning_position";
	$qsqlview = mysqli_query($con,$sqlview);
	echo mysqli_error($con);
	while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td style='width: 50px;height: 50px;'><img src='studentimg/$rsview[student_image]' style='width: 100px;height: 100px;' ></td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[student_name]</td>
				<td onclick='fun_load_points($rsview[result_status_id])' id='td$rsview[result_status_id]'>";
				echo $rsview['winning_position'];
			echo "</td>
				<td>$rsview[point]</td>";
			echo"</tr>";
		}
  	$sqlview = "SELECT event_result_status.*,student.student_name, student.student_rollno, student.st_class, student.student_image FROM event_result_status LEFT JOIN student ON student.student_id=event_result_status.student_id WHERE event_result_status.event_id='$_GET[event_id]' AND  event_result_status.winning_position='0'  ORDER BY winning_position";
	$qsqlview = mysqli_query($con,$sqlview);
	echo mysqli_error($con);
	while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td style='width: 50px;height: 50px;'><img src='studentimg/$rsview[student_image]'  style='width: 100px;height: 100px;' ></td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[student_name]</td>
				<td onclick='fun_load_points($rsview[result_status_id])' id='td$rsview[result_status_id]'>NA</td>
				<td>
				$rsview[point]
				</td>";
			echo"</tr>";
		}
  	$sqlview = "SELECT event_result_status.*,student.student_name, student.student_rollno, student.st_class, student.student_image FROM event_result_status LEFT JOIN student ON student.student_id=event_result_status.student_id WHERE event_result_status.event_id='$_GET[event_id]' AND  event_result_status.winning_position=''  ORDER BY winning_position";
	$qsqlview = mysqli_query($con,$sqlview);
	echo mysqli_error($con);
	while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td><img src='studentimg/$rsview[student_image]' style='width: 100px;height: 100px;' ></td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[student_name]</td>
				<td >Absent</td>
				<td>$rsview[point]</td>";
			echo"</tr>";
		}
  ?>
	</tbody>
</table>
				  </div>
			</div>
          </div>
</form>
        </div>
		</div>
    </div><br>
  </section>
  <!-- end contact section -->
<?php
include("footer.php");
?>
<script>
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
