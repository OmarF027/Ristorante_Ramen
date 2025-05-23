<?php
// Abilita tutti gli errori per debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$lavora_success = false;
$lavora_error = '';

// Carica config esterno
$config = require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lavora_form'])) {
    try {
        // Modifica la connessione PDO con opzioni esplicite
        $pdo = new PDO(
            "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
            $config['user'],
            $config['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );

        // Validazione campi
        if (empty($_POST['nome']) || empty($_POST['email'])) {
            $lavora_error = 'Per favore compila tutti i campi obbligatori.';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $lavora_error = 'Inserisci un indirizzo email valido.';
        } else {
            $cv_path = null;

            // Gestione upload CV (con controlli aggiuntivi)
            if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['cv']['tmp_name'];
                $fileName = basename($_FILES['cv']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if ($fileExtension !== 'pdf') {
                    $lavora_error = 'Solo file PDF sono permessi.';
                } else {
                    $newFileName = md5(time() . $fileName) . '.pdf';
                    $uploadFileDir = __DIR__ . '/uploads/';

                    // Crea cartella se non esiste con permessi corretti
                    if (!is_dir($uploadFileDir) && !mkdir($uploadFileDir, 0755, true)) {
                        throw new Exception("Impossibile creare la cartella uploads");
                    }

                    $dest_path = $uploadFileDir . $newFileName;

                    if (!move_uploaded_file($fileTmpPath, $dest_path)) {
                        $lavora_error = 'Errore durante il caricamento del CV. Controlla i permessi della cartella.';
                    } else {
                        $cv_path = 'uploads/' . $newFileName;
                    }
                }
            }

            if (!$lavora_error) {
                // Debug valori prima dell'inserimento
                error_log("Valori inserimento DB: 
                    Nome: {$_POST['nome']}
                    Email: {$_POST['email']}
                    Telefono: " . ($_POST['telefono'] ?? 'null') . "
                    Messaggio: " . ($_POST['messaggio'] ?? 'null') . "
                    CV Path: " . ($cv_path ?? 'null')
                );

                $stmt = $pdo->prepare("INSERT INTO candidature (nome, email, telefono, messaggio, cv_path) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([
                    $_POST['nome'],
                    $_POST['email'],
                    $_POST['telefono'] ?? null,
                    $_POST['messaggio'] ?? null,
                    $cv_path
                ]);

                $lavora_success = true;
            }
        }
    } catch (PDOException $e) {
        $lavora_error = 'Errore Database: ' . $e->getMessage(); // Mostra l'errore reale
        error_log('PDO Error: ' . $e->getMessage());
    } catch (Exception $e) {
        $lavora_error = 'Errore Generico: ' . $e->getMessage();
        error_log('General Error: ' . $e->getMessage());
    }
}
?>

<!-- Form HTML (rimane uguale) -->
<div id="lavora" class="section" style="padding: 60px 20px;">
    <h2>Lavora con noi</h2>

    <?php if ($lavora_success): ?>
        <p style="color: green;">Candidatura inviata con successo!</p>
    <?php elseif ($lavora_error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($lavora_error); ?></p>
    <?php endif; ?>

    <form action="#lavora" method="post" enctype="multipart/form-data">
        <input type="hidden" name="lavora_form" value="1">
        
        <label>Nome</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" required><br><br>

        <label>Telefono</label><br>
        <input type="text" name="telefono"><br><br>

        <label>Messaggio</label><br>
        <textarea name="messaggio"></textarea><br><br>

        <label>CV (PDF)</label><br>
        <input type="file" name="cv" accept=".pdf"><br><br>

        <button type="submit">Invia candidatura</button>
    </form>
</div>