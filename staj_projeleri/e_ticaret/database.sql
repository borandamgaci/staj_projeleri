-- E-Ticaret Ürün Kataloğu Veritabanı
-- MySQL / MariaDB

CREATE DATABASE IF NOT EXISTS eticaret CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci;
USE eticaret;

-- Kategoriler tablosu
CREATE TABLE IF NOT EXISTS kategoriler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Ürünler tablosu
CREATE TABLE IF NOT EXISTS urunler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kategori_id INT NOT NULL,
    ad VARCHAR(200) NOT NULL,
    fiyat DECIMAL(10, 2) NOT NULL,
    resim VARCHAR(255) NOT NULL,
    FOREIGN KEY (kategori_id) REFERENCES kategoriler(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Örnek kategoriler
INSERT INTO kategoriler (ad) VALUES
('Elektronik'),
('Giyim'),
('Ev & Yaşam'),
('Spor'),
('Kitap');

-- Örnek ürünler
INSERT INTO urunler (kategori_id, ad, fiyat, resim) VALUES
(1, 'Kablosuz Kulaklık', 899.99, 'assets/images/kulaklik.svg'),
(1, 'Akıllı Saat', 2499.00, 'assets/images/akilli-saat.svg'),
(1, 'Bluetooth Hoparlör', 549.50, 'assets/images/hoparlor.svg'),
(2, 'Erkek Polo Tişört', 299.00, 'assets/images/polo-tisort.svg'),
(2, 'Kadın Kot Pantolon', 449.90, 'assets/images/kot-pantolon.svg'),
(2, 'Unisex Sweatshirt', 379.00, 'assets/images/sweatshirt.svg'),
(3, 'Kahve Makinesi', 1899.00, 'assets/images/kahve-makinesi.svg'),
(3, 'Masa Lambası', 249.00, 'assets/images/masa-lambasi.svg'),
(4, 'Yoga Matı', 199.90, 'assets/images/yoga-mati.svg'),
(4, 'Dambıl Seti (10kg)', 599.00, 'assets/images/dambil.svg'),
(5, 'Programlama Temelleri', 89.90, 'assets/images/kitap1.svg'),
(5, 'Web Tasarım Rehberi', 119.00, 'assets/images/kitap2.svg');
