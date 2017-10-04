<?php
  include_once 'gridprincipal.php';
?>
<br><br>
<form class="pure-form pure-form-aligned" action="includes/fileupload.inc.php" enctype="multipart/form-data" method="POST">
    <fieldset>
        <div class="pure-control-group">
          <input type="file" name="file">
        </div>

        <div class="pure-control-group">
            <input class="inputs" type="text" name="autor" placeholder="Autor">
        </div>

        <div class="pure-control-group">
            <input class="inputs" type="text" name="pchave" placeholder="Palavra-chave">
        </div>

        <div class="pure-control-group">
            <input class="inputs" type="text" name="area" placeholder="Local de Aplicação">
        </div>
        <div class="pure-control-group">
          <textarea class="inputs" name="resumo" rows="8" cols="54"  placeholder="Resumo..."></textarea>
        </div>

        <div class="pure-controls">
            <button type="submit" name="button" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
</form>
<!--<section class="main-container">
<div class="main-wrapper">
  <h2>Envio de arquivos</h2>
	<form class="signup-form" action="includes/fileupload.inc.php" enctype="multipart/form-data" method="POST">
			<input type="file" name="file">
			<input type="text" name="titulo" placeholder="Título">
      <input type="text" name="autor" placeholder="Autor">
      <input type="text" name="pchave" placeholder="Palavras-chave">
      <input type="text" name="area" placeholder="Local de aplicação">
      <textarea id="textarea" name="resumo" rows="8" cols="54"  placeholder="Resumo..."></textarea>
      <button type="submit" name="submit">ENVIAR</button>
	</form>
</div>
</section> -->
