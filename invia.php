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

        // Validazione campi obbligatori
        if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['telefono'])) {
            $lavora_error = 'Per favore compila tutti i campi obbligatori.';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $lavora_error = 'Inserisci un indirizzo email valido.';
        } elseif (!isset($_FILES['cv']) || $_FILES['cv']['error'] !== UPLOAD_ERR_OK) {
            $lavora_error = 'Carica un file PDF valido per il CV.';
        } else {
            // Controllo estensione PDF
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

                    // Inserimento dati nel DB solo se non ci sono errori
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
    // Se non è POST o manca lavora_form, reindirizza
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Invio Candidatura | 21OVEN</title>
    <style>
        .message {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 6px;
            font-family: 'Kumbh Sans', sans-serif;
            font-size: 1.3em;
            font-weight: 700;
            text-align: center;
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

<div class="message <?php echo $lavora_success ? 'success' : 'error'; ?>">
    <?php if ($lavora_success): ?>
        Candidatura inviata con successo! Ti contatteremo al più presto.
    <?php else: ?>
        <?php echo htmlspecialchars($lavora_error ?: 'Errore nell\'invio della candidatura.'); ?>
    <?php endif; ?>
    <br />
    <a class="back-link" href="lavora.php">Torna al form</a>
</div>

</body>
</html>

