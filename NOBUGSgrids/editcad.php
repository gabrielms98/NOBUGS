<?php
  include_once 'gridprincipal.php';
  include_once 'includes/dbh.inc.php';
?>

<div>
  <h2>Escreva apenas no campo que deseja ser alterado</h2>
</div>

<form class="pure-form pure-form-aligned" action="includes/editcad.inc.php" method="post">
    <fieldset>

      <div class="pure-control-group">
          <label for="foo">Nome Completo </label>
          <input id="foo" type="text" name="nome" placeholder="Nome Completo">
      </div>

      <div class="pure-control-group">
            <label for="name">Username</label>
            <input id="name" type="text" name="userid" placeholder="Username">
        </div>

        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" placeholder="Email Address">
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="senha" placeholder="Password">
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="senha2" placeholder="Digite a senha novemente">
        </div>

        <div class="pure-controls">
            <button type="submit" name="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
</form>

<br><br><br>

<div class="pure-form pure-form-aligned">
  <br>
  <h2 id="nome">Dados atuais:</h2>
  <?php
    $username = $_SESSION['u_id'];
    $sql = "SELECT * FROM usuarios WHERE usuario='$username';";
    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result)>0){
        echo '<div>';
          echo '<table class="pure-table pure-table-bordered">
                  <thead>
                    <tr>
                      <th><h2>nome</h2></th>
                      <th><h2>email</h2></th>
                      <th><h2>usuário</h2></th>
                    </tr>
                  </thead>';
        while($row = mysqli_fetch_array($result)){
            echo '<tbody>
                    <tr>
                      <td>'.$row['nome'].'</td>
                      <td>'.$row['email'].'</td>
                      <td>'.$row['usuario'].'</td>
                    </tr>
                  </tbody>';
            }
          echo '</table>';
        echo '</div>';
          mysqli_free_result($result);
      } else{
          echo "No records matching your query were found.";
        }
    }

  ?>
</div>
