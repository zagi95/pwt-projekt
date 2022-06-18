<?php
include 'connect.php';
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$username = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = 0;
$registriranKorisnik = '';
//Provjera postoji li u bazi već korisnik s tim korisničkim imenom
$sql = "SELECT korisnicko_ime FROM users WHERE korisnicko_ime = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
if(mysqli_stmt_num_rows($stmt) > 0){
 $msg='Korisničko ime već postoji!';
}else{
 // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection
 $sql = "INSERT INTO users (ime, prezime,korisnicko_ime, lozinka,
razina)VALUES (?, ?, ?, ?, ?)";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username,
$hashed_password, $razina);
 mysqli_stmt_execute($stmt);
 $registriranKorisnik = true;
 }
}

if($registriranKorisnik == true) {
    echo '<p>Korisnik je uspješno registriran!</p>';
} else {
    echo '<p>Greska</p>';
}

mysqli_close($dbc);
?>
