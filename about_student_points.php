<?php
include("header.php");
?>
</div>

  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="side_img">
      <img src="images/side-img.png" alt="" />
    </div>
    <div class="container">
      <div class="row">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                About Student Points
              </h3>
               <h2> What is Student Points?</h2>
                 Student Points is a unique reward program by SDM COllege, where students get rewarded for winning and participating in different events. Student points is distributed both for individual and team events. However, the best student title will be awarded to the student according to the student points he or she collected.
<br>
<br>
<h2> How to earn Student Points?</h2>
In order to earn Student points, all you have to do is to register to the different events which is organised by different departments. After registering, you need to participate in the events you have registered.<br><br>
<b><h3>Note :</h3></b>
  <p>*Student points will be distributed for every participation of student in the event.</p>
  <p>*Student points will be distributed after the result have been announced          </p>
  <style>
.button-3 {
  appearance: none;
  background-color: #2ea44f;
  border: 5px solid rgba(27, 31, 35, .15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
  font-size: 25px;
  font-weight: 600;
  line-height: 20px;
  padding: 20px 50px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
  width:100%;
    margin-left:275%;
    margin-right:25%;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
  box-shadow: none;
  outline: none;
}

.button-3:hover {
  background-color: #2c974b;
}

.button-3:focus {
  box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
  outline: none;
}

.button-3:disabled {
  background-color: #94d3a2;
  border-color: rgba(27, 31, 35, .1);
  color: rgba(255, 255, 255, .8);
  cursor: default;
}

.button-3:active {
  background-color: #298e46;
  box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
}
</style>
<br><br>
<?php
        $sqlpoint= "SELECT ifnull(sum(point),0) FROM event_result_status WHERE student_id='$_SESSION[student_id]' ";
        $qsqlpoint = mysqli_query($con,$sqlpoint);
        $rspoint = mysqli_fetch_array($qsqlpoint);
 ?>
 <div class="d-flex justify-content-center">
<button class="button-3" role="button">My Student Points <h1 style=" color: yellow;"><?php echo $rspoint[0]; ?> </h1></button>
  </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- end about section -->
<?php
include("footer.php");
?>