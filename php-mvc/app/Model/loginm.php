<?php
  
  class loginm {
    private $tb = "`Userdb`", $tl;
    
    public function __construct() {
      $this->tl = new Tool();
    }
    
    public function login($data) {
      $user = $data['user'];
      $pass = $data['pass'];
      
      $this->tl->query("SELECT `user`,`pass` FROM " . $this->tb . " WHERE `user` = :user", ['user' => $user]);
      $dat = $this->tl->fetch();
      if( $this->tl->numr() == 0 ) {
        return 'user';
      }
      if( !password_verify($pass, $dat['pass']) ) {
        return 'pass';
      }
      $_SESSION['login'] = ['log' => true, 'user' => $dat['user']];
      if( isset($_POST['che']) ) {
        setcookie('di', $dat['id'], time() + 60*60*24*15);
        setcookie('yek', hash('sha256', $dat['user']), time() + 60*60*24*15);
      }
      return 'suc';
    }
    
    public function daftar($data) {
      $user = htmlspecialchars(stripslashes($data['user']));
      $pass = $data['pass'];
      $pass2 = $data['pass2'];
      $capt = $data['capt'];
      
      #Jika username sudah ada 
      $this->tl->query("SELECT `stat` FROM " . $this->tb . " WHERE `user` = :user", ['user' => $user]);
      $nm = $this->tl->numr();
      if( $nm == 1 ) {
        return 'user';
      }
      //Jika password kurang dari 6 karakter 
      if( strlen($pass) < 4 ) {
        return 'np';
      }
      #Jika password tidak sama 
      if( $pass !== $pass2 ) {
        return 'pass';
      }
      #Jika kode verif berbeda 
      if( $capt !== $_SESSION['capt'] ) {
        return 'capt';
      }
      $pass = password_hash($pass, PASSWORD_DEFAULT);
      $this->tl->query("INSERT INTO " . $this->tb . " (`id`, `user`, `pass`, `gmb`, `stat`, `tmsp`, `kode`) VALUES (NULL, :user, :pass, 'klasik.jpg', 'new', 0, 0)", ['user' => $user, 'pass' => $pass]);
      $this->tl->run();
      return $this->tl->aff();
    }
    
    public function logot() {
      //set sesi 
      $user = $_SESSION['login']['user'];
      $this->tl->query("UPDATE " . $this->tb . " SET `tmsp` = 0 WHERE " . $this->tb . ".`user` = :user", ['user' => $user]);
      $this->tl->run();
      //hapus sesi & cookie 
      $_SESSION = [];
      session_unset();
      session_destroy();
      setcookie('di', '', time() - 60*60*24*30);
      setcookie('yek', '', time() - 60*60*24*30);
      header("Location: " . BASEURL . "login");
      exit;
    }
    
    public function cook() {
      $id = $_COOKIE['di'];
      $user = $_COOKIE['yek'];
      
      //Cek username 
      $this->tl->query("SELECT `user` FROM " . $this->tb . " WHERE `id` = :id", ['id' => $id]);
      $dat = $this->tl->fetch();
      if( hash('sha256', $dat['user']) !== $user ) {
        return false;
      }
      $_SESSION['login'] = ['log' => true, 'user' => $dat['user']];
    }
    
    public function cSD() {
      $user = $_SESSION['login']['user'];
      $this->tl->query("SELECT `id`,`user`,`gmb`,`stat` FROM " . $this->tb . " WHERE `user` = :user", ['user' => $user]);
      $dat = $this->tl->fetch();
      if( !isset($_SESSION['login']['seslog']) ) {
        $wkt = time();
        $id = $dat['id'];
        if( $dat['tmsp'] === 0 ) {
          $tms = $wkt + 3600;
          $this->tl->query("UPDATE " . $this->tb . " SET `tmsp` = :wkt WHERE " . $this->tb . ".`id` = :id", ['wkt' => $tms, 'id' => $id]);
          $this->tl->run();
        } else if( $wkt - 3600 > $dat['tmsp'] ) {
          $this->tl->query("UPDATE " . $this->tb . " SET `tmsp` = 0 WHERE " . $this->tb . ".`id` = :id", ['id' => $id]);
          $this->tl->run();
          header("Location: " . BASEURL . "login");
          exit;
        } else {
          $_SESSION = [];
          session_unset();
          session_destroy();
          header("Location: " . BASEURL . "login");
          exit;
        }
        $_SESSION['login'] += [ 'seslog' => true ];
      }
      $_SESSION['login'] += [ 'stat' => $dat['stat'] ];
      $_SESSION['login'] += [ 'gmb' => $dat['gmb'] ];
      return $dat;
    }
    
    public function gbid($id) {
      $this->tl->query("SELECT `id`,`pass`,`gmb` FROM " . $this->tb . " WHERE `id` = :id", ['id' => $id]);
      return $this->tl->fetch();
    }
    
    public function ubag($data) {
      $gmb = $this->db->upf();
      if( $gmb === 'gmb' ) {
        return 'not';
      }
      if( $gmb === 'ex' or $gmb === 'w' or $gmb === 'm' ) {
        return false;
      }
      $this->tl->query("UPDATE " . $this->tb . " SET `gmb` = :gmb WHERE " . $this->tb . ".`id` = :id", ['gmb' => $gmb, 'id' => $data['id']]);
      $this->tl->run();
      return $this->tl->aff();
    }
    
    public function ubap($data) {
      if( $data['pass'] !== $data['pass2'] ) {
        return 'p1';
      }
      if( preg_match('.*\S.*', $data['pass3']) === 0 or strlen($data['pass3']) < 6 ) {
        return 'dgr';
      }
      $this->db->query("SELECT `pass` FROM " . $this->tb . " WHERE `id` = :id");
      $this->db->bind('id', $data['id']);
      $r = $this->db->sigl();
      if( !password_verify($data['pass3'], $r['pass']) ) {
        return 'p2';
      }
      $pass = password_hash($data['pass'], PASSWORD_DEFAULT);
      $this->tl->query("UPDATE " . $this->tb . " SET `pass` = :pass WHERE " . $this->tb . ".`id` = :id", ['pass' => $pass, 'id' => $data['id']]);
      $this->tl->run();
      return $this->tl->aff();
    }
    
  }
  
  
?>