<?php

if(isset($_POST['submit'])) {

    include_once 'dbh.inc.php';

    $nome = mysqli_real_escape_string($conn,$_POST['nome']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $userid = mysqli_real_escape_string($conn,$_POST['userid']);
    $senha = mysqli_real_escape_string($conn,$_POST['senha']);
    $adm = mysqli_real_escape_string($conn,$_POST['adm']);

    //Olhando erros...
    //Checar por campos vazios
    if(empty($nome) || empty($email) || empty($userid) || empty($senha)){
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //Olha se os dados digitados sao validos
        if(!preg_match("/[a-zA-Z]*$/", $nome)){
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            //Checar se o email é valido
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=email");
                exit();
            } else {
                $sql = "SELECT * FROM usuarios WHERE usuario= '$userid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0){
                  header("Location: ../signup.php?signup=usertaken");
                  exit();
                } else {
                    //hashing a senha
                    $hashedPwd = password_hash($senha, PASSWORD_DEFAULT);
                    //colocando o usuario no db
                    if($adm)
                      $sql = "INSERT INTO usuarios (nome, usuario, email, senha, adm) VALUES ('$nome', '$userid', '$email', '$hashedPwd', '1')";
                    else $sql = "INSERT INTO usuarios (nome, usuario, email, senha, adm) VALUES ('$nome', '$userid', '$email', '$hashedPwd', '0')";
                    mysqli_query($conn, $sql);
                    if(mysqli_affected_rows($conn)>0)
                      header("Location: ../signup.php?signup=sucesso");
                    else
                      header("Location: ../signup.php?signup=falha");
                      exit();

                      }
                  }
            }
        }

} else{
    header("Location: ../signup.php");
    exit();
}
