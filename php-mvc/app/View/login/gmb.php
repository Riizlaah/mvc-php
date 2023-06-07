<div class="bti">
  <a href="<?= BASEURL; ?>login" class="bk">Kembali</a>
</div>
<br>
<br>
<div class="ilm">
  <?php Flasher::Flash(); ?>
</div>
<br>
<br>
<form class="form" action="<?= BASEURL; ?>login/ubg" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $data['inf']['id']; ?>">
  <input type="hidden" name="gmbl" value="<?= $data['inf']['gmb']; ?>">
  <h1>Ubah Profil</h1>
  <br>
  <div class="gg">
    <img src="aset/img/<?= $data['inf']['gmb']; ?>" alt="<?= $data['inf']['gmb']; ?>">
  </div>
  <div class="fl">
    <input type="file" name="gmb">
  </div>
  <br>
  <div class="ilm">
    <button class="lre" type="submit">Ubah</button>
  </div>
</form>