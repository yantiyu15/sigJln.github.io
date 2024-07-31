<?php
include "../conn.php";
$Q = mysqli_query($conn,"SELECT * FROM jalan")or die(mysqli_error($conn));
if($Q){
 $posts = array();
      if(mysqli_num_rows($Q))
      {
             while($post = mysqli_fetch_assoc($Q)){
                     $posts[] = $post;
             }
      }  
      $data = json_encode(array('results'=>$posts));
      echo $data;                     
}

?>