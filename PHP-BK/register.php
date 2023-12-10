<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// TWORZENIE POŁĄCZENIA
$conn = mysqli_connect($servername, $username, $password, $dbname);

// SPRAWDZANIE CZY POŁĄCZENIE ZOSTAŁO UTWORZONE
if (!$conn) {
    die("Nieudane połączenie: " . mysqli_connect_error());
}
?>

<?php
    $login = $_POST['log'];
    $pas = $_POST['has']; 
    $repas = $_POST['has2'];

    if($pas == $repas){
        $hash = password_hash($pas,PASSWORD_DEFAULT);

        $query = "INSERT INTO users VALUES(NULL,'$login','$hash',DEFAULT, 0, 4)";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("location: index.php?reg=1");
        } 
    }

?>