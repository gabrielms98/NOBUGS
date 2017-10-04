<?php

session_start();

if(isset($_POST['submit'])){

  include_once 'dbh.inc.php';

  $nome = mysqli_real_escape_string($conn,$_POST['nome']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $userid = mysqli_real_escape_string($conn,$_POST['userid']);
  $senha = mysqli_real_escape_string($conn,$_POST['senha']);
  $senha2 = mysqli_real_escape_string($conn,$_POST['senha2']);

  $username = $_SESSION['u_id'];
  $emailantigo = $_SESSION['u_email'];
  $nomeantigo = $_SESSION['u_nome'];
  $senhaantiga = $_SESSION['senha'];

  if(!empty($nome)){
    $sql = "UPDATE usuarios SET nome = '$nome' WHERE nome='$nomeantigo'; ";
    $result = mysqli_query($conn, $sql);
    header("Location: ../editcad.php?sucesso-nome");
  }
  if(!empty($email)){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: ../editcad.php?emailinvalido");
    }else {
      $sql = "UPDATE usuarios SET email = '$email' WHERE email='$emailantigo'; ";
      $result = mysqli_query($conn, $sql);
      header("Location: ../editcad.php?sucesso-email");
    }
  }
  if(!empty($senha)){
    if($senha2===$senha){
      $hashedPwd = password_hash($senha, PASSWORD_DEFAULT);
      $sql = "UPDATE usuarios SET senha = '$hashedPwd' WHERE senha='$senhaantiga'; ";
      $result = mysqli_query($conn, $sql);
      header("Location: ../editcad.php?sucesso-senha");
    } else{
      header("Location: ../editcad.php?senhaincorreta");
    }
  }
  if(!empty($userid)){
    $sql = "UPDATE usuarios SET usuario = '$userid' WHERE usuario='$username'; ";
    $result = mysqli_query($conn, $sql);
    $_SESSION['u_id'] = $userid;
    header("Location: ../editcad.php?sucesso-username");
  }
}


 ?>
