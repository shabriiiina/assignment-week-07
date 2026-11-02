<?php
session_start();

// Inisialisasi kuantitas di session kalau belum ada
if (!isset($_SESSION['kuantitas'])) {
    $_SESSION['kuantitas'] = 0;
}

// Proses logika penambahan / pengurangan saat form di-submit
if (isset($_POST['action'])) {
    $qty = isset($_POST['kuantitas']) ? (int)$_POST['kuantitas'] : 1;

    if ($_POST['action'] === 'add') {
        $_SESSION['kuantitas'] += $qty;
    } elseif ($_POST['action'] === 'remove') {
        $_SESSION['kuantitas'] -= $qty;
        // Opsional: cegah kuantitas minus
        if ($_SESSION['kuantitas'] < 0) {
            $_SESSION['kuantitas'] = 0;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Minggu 08</title>
</head>
<body>
    <h2>Kuantitas Saat Ini: <?php echo $_SESSION['kuantitas']; ?></h2>

    <form action="" method="POST">
        <label for="kuantitas">Jumlah:</label>
        <input type="number" name="kuantitas" value="1" min="1" required>
        <br><br>
        <button type="submit" name="action" value="add">Add</button>
        <button type="submit" name="action" value="remove">Remove</button>
    </form>
</body>
</html>