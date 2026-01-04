<?php
if ($_POST) {
    $alinti = $_POST["alinti"];
    file_put_contents("alintilar.txt", $alinti . PHP_EOL, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Alıntı Yönetimi</title>
</head>
<body>

<h2>Alıntı Ekle</h2>

<form method="post">
    <textarea name="alinti" placeholder="Alıntıyı giriniz"></textarea><br><br>
    <button type="submit">Ekle</button>
</form>

</body>
</html>
