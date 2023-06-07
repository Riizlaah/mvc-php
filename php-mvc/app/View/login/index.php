<div class="bti">
  <a href="<?= BASEURL; ?>" class="bk">Kembali</a>
  <a href="<?= BASEURL; ?>login/logot" class="lo">
    <i class="fas fa-power-off"></i>
    Log Out
  </a>
</div>
<br>
<div class="ilm">
  <?php Flasher::Flash(); ?>
</div>
<br>
<?php if( !isset($_SESSION["login"]) ): ?>
  <div class="ung">
    <p>Anda belum login, silahkan login</p>
    <a href="<?= BASEURL; ?>login/masuk" class="lre">Login</a>
  </div>
<?php else: ?>
  <?php foreach( $data['inf'] as $inf ) : ?>
    <div class="inf">
      <h1>Profil</h1>
      <div class="ctn">
        <img src="<?= BASEURL; ?>aset/img/<?= $inf['gmb']; ?>" alt="Profil" >
        <p>Username : <?= $inf['user'] ?></p>
        <p>Status : <?= $inf['stat'] ?><br><br><?php if( $inf['stat'] != 'admin' and $inf['stat'] != 'klasik' ): ?>
          Status user tidak dapat memakai fitur klasik, <a href="<?= BASEURL; ?>login/upa">Upgrade sekarang</a>
        <?php endif; ?></p>
      </div>
    </div>
    <div class="inf">
      <h1>Ganti Info Profil</h1>
      <div class="ctn">
        <p><a href="<?= BASEURL; ?>login/ubah/g/<?= $inf['id']; ?>">Ubah Foto Profil</a></p>
        <p><a href="<?= BASEURL; ?>login/ubah/p/<?= $inf['id']; ?>">Ubah Password</a></p>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
