<?php

session_start();

if(isset($_POST['submit'])){

  include 'dbh.inc.php';

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $pwd = mysqli_real_escape_string($conn, $_POST['senha']);

  //Checando erros primeiro
  //Checar se as entradas estão vazias...
  if(empty($id) || empty($pwd)){
    header("Location: ../index.php?login=empty");
    exit();
  } else{
      $sql = "SELECT * FROM usuarios WHERE usuario='$id' OR email='$id'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1){
        header("Location: ../index.php?login=header");
        exit();
      } else {
          if($row = mysqli_fetch_assoc($result)){
            //dehashing a senha
            $hashedPwdCheck = password_verify($pwd, $row['senha']);
            if($hashedPwdCheck == false){
              header("Location: ../index.php?login=senha");
              exit();
            } elseif ($hashedPwdCheck == true){
                //log in o usuario
                $_SESSION['u_id'] = $row['usuario'];
                $_SESSION['u_nome'] = $row['nome'];
                $_SESSION['u_email'] = $row['email'];
                $_SESSION['senha'] = $row['senha'];
                header("Location: ../index.php?login=success");
                exit();
              }
          }
        }
    }

} else {
  header("Location: ../index.php?login=error");
  exit();
}
