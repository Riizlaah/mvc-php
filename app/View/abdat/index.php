
<br>
<br>
<div class="ilm">
  <?php Flasher::Flash(); ?>
</div>
<?php //if( $_SESSION['login']['stat'] === 'admin' or $_SESSION['login']['stat'] === 'klasik' ): ?>
<a href="#modal" class="mbtn">Tambah Data</a>
<div class="modal" id="modal">
  <form action="<?= BASEURL; ?>abdat/tambah" method="post" autocomplete="off" enctype="multipart/form-data">
    <h1>Tambah AbData</h1>
    <div class="ilm">
      <input type="text" name="nama" id="nama" required="" pattern=".*\S.*">
      <label for="nama">Nama</label>
    </div>
    <div class="ilm">
      <input type="number" name="umur" id="umur" required="" pattern=".*\S.*">
      <label for="umur">Umur</label>
    </div>
    <div class="ilm">
      <input type="text" name="kota" id="kota" value="" required="" pattern=".*\S.*">
      <label for="kota">Kota</label>
    </div>
    <div class="fl">
      <input type="file" name="gmb">
    </div>
    <br>
    <hr>
    <div class="bta">
      <a href="#">Batal</a>
      <button type="submit">Tambah</button>
    </div>
  </form>
</div>
<?php //endif; ?>
<br>
<br>
<form action="<?= BASEURL; ?>abdat/cari" class="cari" method="post">
  <input type="text" name="key" autocomplete="off"><button type="submit">Cari</button>
</form>
<br>
<h1>Ab Data</h1>
<div class="container">
  <?php foreach( $data['abdat'] as $hek ): ?>
    <div class="dats">
      <h1><?= $hek['nama']; ?></h1>
      <div class="dctn">
        <img src="<?= BASEURL; ?>aset/img/<?= $hek['gmb']; ?>" alt="<?= $hek['gmb']; ?>">
        <p>Hai nama saya <?= $hek['nama']; ?>,</p>
        <p>Umur saya <?= $hek['umur']; ?>,</p>
        <p>Saya dari kota <?= $hek['kota']; ?></p>
      </div>
      <?php //if( $_SESSION['login']['stat'] === 'admin' ): ?>
        <div class="bta">
          <a href="<?= BASEURL; ?>abdat/hapus/<?= $hek['id']; ?>" onclick="return confirm('Yakin ?');" class="red">Hapus</a>
          <a href="<?= BASEURL; ?>abdat/ubah/<?= $hek['id']; ?>" class="blue">Ubah</a>
        </div>
      <?php //endif; ?>
    </div>
  <?php endforeach; ?>
</div>