<?php
  include_once 'gridprincipal.php';
?>

<br><br>
<form class="pure-form pure-form-aligned" action="includes/signup.inc.php" method="post">
    <fieldset>

      <div class="pure-control-group">
          <input id="foo" type="text" name="nome" placeholder="Nome Completo">
          <span class="pure-form-message-inline">Campo obrigatório.</span>
      </div>

      <div class="pure-control-group">
            <input id="name" type="text" name="userid" placeholder="Username">
            <span class="pure-form-message-inline">Campo obrigatório.</span>
        </div>

        <div class="pure-control-group">
            <input id="email" type="email" name="email" placeholder="Email Address">
            <span class="pure-form-message-inline">Campo obrigatório.</span>
        </div>

        <div class="pure-control-group">
            <input id="password" type="password" name="senha" placeholder="Password">
            <span class="pure-form-message-inline">Campo obrigatório.</span>
        </div>
        <br>
        <input id="cb" name="adm" type="checkbox" style="float: left;"> Definir como moderador.
        <br>
        <div>
          <button type="submit" name="submit" class="pure-button pure-button-primary signup" id="signup-button">Submit</button>
        </div>
    </fieldset>
</form>
