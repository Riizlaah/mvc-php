<?php
  
  class login extends ctrl {
    
    public function index() {
      if( isset($_SESSION['login']) ) {
        $data['inf'] = $this->model('loginm')->cSD();
      }
      $data['jud'] = "Profil";
      $this->view('a/hdrl', $data);
      $this->view('login/index', $data);
      $this->view('a/ftr');
      
    }
    
    public function daftar() {
      if( !isset($_SESSION['login']) ) {
        $data['jud'] = "Daftar";
        $this->view('a/hdrl', $data);
        $this->view('login/daftar');
        $this->view('a/ftr');
      } else {
        header("Location: " . BASEURL . "login");
        exit;
      }
    }
    
    public function masuk() {
      if( isset($_COOKIE['di']) && isset($_COOKIE['yek']) ) {
        $this->model('loginm')->cook();
      }
      if( !isset($_SESSION['login']) ) {
        $data['jud'] = "Login";
        $this->view('a/hdrl', $data);
        $this->view('login/login');
        $this->view('a/ftr');
      } else {
        header("Location: " . BASEURL . "login");
        exit;
      }
    }
    
    public function logot() {
      $this->model('loginm')->logot();
    }
    
    public function ubah($par, $id) {
      if( $par === 'p' && isset($_SESSION['login']) ) {
        $data['jud'] = 'Ubah Password';
        $data['inf'] = $this->model('loginm')->gbid($id);
        $this->view('a/hdrl', $data);
        $this->view('login/pass', $data);
        $this->view('a/ftr');
        
      } else if( $par === 'g' && isset($_SESSION['login']) ) {
        $data['jud'] = 'Ubah Foto Profil';
        $data['inf'] = $this->model('loginm')->gbid($id);
        $this->view('a/hdrl', $data);
        $this->view('login/gmb', $data);
        $this->view('a/ftr');
        
      } else {
        header("Location: " . BASEURL . "login");
        exit;
      }
    }
    
    public function logind() {
      if( $this->model('loginm')->login($_POST) == 'suc' ) {
        Flasher::setFlash('Berhasil', 'Login', 'suc');
        header("Location: " . BASEURL . "login");
        exit;
      } else if( $this->model('loginm')->login($_POST) == 'user' ) {
        Flasher::setFlash('Username tidak ada !', ', gagal login', 'dgr');
        header("Location: " . BASEURL . "login/masuk");
        exit;
      } else if( $this->model('loginm')->login($_POST) ) {
        Flasher::setFlash('Password salah', ', gagal login', 'dgr');
        header("Location: " . BASEURL . "login/masuk");
        exit;
      }
    }
    
    public function regis() {
      $t = $this->model('loginm')->daftar($_POST);
      if( $t > 0 ) {
        Flasher::setFlash('Berhasil', 'membuat akun', 'suc');
        header("Location: " . BASEURL . "login/masuk");
        exit;
      } else if( $t === 'user' ) {
        Flasher::setFlash('Nama user sudah ada', ', Gagal membuat akun', 'dgr');
        header("Location: " . BASEURL . "login/daftar");
        exit;
      } else if( $t === 'np' ) {
        Flasher::setFlash('kata sandi kurang dari 6 karakter', ', Gagal membuat akun', 'dgr');
        header("Location: " . BASEURL . "login/daftar");
        exit;
      } else if( $t === 'pass' ) {
        Flasher::setFlash('Password Tidak sama', ', Gagal membuat akun', 'dgr');
        header("Location: " . BASEURL . "login/daftar");
        exit;
      } else if( $t === 'capt' ) {
        Flasher::setFlash('Kode Captcha Tidak sama', ', Gagal membuat akun', 'dgr');
        header("Location: " . BASEURL . "login/daftar");
        exit;
      } else {
        Flasher::setFlash('Ada kesalahan tak terduga', ', Gagal membuat akun', 'dgr');
        header("Location: " . BASEURL . "login");
        exit;
      }
    }
    
    public function ubg() {
      if( $this->model('loginm')->ubag($_POST) > 0 ) {
        Flasher::setFlash('Foto berhasil diganti', ', proses berhasil', 'suc');
        header("Location: " . BASEURL . "login");
        exit;
      } else if( $this->model('loginm')->ubag($_POST) === 'not' ) {
        Flasher::setFlash('Foto profil tetap', ', tidak diganti', 'suc');
        header("Location: " . BASEURL . "login");
        exit;
      } else {
        Flasher::setFlash('Foto profil gagal diupload !', '', 'dgr');
        header("Location: " . BASEURL . "login");
        exit;
      }
    }
    
    public function ubp() {
      if( $this->model('loginm')->ubap($_POST) > 0 ) {
        Flasher::setFlash('Password', 'berhasil diubah !', 'suc');
        header("Location: " . BASEURL . "login");
        exit;
      } else if( $this->model('loginm')->ubap($_POST) === 'p1' ) {
        Flasher::setFlash('Konfirmasi password berbeda !', '', 'dgr');
        header("Location: " . BASEURL . "login");
        exit;
      } else if( $this->model('loginm')->ubap($_POST) === 'dgr' ) {
        //Flasher::setFlash('?', ',?', 'dgr');
        header("Location: https://google.com/");
        exit;
      } else if( $this->model('loginm')->ubap($_POST) === 'p2' ) {
        Flasher::setFlash('Password lama berbeda !', '', 'dgr');
        header("Location: " . BASEURL . "login");
        exit;
      }
    }
    
  }
  
  
?>