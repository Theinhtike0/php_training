<?php
    include "db.php";
        if(isset($_POST['surveyCreate'])){
       $studentname=$_POST['studentname'];
       $major=$_POST['major'];
       $year=$_POST['year'];
       $language=$_POST['language'];
       $university=$_POST['university'];
       $studentlist=$_POST['studentlist'];
       $error=[];

       empty(trim($studentname))? $error[]="Name is required":'';
       empty(trim($major))? $error[]="Major required":'';
       empty(trim($year))? $error[]="Year required":'';
       empty(trim($language))? $error[]="Language required":'';
       empty(trim($university))? $error[]="university required":'';
       empty(trim($studentlist))? $error[]="studentlist required":'';

       if(count($error)==0){
           $result=mysqli_query($conn,"INSERT INTO tutorial.survey(studentname,major,year,language,university,studentlist)VALUES('$studentname','$major','$year','$language','$university','$studentlist')");
           if($result){
               header("location: index.php");
           }else{
               echo mysqli_connect_error();
           }
       }




    }
?>





<h1>SURVEY CREATE</h1>
<?php include "layout/header.php" ?>
<form action="" method="post" enctype="multipart/form-data">

<?php include "error.php" ?>

    <div>
        <label for="studentname">Studentname::</label>
        <input type="text" name="studentname" placeholder="Enter student name" class="form-control">
    </div>
    <div>
        <label for="major">Major::</label>
        <input type="text" name="major" placeholder="Enter major" class="form-control">
    </div>
    <div>
        <label for="year">Year::</label>
        <input type="text" name="year" placeholder="Enter year" class="form-control">
    </div>
    <div>
        <label for="language">Language::</label>
        <input type="text" name="language" placeholder="Enter language" class="form-control">
    </div>
    <div>
        <label for="university">University::</label>
        <input type="text" name="university" placeholder="Enter university" class="form-control">
    </div>
    <div>
        <label for="studentlist">Studentlist::</label>
        <input type="text" name="studentlist" placeholder="Enter studentlist" class="form-control">
    </div>
    <div>
        <button type="submit" name="surveyCreate" class="mt-3 rounded">Create New survey</button>
    </div>
</form>
<?php include "layout/footer.php" ?>