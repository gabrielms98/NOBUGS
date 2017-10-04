<?php
if(isset($_POST['button'])){
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit();
}
