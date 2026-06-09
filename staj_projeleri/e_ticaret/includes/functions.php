<?php
/**
 * Ürün ve kategori sorguları
 */

require_once __DIR__ . '/../config/db.php';

function kategorileriGetir(): array
{
    $pdo = dbBaglan();
    $stmt = $pdo->query('SELECT id, ad FROM kategoriler ORDER BY ad ASC');
    return $stmt->fetchAll();
}

function urunleriGetir(?int $kategoriId = null): array
{
    $pdo = dbBaglan();

    if ($kategoriId !== null && $kategoriId > 0) {
        $stmt = $pdo->prepare(
            'SELECT u.id, u.ad, u.fiyat, u.resim, k.ad AS kategori_ad
             FROM urunler u
             INNER JOIN kategoriler k ON u.kategori_id = k.id
             WHERE u.kategori_id = :kategori_id
             ORDER BY u.ad ASC'
        );
        $stmt->execute(['kategori_id' => $kategoriId]);
    } else {
        $stmt = $pdo->query(
            'SELECT u.id, u.ad, u.fiyat, u.resim, k.ad AS kategori_ad
             FROM urunler u
             INNER JOIN kategoriler k ON u.kategori_id = k.id
             ORDER BY k.ad ASC, u.ad ASC'
        );
    }

    return $stmt->fetchAll();
}

function fiyatFormatla(float $fiyat): string
{
    return number_format($fiyat, 2, ',', '.') . ' ₺';
}
