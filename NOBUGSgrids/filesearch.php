<?php

  include 'gridprincipal.php';
  include 'includes/dbh.inc.php';

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

    .h3block{
      margin-left: 20%;
    }



  </style>

  <body>
  <br><br><br>
  <div class="h3block">
    <h3 style="color: #111;">Pesquisar arquivo:</h3>
    <form class="pure-form" action="filesearch.php" method="post">
        <input type="text" name="entrada" class="pure-input-rounded" placeholder="Nome">
        <button type="submit" name="button" class="pure-button">Search</button>
    </form>
  </div>
  <!--<form class="signup-form" action="filesearch.php" method="post">
    <h3 style="color: #111;">Pesquisar arquivo:</h3>
    <input type="text" name="entrada" placeholder="Nome">
    <button type="submit" name="button">PESQUISAR</button>
  </form>-->
  <br><br><br><br>
  <hr>

  <?php

  if(isset($_POST['button'])){

    $pesquisa = mysqli_real_escape_string($conn,$_POST['entrada']);

    $db = "SELECT * FROM upload WHERE nome LIKE '%$pesquisa%';";
    $res = mysqli_query($conn, $db);
    echo '<div class="submit">';
    echo '<table width="400px" class="pure-table pure-table-bordered table-files">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Download</th>
              </tr>
            </thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_array($res)){
      $nama = explode('/',$row['path']);
      $nama2= end($nama);
      $nama3 = explode('/',$row['path']);
      $nama4= end($nama3);
      echo '<tr>';
      echo '<td><a href="includes/'.$row['path'].'" download='.$nama4.'>'.$row['nome'].'</a></td>';
      echo '<td style="width: 40px;"><a href="includes/'.$row['path'].'" download='.$nama4.'><i class="fa fa-download"></i></a></td>';
      echo '</tr>';
    }
    echo '</tbody>
          </table>
          </div>';

  } else{
      echo '<br><br><br>';
      echo '<div class="submit">';
      echo '<table width="450px" height="300px" class="pure-table pure-table-bordered table-files">
            <thead>
              <tr>
                <th>NOME</th>
                <th>DOWNLOAD</th>
              </tr>
            </thead>';
      echo '<tbody>';
      while($row = mysqli_fetch_array($result)){
        $nama3 = explode('/',$row['path']);
        $nama4= end($nama3);
        echo '<tr>';
        echo '<td><a href="includes/'.$row['path'].'" download='.$nama4.'>'.$row['nome'].'</a></td>';
        echo '<td style="width: 40px;"><a href="includes/'.$row['path'].'" download='.$nama4.'><i class="fa fa-download"></i></a></td>';
        echo '</tr>';
      }
      echo '</tbody>
            </table>
            </div>';
  }

  //echo '<a style="margin-left: 40px;" href="includes/'.$row['path'].'" download='.$nama4.'>- nome: '.$row['nome'].',&nbsp&nbsp&nbsp path: '.$row['path'].'</a><br>';
  //include 'includes/downloads.inc.php';
  //<li><a href="includes/'.$row['path'].'" download='.$nama2.'>-nome: '.$row['nome'].'&nbsp&nbsp&nbsp path:'.$row['path'].'</a></li>
?>
</body>
