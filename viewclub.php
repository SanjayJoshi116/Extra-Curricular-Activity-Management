<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM club where club_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Club Record deleted successfully..');</script>";
		echo "<script>window.location='viewclub.php';</script>";
	}
}
//Approve or Suspend department starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE club SET club_status='$_GET[st]' WHERE club_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Club status updated to $_GET[st]');</script>";
		echo "<script>window.location='viewclub.php';</script>";
	}
}
//Approve or Suspend department ends here
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          View Club
        </h3>
        <p>
          View Club Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<form method="post" action="" name="frmdept" id="frmdept" >
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Club</th>
			<th>Department</th>
			<th>Coordinator</th>
			<th>Club Details</th>
			<th>Club Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
			$sqlview = "SELECT club.*,department.department,staff.staff_name FROM club LEFT JOIN department ON department.department_id=club.department_id LEFT JOIN staff ON staff.staff_id=club.coordinator";
			$qsqlview = mysqli_query($con,$sqlview);
			while($rsview = mysqli_fetch_array($qsqlview))
			{
				echo "<tr>
					<td>$rsview[club]</td>
					<td>$rsview[department]</td>
					<td>$rsview[staff_name]</td>
					<td>$rsview[club_details]
					<td>$rsview[club_status]<br>";
					if($rsview['club_status'] == "Active")
					{
					echo "<a href='viewclub.php?st=Suspended&acid=$rsview[club_id]' class='btn btn-secondary' onclick='return confirmst()' >Suspend</a>";
					}	
					else
					{
					echo "<a href='viewclub.php?st=Active&acid=$rsview[club_id]' class='btn btn-primary' onclick='return confirmst()'  >Approve</a>";
					}
					echo "</td><td> 
					<a href='addclub.php?editid=$rsview[club_id]' class='btn btn-info'>Edit</a> 
					<a href='viewclub.php?delid=$rsview[club_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
				</tr>";
			}
			?>
	</tbody>
</table>
</form>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
		
      </div>
    </div>
  </section>

  <!-- end event section -->
<?php
include("footer.php");
?>
<script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<script>
function confirmst()
{
	if(confirm("Are you sure?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>