<?php
    include "db.php";
    $id=$_GET['id'];

    $data=mysqli_query($conn, "SELECT * FROM survey WHERE id='$id'" );
    $survey=mysqli_fetch_assoc($data);

    if(isset($_POST['surveyUpdate'])){
        $studentname=$_POST['studentname'];
        $major=$_POST['major'];
        $year=$_POST['year'];
        $language=$_POST['language'];
        $university=$_POST['university'];
        $error=[];

        empty(trim($studentname))? $error[]="Name is required":'';
        empty(trim($major))? $error[]="Major required":'';
        empty(trim($year))? $error[]="Year required":'';
        empty(trim($language))? $error[]="Language required":'';
        empty(trim($university))? $error[]="university required":'';
        
        if(count($error)==0){
                $result=mysqli_query($conn,"UPDATE survey SET studentname='$studentname',major='$major',year='$year',language='$language',university='$university' WHERE id='$id'");
               }
               if($result){
                   header ("location: index.php");
               }else{
                   echo mysqli_connect_error();
               }
        }
    
?>
<?php include "layout/header.php" ?>

<form action="" method="post" enctype="multipart/form-data">

    <?php include "error.php" ?>
   
    <div>
        <label for="studentname">Studentname::</label>
        <input type="text" name="studentname" placeholder="Enter student name" value="<?php echo $survey['studentname']; ?>"class="form-control">
    </div>
    <div>
        <label for="major">Major::</label>
        <input type="text" name="major" value="<?php echo $survey['major'];?>" placeholder="Enter major" class="form-control">
    </div>
    <div>
        <label for="year">Year::</label>
        <input type="text" name="year" value="<?php echo $survey['year'];?>"placeholder="Enter year" class="form-control">
    </div>
    <div>
        <label for="language">Language::</label>
        <input type="text" name="language" value="<?php echo $survey['language'];?>"placeholder="Enter language" class="form-control">
    </div>
    <div>
        <label for="university">University::</label>
        <input type="text" name="university" value="<?php echo $survey['university'];?>"placeholder="Enter university" class="form-control">
    </div>
    <div>
        <button type="submit" name="surveyUpdate">Update</button>
    </div>
</form>
<?php include "layout/footer.php" ?>