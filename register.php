<?php
// Connessione al database
$servername = "localhost";
$username = "root";  // Default username di XAMPP
$password = "";      // Default password di XAMPP
$dbname = "user_registration";  // Nome del tuo database

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gestione della registrazione
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $confirmEmail = $_POST['confirmEmail'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validazione dei campi
    if ($email != $confirmEmail) {
        echo "Le email non corrispondono.";
    } elseif ($password != $confirmPassword) {
        echo "Le password non corrispondono.";
    } else {
        // Validazione della password
        function validatePassword($password) {
            if (strlen($password) < 8) {
                return "La password deve avere almeno 8 caratteri.";
            }
            if (!preg_match("/[0-9]/", $password) || !preg_match("/[!@#$%^&*()_+{}\[\]:;<>,.?/~\\|-]/", $password)) {
                return "La password deve contenere almeno un numero e un carattere speciale.";
            }
            if (preg_match("/(012|123|234|345|456|567|678|789|890)/", $password)) {
                return "La password non può contenere sequenze di numeri.";
            }
            return null;
        }

        $passwordError = validatePassword($password);
        if ($passwordError) {
            echo $passwordError;
        } else {
            // Crittografare la password prima di salvarla
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepara l'istruzione SQL per inserire i dati nel database
            $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $surname, $email, $hashedPassword);

            // Esegui la query
            if ($stmt->execute()) {
                echo "Registrazione completata con successo!";
            } else {
                echo "Errore nella registrazione: " . $conn->error;
            }

            $stmt->close();
        }
    }
}

$conn->close();
?>



<?php
// Connessione al database (modifica con i tuoi dati)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database.db";  // Sostituisci con il nome del tuo database

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controllo se la connessione è andata a buon fine
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupero dei dati dal form di registrazione
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$confirmEmail = $_POST['confirmEmail'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Verifica che email e conferma email siano uguali
if ($email !== $confirmEmail) {
    die("Le email non corrispondono.");
}

// Verifica che la password e la conferma password siano uguali
if ($password !== $confirmPassword) {
    die("Le password non corrispondono.");
}

// Hash della password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Inserisci l'utente nel database
$sql = "INSERT INTO utenti (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Registrazione avvenuta con successo!";
    // Puoi reindirizzare a una pagina di login o home dopo la registrazione
    header("Location: /Fioraso/home.html");
} else {
    echo "Errore: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
