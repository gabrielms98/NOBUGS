<?php

include_once 'dbh.inc.php';

if(isset($_GET['id'])){

  $id = $_GET['id'];

  $sql = "DELETE FROM usuarios WHERE usuario='$id';";
  $result = mysqli_query($conn, $sql);

  header("Location: ../listausuarios2.php?");

  //$resultCheck = mysqli_num_rows($result);
  /*if($resultCheck>0){
    header("Location: ../listausuarios.php?listausers=deletesuccess");
    exit();
  }else {
    header("Location: ../listausuarios.php?listausers=deletefail");
    exit();
  }*/
}


?>
