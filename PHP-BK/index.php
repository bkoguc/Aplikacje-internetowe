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
    echo "Połączenie udane!";
?>

<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UFO Anomalies</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <header>
        <h1>👽 UFO Anomalies 🛸</h1>
        <br>
        <nav>
            <a href="#">Strona główna</a>
            <a href="#">Galeria</a>
            <a href="#">O nas</a>
            <a href="#">Kontakt</a>
        </nav>
    </header>

    <section id="linia">
        <hr>
    </section>

    <main id="main-wrapper">
        <article>

            <?php

            $query = "SELECT * FROM articles";

            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <section>
                        <h2>{$row['title']}</h2>
                        <p>{$row['content']}</p>
                    </section>";
                }

            }
            else{
                echo "Brak wyników";
            }
            ?>

        </article>

        <aside>
            

            <?php
                if(isset($_GET["reg"])){
                    echo "
                    <form action='login.php' method='POST'>
                        <h2>Logowanie</h2>
                        <label for='login'>Login</label>
                        <input type=text' placeholder='Nazwa użytkownika' id='login' name='log'>
                        <label for='haslo'>Podaj hasło</label>
                        <input type='password' placeholder='Hasło' id='haslo' name='has'>
                        <button>Zaloguj się</button>  
                    k;hj;
                    ";
                
                } else if($_SESSION['user_name']){
                    echo "
                    <form action=''>
                        <h2>Dołącz do newslettera!</h2>
                        <input type='email' id='mail' placeholder='  Wprowadź adres email'>


                        <label for='plec' id='c1'>Wybierz swoją płeć</label>
                        <section id='plec'>
                            <input type='radio' name='rad'>
                            <p>Mężczyzna</p>
                            <input type='radio' name='rad'>
                            <p>Kobieta</p>
                            <input type='radio' name='rad'>
                            <p>Inne</p>
                        </section>
                        
                        <section id='checkbot'>
                            <input type='checkbox' id='robot'>
                            <label for='robot'>Nie jestem robotem</label>
                        </section>            
            
                        <button id='wyslij'>Wyślij zapytanie</button>
                        
                    </form>
                    ";
                } else{
                    echo "
                    <form action='register.php' method='POST'>
                        <h2>Rejestracja</h2>
                        <label for='login'>Login</label>
                        <input type=text' placeholder='Nazwa użytkownika' id='login' name='log'>
                        <label for='haslo'>Podaj hasło</label>
                        <input type='password' placeholder='Hasło' id='haslo' name='has'>
                        <label for='haslo2'>Powtórz hasło</label>
                        <input type='password' placeholder='Powtórz hasło' id='haslo2' name='has2'>
                        <button>Zarejestruj mnie</button>
                    </form>";
                }
            ?>

            
            
            
        </aside>

    </main>

    <footer>
        <h5>TEB Edukacja © 2023 - Bożydar Koguc</h5>
    </footer>

</body>

</html>