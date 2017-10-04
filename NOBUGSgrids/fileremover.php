<?php
  include 'includes/dbh.inc.php';
  include_once 'admcheck.inc.php';
  include 'gridprincipal.php';

  $sql = "SELECT nome, path FROM upload ORDER BY nome;";
  $result = mysqli_query($conn, $sql);

  ?>

  <style>
    th{
      background-color: #4CAF50;
      color: white;
      font-family: sans-serif;
      font-weight: bold;
      text-align: center;
    }


  </style>

  <br><br><br>
  <form class="pure-form" action="fileremover.php" method="post">
    <input type="text" name="entrada" class="pure-input-rounded">
    <button type="submit" name="submit" class="pure-button">Search</button>
  </form>

  <?php

  if(isset($_POST['submit'])){

    $entrada = mysqli_real_escape_string($conn,$_POST['entrada']);

    $db = "SELECT nome FROM upload WHERE nome LIKE '%$entrada%';";
    $res = mysqli_query($conn, $db);

    echo '<br><br><br>';
    echo '<div class="submit">';
    echo '<form action="includes/fileremover.inc.php" method="post">';
    echo '<table width="400px" class="pure-table pure-table-bordered">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Excluir</th>
              </tr>
            </thead>
            <tbody>';
    while($row = mysqli_fetch_array($res)){
      $id = $row['nome'];
      echo '<tr>';
      echo '<td><a href="includes/fileremover.inc.php?id='.$id.'">'.$row['nome'].'</a></td>';
      echo '<td><input name="enter" type="hidden" value="'.$row['nome'].'">
                <a href="includes/fileremover.inc.php?id='.$id.'"><i class="fa fa-trash"></i></a>
                </td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</form>';
    echo '</div>';

  } else {
    echo '<div class="submit">';
    echo '<form action="includes/fileremover.inc.php" method="post">';
    echo '<br><br><br>';
    echo '<table width="400px" class="pure-table pure-table-bordered">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Excluir</th>
              </tr>
            </thead>
            <tbody>';
    while($row = mysqli_fetch_array($result)){
      $id = $row['nome'];
      echo '<tr>';
      echo '<td><a href="includes/fileremover.inc.php?id='.$id.'">'.$row['nome'].'</a></td>';
      echo '<td><a href="includes/fileremover.inc.php?id='.$id.'"><i class="fa fa-trash"></i></a></td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</form>';
    echo '<div>';

  }

?>


<!--<h3 style="margin-left: 40px;" name='.$row['nome'].'>- nome: '.$row['nome'].',&nbsp&nbsp&nbsp path: '.$row['path'].'</h3>
<button type="submit" name="button" class="pure-button pure-button-primary" id="delete-button">
  <i class="fa fa-trash"></i>-->
