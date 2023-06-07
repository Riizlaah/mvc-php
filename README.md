# MVC-PHP
PHP MVC untuk web (Belum sempurna), buatan sendiri
## fitur
- CRUD (abdat)
- login (hampir sempurna)
- MVC (sudah jelas)

**Note :** saya menggunakan **mysqli** Database API

## config {#cf}
File config ada di `app/config.php`<br>
isinya mungkin seperti ini

```php
  <?php 
    //file konfigurasi
    //url web 
    define('BASEURL', 'https://websitemu.com/');
    
    //DB config (mysql)
    define('HOST', 'localhost'); //DB Host
    define('DB_USER', 'root'); //DB Username
    define('DB_PASS', 'root'); //DB Password
    define('DB_NAME', 'heker'); // Nama DB
  ?>
```

konfigurasikan sesuai web anda

---

# Instalasi
Langkah instalasinya sebagai berikut :
1. Download .zip file <a href="https://raw.githubusercontent.com/Riizlaah/mvc-php/main/mvp.zip">Disini</a> 
2. Upload dan ekstrak .zip file di ftp server untuk web anda, lokasi upload seharusnya `htdocs/mvp.zip` 
3. setelah diekstrak [konfigurasikan](#cf) sesuai kebutuhan.
4. Selesai

**Maaf, belum ada tutorial lebih lanjut, semoga membantu**
