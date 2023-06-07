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
<form class="form" action="<?= BASEURL; ?>login/regis" method="post" autocomplete="off">
  <h1>Daftar</h1>
  <div class="ilm">
    <input type="text" name="user" id="user" required="" pattern=".*\S.*" autocomplete="off">
    <label for="user">Username</label>
  </div>
  <div class="ilm">
    <i class="fas fa-lock" id="ic"></i>
    <input type="pass" name="pass" id="pass" required="" pattern=".*\S.*" autocomplete="off">
    <label for="pass">Password</label>
  </div>
  <div class="ilm">
    <i class="fas fa-lock" id="ic2"></i>
    <input type="pass" name="pass2" id="pass2" required="" pattern=".*\S.*" autocomplete="off">
    <label for="pass2">Konfirmasi Password</label>
  </div>
  <div class="capt">
    <img src="<?= BASEURL; ?>aset/test.php" alt="hdgshs"><i class="fas fa-undo-alt"></i>
    <input type="text" name="capt" placeholder="Masukan kode diatas..." autocomplete="off">
  </div>
  <br>
  <hr>
  <div class="ilm">
    <button type="submit" class="lre">Daftar</button>
    <p class="lk">Sudah punya akun ? <a href="<?= BASEURL; ?>login/masuk">Login</a></p>
  </div>
</form>