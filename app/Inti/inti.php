<?php
//Inti App

//Routing (App)
class app {

  protected $ctrl = 'home';
  protected $mthd = 'index';
  protected $params = [];

  public function __construct() {
    $url = $this->PchUrl();

    if ($url == NULL) {
      $url = [$this->ctrl];
    }


    //Controller
    if (file_exists('app/Ctrl/' . $url[0] . '.php')) {
      $this->ctrl = $url[0];
      unset($url[0]);
    }
    require_once 'app/Ctrl/' . $this->ctrl . '.php';
    $this->ctrl = new $this->ctrl;


    //Method
    if (isset($url[1])) {
      if (method_exists($this->ctrl, $url[1])) {
        $this->mthd = $url[1];
        unset($url[1]);
      }
    }


    //Params
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    call_user_func_array([$this->ctrl, $this->mthd], $this->params);
  }

  public function PchUrl() {
    if (isset($_GET['url'])) {
      $rl = rtrim($_GET['url'], '/');
      $rl = filter_var($rl, FILTER_SANITIZE_URL);
      $rl = explode('/', $rl);
      return $rl;
    }
  }
}

//Controller
class ctrl {
  public function view($view, $data = []) {
    require_once 'app/View/' . $view . '.php';
  }
  public function model($model) {
    require_once 'app/Model/' . $model . '.php';
    return new $model;
  }
}

//Tools
class Tool {
  private $host = HOST, $user = DB_USER,$pass = DB_PASS, $db = DB_NAME, $dbh, $stmt;

  public function __construct() {
    $drv = new mysqli_driver();
    $drv->report_mode = "MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT";
    try {
      $this->dbh = new mysqli($this->host, $this->user, $this->pass, $this->db);
    } catch (Exception $e) {
      error_log($e->getMessage(), 3, 'errr.log');
      die('Kesalahan tak terduga');
    }
  }

  public function query($q, $arl = null) {
    if ($arl !== null) {
      $ptr = "|(:[a-zA-Z0-9]+)|";
      if (preg_match_all($ptr, $q, $mt)) {
        $arr = $mt[0];
        $tip = '';
        $val = [];
        foreach ($arr as $kt) {
          $h = ltrim($kt, ':');
          switch (gettype($arl[$h])) {
            case 'integer':
              $tip .= 'i';
              break;
            case 'double':
              $tip .= 'd';
              break;
            case 'blob':
              $tip .= 'b';
              break;
            default:
              $tip .= 's';
              break;
          }
          $val[] = $arl[$h];
        }
      }
      $q = preg_replace($ptr, '?', $q);
    }
    $this->stmt = $this->dbh->prepare($q);
    if ($arl !== null) {
      $this->stmt->bind_param($tip, ...$val);
    }
  }

  public function run() {
    $this->stmt->execute();
  }

  public function fetch() {
    $this->run();
    $res = $this->stmt->get_result();
    $r = [];
    while ($ro = $res->fetch_array(MYSQLI_ASSOC)) {
      $r[] = $ro;
    }
    return $r;
  }

  public function aff() {
    return $this->dbh->affected_rows;
  }

  public function numr() {
    $this->run();
    $res = $this->stmt->get_result();
    $r = $res->num_rows;
    return $res->num_rows;
  }

  public function upf() {
    $err = $_FILES["gmb"]["error"];
    if ($err === 4) {
      return 'gmb';
    }

    $nf = $_FILES["gmb"]["name"];
    $uf = $_FILES["gmb"]["size"];
    $tmpn = $_FILES["gmb"]["tmp_name"];


    $egv = ['jpg',
      'jpeg',
      'png'];
    $eg = explode('.', $nf);
    $eg = strtolower(end($eg));
    if (!in_array($eg, $egv)) {
      Flasher::setFlash('Bukan format jpg,jpeg,png !', '.', 'dgr');
      return 'ex';
    }

    if ($uf > 2500000) {
      Flasher::setFlash('File lebih dari 2,5mb !', '.', 'dgr');
      return 'w';
    }

    if ($uf === 0) {
      Flasher::setFlash('File kosong !', '.', 'dgr');
      return 'm';
    }

    $nfb = uniqid() . '.' . $eg;

    move_uploaded_file($tmpn, "aset/img/" . $nfb);
    return $nfb;
  }

}

//Flasher
class Flasher {
  public static function setFlash($pesan, $aksi, $tipe) {
    $_SESSION['flash'] = [
      'pesan' => $pesan,
      'aksi' => $aksi,
      'tipe' => $tipe
    ];
  }

  public static function Flash() {
    if (isset($_SESSION['flash'])) {
      echo '
        <div class="alt ' . $_SESSION['flash']['tipe'] . '">
          <span><strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '</span><i class="fas fa-times"></i>
        </div>
        ';
      unset($_SESSION['flash']);
    }
  }
}




?>