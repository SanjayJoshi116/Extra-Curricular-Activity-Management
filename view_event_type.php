<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM event_type where event_type_id='$_GET[delid]'";
	$qsqldel = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event Type Record deleted successfully..');</script>";
		echo "<script>window.location='view_event_type.php';</script>";
	}
}
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE event_type SET event_type_status='$_GET[st]' WHERE event_type_id='$_GET[acid]'";
	$qsqlas = mysqli_query($con,$sqlas);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Event type status updated to $_GET[st]');</script>";
		echo "<script>window.location='view_event_type.php';</script>";
	}
}
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
           View Event Category
        </h3>
        <p>
          View Event Category Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Event Category</th>
			<th>Event Category Info</th>
			<th>Event Category Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  event_type ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[event_type]</td>
				<td>$rsview[event_type_info]</td>
				<td>$rsview[event_type_status] <br>";
				if($rsview['event_type_status'] == "Active")
{
	echo "<a href='view_event_type.php?st=Suspend&acid=$rsview[event_type_id]' class='btn btn-secondary' onclick='return confirmst()' >Suspend</a>";
}
else
{
	echo "<a href='view_event_type.php?st=Active&acid=$rsview[event_type_id]' class='btn btn-primary' onclick='return confirmst()'  >Activate</a>";
}
				echo"
				<td>
				<a href='event_type.php?editid=$rsview[event_type_id]' class='btn btn-info'>Edit</a>
				<a href='view_event_type.php?delid=$rsview[event_type_id]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
				</td>
			</tr>";
		}
		?>
	</tbody>
</table>
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