<div class="form-group date-time-picker label-floating is-empty">
 <label class="control-label">Birthday</label>
 <input name="datetimepicker">
</div>

<?php
 $dob = $_GET['datetimepicker'];
 $dob = explode("/", $dob);
 $agv = (date("md", date("U", mktime(0, 0, 0, $dob[0], $dob[1], $dob[2]))) > 
 date("md") ? ((date("Y") - $dob[2]) -1) : (date("Y") - $dob[2]));

 $age = mysqli_real_escape_string($conn, $agv);
?>