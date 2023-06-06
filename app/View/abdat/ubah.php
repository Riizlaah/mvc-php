<?php foreach($data['ud'] as $v): ?>
  <form class="form" action="<?= BASEURL; ?>abdat/ub" method="post" enctype="multipart/form-data">
    <h1>Ubah AbData</h1>
    <input type="hidden" name="id" value="<?= $v['id']; ?>">
    <input type="hidden" name="gmbl" value="<?= $v['gmb']; ?>">
    <div class="ilm">
      <input type="text" name="nama" id="nama" value="<?= $v['nama']; ?>" required="" pattern=".*\S.*" autocomplete="off">
      <label for="nama">Nama</label>
    </div>
    <div class="ilm">
      <input type="number" name="umur" id="umur" value="<?= $v['umur']; ?>" required="" pattern=".*\S.*" autocomplete="off">
      <label for="umur">Umur</label>
    </div>
    <div class="ilm">
      <input type="text" name="kota" id="kota" value="<?= $v['kota']; ?>" required="" pattern=".*\S.*" autocomplete="off">
      <label for="kota">Kota</label>
    </div>
    <div class="gg">
      <img src="<?= BASEURL; ?>aset/img/<?= $v['gmb']; ?>" alt="<?= $v['gmb'] ?>">
    </div>
    <div class="fl">
      <input type="file" name="gmb">
    </div>
    <br>
    <hr>
    <div class="bta">
      <a href="<?= BASEURL; ?>abdat" class="clo">Batal</a>
      <button type="submit" class="sub">Ubah</button>
    </div>
  </form>
<?php endforeach; ?>