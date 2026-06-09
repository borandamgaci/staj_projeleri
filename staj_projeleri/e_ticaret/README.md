# E-Ticaret Ürün Kataloğu

PHP ve MySQL tabanlı basit ürün listeleme uygulaması. Staj defteri projesi için hazırlanmıştır.

## Özellikler

- Veritabanında saklanan ürünler (ad, fiyat, resim)
- Kategoriye göre filtreleme
- Responsive (mobil uyumlu) tasarım
- PDO ile güvenli veritabanı bağlantısı
- XSS koruması (`htmlspecialchars`)

## Gereksinimler

- PHP 7.4 veya üzeri
- MySQL / MariaDB
- Apache veya PHP built-in sunucu

## Kurulum

### 1. Veritabanını oluşturun

phpMyAdmin veya MySQL komut satırı ile `database.sql` dosyasını içe aktarın:

```bash
mysql -u root -p < database.sql
```

### 2. Veritabanı ayarlarını yapın

`config/db.php` dosyasında bağlantı bilgilerinizi düzenleyin:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'eticaret');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### 3. Projeyi çalıştırın

**XAMPP / WAMP kullanıyorsanız:**  
Projeyi `htdocs` veya `www` klasörüne kopyalayın ve tarayıcıda açın:
`http://localhost/e_ticaret/`

**PHP built-in sunucu ile:**

```bash
cd e_ticaret
php -S localhost:8000
```

Tarayıcıda: `http://localhost:8000`

## Proje Yapısı

```
e_ticaret/
├── assets/
│   ├── css/style.css      # Stil dosyası
│   └── images/            # Ürün görselleri
├── config/
│   └── db.php             # Veritabanı bağlantısı
├── includes/
│   └── functions.php      # Ürün/kategori sorguları
├── database.sql           # Veritabanı şeması ve örnek veri
├── index.php              # Ana sayfa
└── README.md
```

## Veritabanı Şeması

| Tablo       | Alanlar                                      |
|-------------|----------------------------------------------|
| kategoriler | id, ad                                       |
| urunler     | id, kategori_id, ad, fiyat, resim            |

## Staj Defteri İçin Notlar

Bu proje şu konuları kapsar:

1. **PHP:** GET parametreleri, PDO, fonksiyonlar, include
2. **MySQL:** İlişkisel tablolar, JOIN sorguları, foreign key
3. **Web:** HTML5, CSS Grid, responsive tasarım
4. **Güvenlik:** Prepared statements, XSS önleme
