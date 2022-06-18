<?php
include 'connect.php';
define('UPLPATH', 'img/');
$kategorija = $_GET['kategorija'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>pwt-josip-zagar</title>
    <link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body>
    <header class="debeli">
        <h1 id="h1-naslov">Welt</h1>
        <nav>
            <h5 class="menu-item"><a href="index.php">Home</a></h5>
            <h5 class="menu-item">Beruf & Karriere</h5>
            <h5 class="menu-item">Food</h5>
            <h5 class="menu-item"><a href="administracija.php">Administracija</a></h5>
            <h5 class="menu-item"><a href="unos.html">Unos</a></h5>
            <h5 class="menu-item"><a href="registracija.html">Registracija</a></h5>
            <h5 class="menu-item"><a href="login.html">Login</a></h5>
        </nav>
    </header>
    
    <section class="tekst">
        <h2><?php$kategorija?></h2>
        <div class="artikli">
        <?php
        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='".$kategorija."'";
        $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($result)){
            echo '<article>';  
            echo '<img src="' . UPLPATH . $row['slika'] . '"';
            echo '<h3 class="title"><a href="clanak.php?id='.$row['id'].'">'.$row['naslov'].'</a></h3>';
            echo '<p>'.$row['sazetak'].'</p>';
            //echo '<a href="clanak.php?id='.$row['id'].'">';
            //echo $row['naslov'];
            // echo '</a></h4>';
            echo '</article>';
        }?>
        </div>
    </section>

    <footer class="debeli">
        <h1>Welt</h1>
    </footer>
  </body>
</html>