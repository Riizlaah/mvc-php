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
<form action="<?= BASEURL; ?>login/ubp" method="post">
  <input type="hidden" name="id" value="<?= $data['inf']['id']; ?>">
  <h1>Ubah Password</h1>
  <br>
  <div class="ilm">
    <i class="fas fa-lock"></i>
    <input type="password" name="pass" id="pass" required="" pattern=".*\S.*">
    <label for="pass">Password Baru</label>
  </div>
  <div class="ilm">
    <i class="fas fa-lock" id="ic2"></i>
    <input type="password" name="pass2" id="pass2" required="" pattern=".*\S.*">
    <label for="pass2">Ulangi Password Baru</label>
  </div>
  <div class="ilm">
    <i class="fas fa-lock" id="ic3"></i>
    <input type="password" name="pass3" id="pass3" required="" pattern=".*\S.*">
    <label for="pass3">Password Lama</label>
  </div>
  <br>
  <div class="ilm">
    <button type="submit" class="lre">Ubah</button>
  </div>
</form>