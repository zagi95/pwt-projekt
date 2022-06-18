<?php
session_start();
include 'connect.php';
define('UPLPATH', 'img/');
//include 'login.php';
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
    <?php
    if(isset($_SESSION['razina'])){
        unset($_SESSION['razina']);
    $query = "SELECT * FROM vijesti";
    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result)) {
    
     echo '<form enctype="multipart/form-data" action="" method="POST">
     <div class="form-item">
     <label for="title">Naslov vjesti:</label>
     <div class="form-field">
     <input type="text" name="title" class="form-field-textual"
    value="'.$row['naslov'].'">
     </div>
     </div>
     <div class="form-item">
     <label for="about">Kratki sadržaj vijesti (do 50
    znakova):</label>
     <div class="form-field">
     <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
     </div>
     </div>
     <div class="form-item">
     <label for="content">Sadržaj vijesti:</label>
     <div class="form-field">
     <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
     </div>
     </div>
     <div class="form-item">
     <label for="pphoto">Slika:</label>
     <div class="form-field">
    14
     <input type="file" class="input-text" id="pphoto"
    value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH .
    $row['slika'] . '" width=100px>
    // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
     </div>
     </div>
     <div class="form-item">
     <label for="category">Kategorija vijesti:</label>
     <div class="form-field">
     <select name="category" id="" class="form-field-textual"
    value="'.$row['kategorija'].'">
     <option value="crna_kronika">Crna kronika</option>
     <option value="bijela_tehnika">Bijela tehnika</option>
     <option value="svijet">Svijet</option>
    <option value="cvijet">Cvijet</option>
     </select>
     </div>
     </div>
     <div class="form-item">
     <label>Spremiti u arhivu:
     <div class="form-field">';
     if($row['arhiva'] == 0) {
     echo '<input type="checkbox" name="archive" id="archive"/>
    Arhiviraj?';
     } else {
     echo '<input type="checkbox" name="archive" id="archive"
    checked/> Arhiviraj?';
     }
     echo '</div>
     </label>
     </div>
     </div>
     <div class="form-item">
     <input type="hidden" name="id" class="form-field-textual"
    value="'.$row['id'].'">
     <button type="reset" value="Poništi">Poništi</button>
     <button type="submit" name="update" value="Prihvati">
    Izmjeni</button>
     <button type="submit" name="delete" value="Izbriši">
    Izbriši</button>
     </div>
     </form><br><br>';
    }

    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query = "DELETE FROM vijesti WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
    }
    if(isset($_POST['update'])){
        $img = $_FILES['img']['name'];
        $naslov=$_POST['naslov'];
        $sazetak=$_POST['sazetak'];
        $tekst=$_POST['tekst'];
        $kategorija=$_POST['kategorija'];
        if(isset($_POST['arhiva'])){
            $arhiva=1;
        }else{
            $arhiva=0;
        }
        $target_dir = 'img/'.$img;
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir);
        $id=$_POST['id'];
        $query = "UPDATE vijesti SET naslov='$title', sazetak='$sazetak', tekst='$tekst',
        slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
    }
    }
    ?>
    <footer class="debeli">
        <h1>Welt</h1>
    </footer>
  </body>
</html>