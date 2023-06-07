<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests; object-src 'none'">
  <title><?= $data['jud']; ?></title>
  <script src="https://kit.fontawesome.com/3260cb9060.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= BASEURL; ?>aset/i.css">
</head>
<body>
<input type="checkbox" name="hek" class="hek" id="hek">
<nav class="navbar">
  <label for="hek"><span class="fas fa-bars"></span></label>
  <a href="<?= BASEURL; ?>" class="hdr">Hekerd</a>
  <a href="<?= BASEURL; ?>login" class="pro">
    <?php if( isset($_SESSION['login']) ): ?>
      <img src="<?= BASEURL; ?>aset/img/<?= $_SESSION['login']['gmb']; ?>" alt="Profil">
    <?php else: ?>
      <img src="<?= BASEURL; ?>aset/img/klasik.jpg" alt="Pengunjung">
    <?php endif; ?>
  </a>
</nav>
<div class="nav">
  <h1>Hekerd</h1>
  <a href="<?= BASEURL; ?>">Home</a>
  <a href="<?= BASEURL; ?>about">About</a>
  <a href="<?= BASEURL; ?>abdat">AbDat</a>
  <span>Terima Kasih</span>
</div>
