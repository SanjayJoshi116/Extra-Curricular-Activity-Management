<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<body>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php //include("viewevent.php"); ?>
    <!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
  <thead>
    <tr>
      <th width="100px">Event Title</th>
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sqlview = "SELECT event.*,department.department,event_type.event_type FROM  event LEFT JOIN department ON event.department_id=department.department_id LEFT JOIN event_type ON event.event_type_id=event_type.event_type_id ORDER BY updated_event_date DESC";
    $qsqlview = mysqli_query($con,$sqlview);
    while($rsview = mysqli_fetch_array($qsqlview))
    {

      if($rsview[updated_event_status]=="edited")
      {
        echo "<tr>
        <td>$rsview[event_title]</td>
        <td>Event has been updated <a href='event_more_det.php?event_id=$rsview[0]' class='btn btn-warning' target='_blank'>View More</a>";
        $date1 = date("d-m-Y",strtotime($rsview['updated_event_date'])); 
        $date2 = strtotime(date('d-m-Y',strtotime('now'))); 
  
        // Formulate the Difference between two dates
        $diff = abs($date2 - $date1);
        $years = floor($diff / (365*60*60*24)); 
        $months = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24)); 
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        echo "     " .$days ."  days ago"; 
      }
    }
      ?>
    </tbody>
</table>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>