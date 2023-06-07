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
<form class="form" action="<?= BASEURL; ?>login/logind" method="post">
  <h1>Login</h1>
  <br>
  <div class="ilm">
    <input type="text" name="user" id="user" required="" pattern=".*\S.*">
    <label for="user">Username</label>
  </div>
  <div class="ilm">
    <i class="fas fa-lock" id="ic"></i>
    <input type="pass" name="pass" id="pass" required="" pattern=".*\S.*">
    <label for="pass">Password</label>
  </div>
  <div class="che">
    <input type="checkbox" name="che" id="che"><label for="che">Ingat Saya</label>
  </div>
  <br>
  <hr>
  <div class="ilm">
    <button type="submit" class="lre">Login</button>
    <p class="lk">Tidak punya akun ? <a href="<?= BASEURL; ?>login/daftar">Daftar</a></p>
  </div>
</form>