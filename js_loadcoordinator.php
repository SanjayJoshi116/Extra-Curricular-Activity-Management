<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
$dt = date("Y-m-d");
$hr = date("H");
$dttim = date("Y-m-d H:i:s");
include("dbconnection.php");
?>
<label class="labelproperty">Coordinator</label>
<span class="errormessage" id="id_staff_id"></span>
<select name="staff_id" id="staff_id" class="form-control" >
<option value="">--Select Coordinator--</option>
<?php
$sqlstaff = "SELECT * FROM staff WHERE staff_status='Active' ";
if(isset($_POST['department_id']))
{
	$sqlstaff = $sqlstaff . " AND department_id='$_POST[department_id]'";
}
else
{
	$sqlstaff = $sqlstaff . " AND department_id='$rsedit[department_id]'";
}
echo $sqlstaff;
$qsqlstaff = mysqli_query($con,$sqlstaff);
echo mysqli_error($con);
while($rsstaff = mysqli_fetch_array($qsqlstaff))
{
	if($rsstaff['staff_id'] == $rsedit['coordinator'])
	{
		echo "<option value='$rsstaff[staff_id]' selected>$rsstaff[staff_name] ($rsstaff[staff_type])</option>";
	}
	else
	{
		echo "<option value='$rsstaff[staff_id]'>$rsstaff[staff_name] ($rsstaff[staff_type])</option>";
	}
}
?>
</select>