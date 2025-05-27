<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$lavora_success = false;
$lavora_error = '';

$config = require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lavora_form'])) {
    try {
        $pdo = new PDO(
            "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
            $config['user'],
            $config['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );

        if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['telefono'])) {
            $lavora_error = 'Per favore compila tutti i campi obbligatori.';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $lavora_error = 'Inserisci un indirizzo email valido.';
        } elseif (!isset($_FILES['cv']) || $_FILES['cv']['error'] !== UPLOAD_ERR_OK) {
            $lavora_error = 'Carica un file PDF valido per il CV.';
        } else {
            $fileTmpPath = $_FILES['cv']['tmp_name'];
            $fileName = basename($_FILES['cv']['name']);
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if ($fileExtension !== 'pdf') {
                $lavora_error = 'Solo file PDF sono permessi.';
            } else {
                $newFileName = md5(time() . $fileName) . '.pdf';
                $uploadFileDir = __DIR__ . '/uploads/';

                if (!is_dir($uploadFileDir) && !mkdir($uploadFileDir, 0755, true)) {
                    throw new Exception("Impossibile creare la cartella uploads");
                }

                $dest_path = $uploadFileDir . $newFileName;

                if (!move_uploaded_file($fileTmpPath, $dest_path)) {
                    $lavora_error = 'Errore durante il caricamento del CV. Controlla i permessi della cartella.';
                } else {
                    $cv_path = 'uploads/' . $newFileName;

                    $stmt = $pdo->prepare("INSERT INTO candidature (nome, email, telefono, messaggio, cv_path) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([
                        $_POST['nome'],
                        $_POST['email'],
                        $_POST['telefono'],
                        $_POST['messaggio'] ?? null,
                        $cv_path
                    ]);

                    $lavora_success = true;
                }
            }
        }
    } catch (PDOException $e) {
        $lavora_error = 'Errore Database: ' . $e->getMessage();
        error_log('PDO Error: ' . $e->getMessage());
    } catch (Exception $e) {
        $lavora_error = 'Errore Generico: ' . $e->getMessage();
        error_log('General Error: ' . $e->getMessage());
    }
} else {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Invio Candidatura | 21OVEN</title>

    <!-- Font e Icone -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Fogli di stile -->
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/ordina.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/mediaqueries.css" />

    <style>
        html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

@media (min-width: 1024px) {
    .navigation ul {
        gap: 40px !important;
    }
}

main {
    flex: 1;
    display: flex;
    justify-content: center; /* centra orizzontalmente */
    align-items: center;     /* centra verticalmente */
    padding: 15px; /* spazio sui lati */
}

.message {
    max-width: 600px;
    width: 100%;
    padding: 20px;
    border-radius: 6px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.3em;
    font-weight: 700;
    text-align: center;
    box-sizing: border-box;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

a.back-link {
    display: inline-block;
    margin-top: 25px;
    font-weight: 600;
    color: #0066cc;
    text-decoration: none;
}

a.back-link:hover {
    text-decoration: underline;
}
</style>

</head>
<body>

<?php include('header.php'); ?>

<main>
    <div class="message <?php echo $lavora_success ? 'success' : 'error'; ?>">
        <?php if ($lavora_success): ?>
            Candidatura inviata con successo! Ti contatteremo al più presto.
        <?php else: ?>
            <?php echo htmlspecialchars($lavora_error ?: 'Errore nell\'invio della candidatura.'); ?>
        <?php endif; ?>
        <br />
        <a class="back-link" href="index.php">Home</a>
    </div>
</main>

<?php include('footer.php'); ?>

<script src="js/script.js"></script>
<script src="js/menu.js"></script>

</body>
</html>
