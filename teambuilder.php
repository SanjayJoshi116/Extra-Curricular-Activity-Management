<?php
include("header.php");
if(isset($_POST['submit']))
{
	$arr_student_rollno = $_POST['student_rollno'];
	$arr_student_id = $_POST['student_id'];
	$team = "Team Leader";
	for($i=0;$i<count($arr_student_rollno);$i++)
	{
		$sql ="INSERT INTO event_participation(event_id,student_id,event_participation_type,team,apply_dt_tim,event_participation_status) VALUES('$_GET[event_id]','$arr_student_id[$i]','Team','$team','$dttim','Entered')";
		mysqli_query($con,$sql);
		if($i == 0)
		{
		$team  = mysqli_insert_id($con);
		}
	}
	echo "<script>alert('Team Added successfully');</script>";
	echo "<script>window.location='upcoming-event.php';</script>";
}
?>
</div>
<style>
ul{
  margin: 0px;
  padding: 0px;
  list-style: none;
}

ul.dropdown{ 
  position: relative; 
  width: 100%; 
}

ul.dropdown li{ 
  font-weight: bold; 
  float: left; 
  width: 180px; 
  position: relative;
  background: #ecf0f1;
}

ul.dropdown a:hover{ 
  color: #000; 
}

ul.dropdown li a { 
  display: block; 
  padding: 20px 8px;
  color: #34495e; 
  position: relative; 
  z-index: 2000; 
  text-align: center;
  text-decoration: none;
  font-weight: 300;
}

ul.dropdown li a:hover,
ul.dropdown li a.hover{ 
  background: #3498db;
  position: relative;
  color: #fff;
}


ul.dropdown ul{ 
 display: none;
 position: absolute; 
  top: 0; 
  left: 0; 
  width: 180px; 
  z-index: 1000;
}

ul.dropdown ul li { 
  font-weight: normal; 
  background: #f6f6f6; 
  color: #000; 
  border-bottom: 1px solid #ccc; 
}

ul.dropdown ul li a{ 
  display: block; 
  color: #34495e !important;
  background: #eee !important;
} 

ul.dropdown ul li a:hover{
  display: block; 
  background: #3498db !important;
  color: #fff !important;
} 

.drop > a{
  position: relative;
}

.drop > a:after{
  content:"";
  position: absolute;
  right: 10px;
  top: 40%;
  border-left: 5px solid transparent;
  border-top: 5px solid #333;
  border-right: 5px solid transparent;
  z-index: 999;
}

.drop > a:hover:after{
  content:"";
   border-left: 5px solid transparent;
  border-top: 5px solid #fff;
  border-right: 5px solid transparent;
}
</style>
<form method="post" action="">
  <!-- event section -->
  <section class="event_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h3>
          Team Builder
        </h3>
        <p>
          Build Team for Following Event:
        </p>
      </div>
      <?php
	    $sqlview = "SELECT * FROM  event where event_date_time > '$dttim' ";
        if($_GET['eventtype'] == "Single")
        {
          $sqlview = $sqlview . " AND  event.event_participation_type='Single' ";
        }
        if($_GET['eventtype'] == "Team")
        {
          $sqlview = $sqlview . " AN D  event.event_participation_type='Team' ";
        }
        $sqlview = $sqlview . " AND event.event_id='$_GET[event_id]' ";
        $sqlview = $sqlview. " ORDER BY event_date_time DESC";
		    $qsqlview = mysqli_query($con,$sqlview);
	    	$rsview = mysqli_fetch_array($qsqlview);
          ?>
      <div class="event_container">
        <div class="box">
          <div class="img-box">
           <h5>
		  <?php
      $imge=$rsview['event_banner'];
      echo '<img src="imgbanner/' .$imge .'" width="150" height="150">';
      ?>
		   </h5>
          </div>
          <div class="detail-box">
            <h4>
            <?php echo $rsview['event_title'];?>
            </h4>
            <h6>
              <?php echo $rsview['event_venue'];?>
            </h6>
          </div>
          <div class="date-box">
            <center><h3>
            <?php echo date("d-M-Y",strtotime($rsview['event_date_time']));?><br>
            <?php echo date("h:i A",strtotime($rsview['event_date_time']));?>
            </h3></center>
            (<?php echo $rsview['event_participation_type'];?> Event)
          </div>
        </div>
    </div>
    <div class="container">

      <div class="event_container">
          <div class="box">
              <div class="row">
                  <div class="col-md-12">
                    <center><b style='color: red;'>Enter Student Roll Number and Token key to Add Team members</b></center>
                    <table class="table table-bordered">
                        <tr>
                          <th>SL No.</th>
                          <th>Roll Number</th>
                          <th>Token Key</th>
                          <th>Verify</th>
                          <th>Student Detail</th>
                        </tr>
                        <?php
                        for($i=0;$i<$rsview['no_of_participants'];$i++)
                        {
							if($i == 0)
							{
						?>
                        <tr>
                          <td style="width: 100px;"><?php echo $i+1; ?></td>
                          <td><input type="text" name="student_rollno[]" id="student_rollno<?php echo $i; ?>" size="15" class="form-control" value="<?php echo $rsstudentprofile['student_rollno']; ?>" readonly /></td>
                          <td>
						  <input type="text"  size="15" class="form-control" value="Team Leader" readonly />
						  </td>
                          <td>
                            <input type="button" name="validate" id="validate" onclick="alert('Team Leader Verification not required..')" value="Verify" class="btn btn-secondary" >
                          </td>
                          <td>
                            <div id="divstudent<?php echo $i; ?>">
							<i class="btn btn-success fa fa-hand-o-right fa-lg" aria-hidden="true"> Verified</i></div>
                            <input type="hidden" name="student_id[]" id="student_id<?php echo $i; ?>" value="<?php echo $rsstudentprofile['student_id']; ?>" class="form-control" />
                          </td>
                        </tr>
						<?php
							}
							else
							{
                        ?>
                        <tr>
                          <td style="width: 100px;"><?php echo $i+1; ?></td>
                          <td><input type="text" name="student_rollno[]" id="student_rollno<?php echo $i; ?>" size="15" class="form-control" /></td>
                          <td><input type="text" name="token_key[]" id="token_key<?php echo $i; ?>" size="15"  class="form-control" /></td>
                          <td>
                            <input type="button" name="validate" id="validate" onclick="fun_validate_student(<?php echo "student_rollno" . $i; ?>.value,<?php echo "token_key" . $i; ?>.value,<?php echo $i; ?>)" value="Verify" class="btn btn-info" >
                          </td>
                          <td>
                            <div id="divstudent<?php echo $i; ?>"></div>
                            <input type="hidden" name="student_id[]" id="student_id<?php echo $i; ?>" value="0" class="form-control" />
                          </td>
                        </tr>
                        <?php
							}
                        }
                        ?>
                    </table>
					<hr>
					<center><input type="submit" name="submit" id="submit" value="Click here to Submit" class="btn btn-info btn-lg" ></center>
                  </div>
              </div>
          </div>
        </div>
  </section>
  <!-- end event section -->
</form>
<?php
include("footer.php");
?>
<script>
function fun_validate_student(student_rollno,token_key,ivalue)
{
    $.post("js_validate_student.php",
    {
      student_rollno: student_rollno,
      token_key: token_key
    },
    function(data){
      if(data == 0)
	  {
		  alert("Not valid...");
		  $('#divstudent'+ivalue).html("<i class='btn btn-danger fa fa fa-thumbs-down fa-lg' aria-hidden='true'> Failed to Verify</i>");
		  $('#student_id'+ivalue).val(0);
	  }
	  else
	  {
		  $('#divstudent'+ivalue).html("<i class='btn btn-success fa fa-hand-o-right fa-lg' aria-hidden='true'> Verified</i>");
		  $('#student_id'+ivalue).val(data);
	  }
    });
}
</script>