<?php  


include 'config.php';
$id='';


   

   if(isset($_GET['id'])){
         $id=$_GET['id'];
         $query="Delete From register where id='$id'";
          mysqli_query($con,$query);

  header("Location: admindisplay.php");
     }
?>