<?php
include("header.php");
?>
</div>

  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
         Complaints
        </h3>
        <p>
         Check complaints
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Student ID</th>
			<th>Staff ID</th>
			<th>Reply Complaint ID</th>
			<th>Complaint Details</th>
			<th>Complaint Document</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sqlview = "SELECT * FROM  complaint_report";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				<td>$rsview[student_id]</td>
				<td>$rsview[staff_id]</td>
				<td>$rsview[reply_complaint_report_id]</td>
				<td>$rsview[complaint_detail]</td>
				<td>$rsview[complain_doc]</td>
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