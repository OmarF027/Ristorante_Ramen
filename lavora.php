<?php
$lavora_success = false;
$lavora_error = '';

// Carica config esterno
$config = require __DIR__ . '/config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lavora_form'])) {
    try {
        $pdo = new PDO(
            "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
            $config['user'],
            $config['pass']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Validazione campi
        if (empty($_POST['nome']) || empty($_POST['email'])) {
            $lavora_error = 'Per favore compila tutti i campi obbligatori.';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $lavora_error = 'Inserisci un indirizzo email valido.';
        } else {
            $cv_path = null;

            // Gestione upload CV
            if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['cv']['tmp_name'];
                $fileName = $_FILES['cv']['name'];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if ($fileExtension === 'pdf') {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = __DIR__ . '/uploads/';

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0755, true);
                    }

                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $cv_path = 'uploads/' . $newFileName;
                    } else {
                        $lavora_error = 'Errore durante il caricamento del CV.';
                    }
                } else {
                    $lavora_error = 'Solo file PDF sono permessi.';
                }
            }

            // Se nessun errore, inserisci nel DB
            if (!$lavora_error) {
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
        $lavora_error = 'Errore connessione DB: ' . $e->getMessage();
    }
}
?>

<!-- Form HTML -->
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
