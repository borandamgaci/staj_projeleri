<?php
/**
 * E-Ticaret Ürün Kataloğu
 * Ürünleri listeler ve kategoriye göre filtreleme sağlar.
 */

require_once __DIR__ . '/includes/functions.php';

// Kategori filtresi (GET parametresi)
$seciliKategoriId = isset($_GET['kategori']) ? (int) $_GET['kategori'] : null;
if ($seciliKategoriId !== null && $seciliKategoriId <= 0) {
    $seciliKategoriId = null;
}

$kategoriler = kategorileriGetir();
$urunler = urunleriGetir($seciliKategoriId);

// Seçili kategori adını bul
$seciliKategoriAd = 'Tüm Ürünler';
if ($seciliKategoriId !== null) {
    foreach ($kategoriler as $kat) {
        if ((int) $kat['id'] === $seciliKategoriId) {
            $seciliKategoriAd = $kat['ad'];
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Kataloğu | E-Ticaret</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header class="header">
        <h1>Ürün Kataloğu</h1>
        <p>Kategorilere göre ürünleri keşfedin</p>
    </header>

    <main class="container">

        <section class="filtre-alani">
            <h2>Kategori Filtresi</h2>
            <div class="kategori-butonlari">
                <a href="index.php"
                   class="kategori-btn <?= $seciliKategoriId === null ? 'aktif' : '' ?>">
                    Tümü
                </a>
                <?php foreach ($kategoriler as $kategori): ?>
                    <a href="index.php?kategori=<?= (int) $kategori['id'] ?>"
                       class="kategori-btn <?= $seciliKategoriId === (int) $kategori['id'] ? 'aktif' : '' ?>">
                        <?= htmlspecialchars($kategori['ad']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <p class="sonuc-bilgi">
            <strong><?= htmlspecialchars($seciliKategoriAd) ?></strong> —
            <?= count($urunler) ?> ürün listeleniyor
        </p>

        <?php if (count($urunler) > 0): ?>
            <div class="urun-grid">
                <?php foreach ($urunler as $urun): ?>
                    <article class="urun-kart">
                        <img src="<?= htmlspecialchars($urun['resim']) ?>"
                             alt="<?= htmlspecialchars($urun['ad']) ?>"
                             class="urun-resim"
                             onerror="this.src='assets/images/placeholder.svg'">
                        <div class="urun-bilgi">
                            <span class="urun-kategori"><?= htmlspecialchars($urun['kategori_ad']) ?></span>
                            <h3 class="urun-ad"><?= htmlspecialchars($urun['ad']) ?></h3>
                            <p class="urun-fiyat"><?= fiyatFormatla((float) $urun['fiyat']) ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="bos-durum">
                <p>Bu kategoride henüz ürün bulunmuyor.</p>
            </div>
        <?php endif; ?>

    </main>

    <footer class="footer">
        <p>E-Ticaret Ürün Kataloğu &copy; <?= date('Y') ?> — Staj Projesi</p>
    </footer>

</body>
</html>
