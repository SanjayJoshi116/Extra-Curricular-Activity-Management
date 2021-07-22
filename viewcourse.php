<?php
include("header.php");
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          View Course
        </h3>
        <p>
          View Course Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Staff Name</th>
			<th>Staff ID</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Designation</th>
			<th>Image</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  staff ";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[staff_name]</td>
				<td>$rsview[login_id]</td>
				<td>$rsview[gender]</td>
				<td>$rsview[dob]</td>
				<td>$rsview[staff_type]</td>
				<td>$rsview[staff_dp]</td>
				<td>$rsview[staff_status]</td>
				<td>Edit | Delete</td>
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