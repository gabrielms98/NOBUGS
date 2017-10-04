<?php
  session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>GEDAI &ndash; System</title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layouts/style.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">


        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="css/layouts/side-menu.css">
        <!--<![endif]-->
</head>

<style>

  .submit{
    text-align: center;
    font-family: 'Roboto Slab'; serif;
    margin-top: 5%;
    margin-left: 30%;
  }

  .submit a{
    color: #111;
    padding: 5px 11px;
    border-style: 1px solid;
  }

  .submit a i{
    color: white;
    background-color: #5A827F;
    padding: 5px 11px;
    border-style: 2px solid;
  }

  .submit a{
    text-decoration: none;
    font-family: sans-serif;
    font-weight: bold;
  }

  .submit a:hover{
    border: 1px solid;
  }

  .submit a i, .fa-trash{
    background-color: red;
  }

</style>

<body>

<?php if(isset($_SESSION['u_id'])){ ?>
<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="index.php">GEDAI</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="index.php" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="filesearch.php" class="pure-menu-link">Pesquisar <i class="fa fa-search" aria-hidden="true"></i></a></li>
                <li class="pure-menu-item"><a href="upload.php" class="pure-menu-link">Upload</a></li>
                <li class="pure-menu-item" class="menu-item-divided pure-menu-selected">
                    <a href="editcad.php" class="pure-menu-link">Editar Cadastro</a>
                </li>

                <?php
                include 'includes/dbh.inc.php';

                $nome = $_SESSION['u_id'];
                $sql = "SELECT usuario, adm FROM usuarios WHERE usuario='$nome' AND adm='1'; ";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck>0){ ?>
                  <li class="pure-menu-item"><a href="signup.php" class="pure-menu-link">Sign up</a></li>
                  <li class="pure-menu-item"><a href="listausuarios.php" class="pure-menu-link">Usuarios</a></li>
                  <li class="pure-menu-item"><a href="fileremover.php" class="pure-menu-link">Excluir Arquivo</a></li>

                <?php } ?>
                <br><br>
                <form class="" action="includes/logout.inc.php" method="post">
                  <button class="pure-button pure-button-primary logout" type="submit" name="button" style="margin-left: 20%;">Log out</button>
                </form>
                <li><?php echo '<br>
                                <ul class="pure-menu-link">
                                  <li style="list-style: none;">'.$_SESSION['u_id'].'</li>
                                </ul>'; ?></li>
            </ul>
        </div>
    </div>
<?php } else{ ?>
  <div id="layout">
      <!-- Menu toggle -->
      <a href="#menu" id="menuLink" class="menu-link">
          <!-- Hamburger icon -->
          <span></span>
      </a>

      <div id="menu">
          <div class="pure-menu">
              <a class="pure-menu-heading" href="index.php">GENDAI</a>
          </div>
      </div>
<?php } ?>

    <script src="js/ui.js"></script>

    </body>
    </html>
