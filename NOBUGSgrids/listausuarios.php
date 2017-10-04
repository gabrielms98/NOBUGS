<?php
 include_once 'gridprincipal.php';
 include_once 'includes/dbh.inc.php';
 include 'admcheck.inc.php';

?>

<style>
  th{
    background-color: #4CAF50;
    color: white;
    font-family: sans-serif;
    font-weight: bold;
    text-align: center;
  }

  .titulo{
    list-style: none;
    font-size: 20px;
    color: #111;
    font-weight: bold;
    text-decoration: none;
  }
</style>

<section class="main-container">
  <br><br><br>
  <div class="listauser">
    <ul class="titulo">
      <li><h2>Lista de usuários cadastrados: </h2></li>
    </ul>
    <br><br>
    <?php

      $sql = "SELECT * FROM usuarios ORDER BY adm='0', nome;";
      $result = mysqli_query($conn, $sql);
      echo '<form action="listausuarios.php" method="post">';
        echo '<div class="submit">';
        echo ' <table class="pure-table pure-table-bordered table-files">';
          echo '<tr style="border-bottom: 1px solid #F6F6F6;">
                  <th>Usuário</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>MOD</th>
                  <th>DELETE</th>
                </tr>';
      while($row = mysqli_fetch_array($result)){
          $id = $row['usuario'];
          echo '<tr>
                  <td><font size="2" face="Lucida Sans Unicode" color="#666666">'.$row['usuario'].'</td>
                  <td><font size="2" face="Lucida Sans Unicode" color="#666666">'.$row['nome'].'</td>
                  <td><font size="2" face="Lucida Sans Unicode" color="#666666">'.$row['email'].'</td>
                  <td><font size="2" face="Lucida Sans Unicode" color="#666666">'.$row['adm'].'</td>
                  <td><a href="includes/delete.inc.php?id='.$id.'"><i class="fa fa-trash"></i></a></td>
                  </tr>';
      }
        echo '</table>';
      echo '</div>
            </form>';

    ?>
  </div>
</section>
