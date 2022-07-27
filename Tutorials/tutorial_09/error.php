<?php   if(isset($error)):?>
    <?php foreach($error as $err):?>
    
      <li style="color: red;">  <?php echo $err; ?> </li> 
     
     <?php endforeach ?>
   <?php endif ?>