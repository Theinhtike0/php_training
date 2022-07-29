<?php
    include "index.php";
    $id =$_GET['id'];

    $result=mysqli_query($conn,"DELETE FROM tutorial.survey WHERE id='$id'");
    if($result){
        header ("location:index.php");
    }else{
        echo mysqli_connect_error();
    }