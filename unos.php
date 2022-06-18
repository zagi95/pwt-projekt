<?php
include 'connect.php';
if(isset($_FILES['slika']['name'])){
    $img = $_FILES['slika']['name'];
}
if(isset($_POST['naslov'])){
    $naslov=$_POST['naslov'];
}
if(isset($_POST['sazetak'])){
    $sazetak=$_POST['sazetak'];
}
if(isset($_POST['tekst'])){
    $tekst=$_POST['tekst'];
}
if(isset($_POST['kategorija'])){
    $kategorija=$_POST['kategorija'];
}
if(isset($_POST['arhiva'])){
    $arhiva=1;
}else{
    $arhiva=0;
}
$date=date('Y.m.d.');

$target_dir = 'img/'.$img;
move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
$query = "INSERT INTO Vijesti (datum, naslov, sazetak, tekst, slika, kategorija,
arhiva ) VALUES ('$date', '$naslov', '$sazetak', '$tekst', '$img',
'$kategorija', '$arhiva')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);
$arhiva=0;
echo "Uneseno";
?>