<?php
$naslov;
$sazetak;
$tekst;
$kategorija;
$img;
$arhiva;


if(isset($_POST['naslov'])){
    $naslov = $_POST['naslov'];
}
if(isset($_POST['sazetak'])){
    $sazetak = $_POST['sazetak'];
}
if(isset($_POST['tekst'])){
    $tekst = $_POST['tekst'];
}
if(isset($_POST['kategorija'])){
    $kategorija = $_POST['kategorija'];
}
if(isset($_POST['img'])){
    $img = $_POST['img'];
}
if(isset($_POST['da'])){
    $arhiva = 0;
}else{
    $arhiva = 1;
}

?>
<section role="main">
    <div class="row">
        <p class="category"><?php echo $kategorija; ?></p>
        <h1 class="title"><?php echo $naslov; ?></h1>
        <p>AUTOR:</p>
        <p>OBJAVLJENO:</p>
    </div>
    <section class="slika"><?php echo "<img src='img/$img'";?></section>
    <section class="about">
        <p><?php echo $sazetak;?></p>
    </section>
    <section class="sadrzaj">
        <p><?php echo $tekst;?></p>
    </section>
</section>