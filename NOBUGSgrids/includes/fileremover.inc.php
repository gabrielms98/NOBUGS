<?php

  include 'dbh.inc.php';


  if(isset($_GET['id'])){

    $id = $_GET['id'];
    $db = "SELECT path FROM upload WHERE nome='$id'";
    $path = mysqli_query($conn, $db);

    while($row = mysqli_fetch_array($path)){
          $realpath = $row['path'];
    }

    $sql = "DELETE FROM upload WHERE nome='$id';";
    $result = mysqli_query($conn, $sql);


    if(unlink($realpath)){
      header("Location: ../fileremover2.php?success");
      exit();
    } else {
        header("Location: ../fileremover.php?fail");
        exit();
    }
  }
 ?>
