<?php
session_start();
include 'connect.php';
$username = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];
//$_SESSION['razina'] = 0;
$registriranKorisnik = '';
//Provjera postoji li u bazi već korisnik s tim korisničkim imenom
$sql = "SELECT korisnicko_ime, lozinka, razina FROM users WHERE korisnicko_ime=?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $username, $lozinka, $razina);
}
mysqli_stmt_fetch($stmt);
if(password_verify($_POST['lozinka'], $lozinka)){
    if($razina == 1){
        $_SESSION['korisnicko_ime'] = $username;
        $_SESSION['razina'] = $razina;
        echo "<script>window.location = 'administracija.php'</script>";
    }
}
//echo "<script>window.location = 'administracija.php'</script>";


mysqli_close($dbc);
?>
