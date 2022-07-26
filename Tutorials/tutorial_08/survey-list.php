<?php
         include "db.php";
         $survey =mysqli_query($conn, "SELECT * FROM tutorial.survey");
    ?>
    
    <table class="table table-primary table-striped">
        <thead>
            <tr>
            <td>ID</td>
            <td>Studentname</td>
            <td>Major</td>
            <td>Year</td>
            <td>Language</td>
            <td>University</td>
            <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($survey as $sev):?>
               <tr>
               <td><?php echo $sev['id']; ?></td>
               <td><?php echo $sev['studentname']; ?></td>
               <td><?php echo $sev['major']; ?></td>
               <td><?php echo $sev['year']; ?></td>
               <td><?php echo $sev['language']; ?></td>
               <td><?php echo $sev['university']; ?></td>
               <td>
                   <a href="survey-edit.php? id=<?php echo $sev['id'] ;?>"class="btn btn-warning"><i class="bi bi-pen-fill"></i></a>
                   <a href="survey-delete.php? id=<?php echo $sev['id']; ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
               </td>
               </tr>
                <?php endforeach ?>
        </tbody>
    