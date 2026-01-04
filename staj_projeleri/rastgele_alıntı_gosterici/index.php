<?php
$alintilar = file("alintilar.txt", FILE_IGNORE_NEW_LINES);

$rastgele = $alintilar[array_rand($alintilar)];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Rastgele Alıntı</title>
</head>
<body>

<h2>Rastgele Alıntı</h2>

<p><em><?php echo $rastgele; ?></em></p>

<a href="index.php">Yenile</a>

</body>
</html>
