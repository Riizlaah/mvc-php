<?php

class datam {
  private $tb = "`abdat`", $tl;

  public function __construct() {

    $this->tl = new Tool();
  }

  public function getData() {
    $this->tl->query("SELECT * FROM " . $this->tb);
    return $this->tl->fetch();
  }

  public function getDataBI($id) {
    $this->tl->query("SELECT * FROM " . $this->tb . " WHERE `id` = :id", ['id' => $id]);
    return $this->tl->fetch();
  }

  public function tAbDat($data) {
    $gmb = $this->tl->upf();
    if ($gmb === 'gmb') {
      Flasher::setFlash('Gambar tidak ada !', '.', 'dgr');
      return false;
    }
    if ($gmb === 'ex' or $gmb === 'w' or $gmb === 'm') {
      return false;
    }
    $q = "INSERT INTO " . $this->tb . " (`id`, `nama`, `umur`, `kota`, `gmb`) VALUES (NULL, :nama, :umur, :kota, :gmb)";
    $this->tl->query($q, [ 'nama' => $data['nama'], 'umur' => $data['umur'], 'kota' => $data['kota'], 'gmb' => $gmb]);
    $this->tl->run();
    return $this->tl->aff();
  }

  public function hapusD($id) {
    $this->tl->query("SELECT `gmb` FROM " . $this->tb . " WHERE `id` = :id", ['id' => $id]);
    $row = $this->tl->fetch();
    foreach($row as $v) {
      unlink("aset/img/" . $v['gmb']);
    }
    $q = "DELETE FROM " . $this->tb . " WHERE `id` = :id";
    $this->tl->query($q, ['id' => $id]);
    $this->tl->run();
    return $this->tl->aff();
  }

  public function ubahD($data) {
    $gmb = $this->tl->upf();
    if($gmb === 'gmb') {
      $gmb = $data['gmbl'];
    } else if ($gmb === 'ex' or $gmb === 'w' or $gmb === 'm') {
      return false;
    }
    if( $gmb !== 'gmb' && $data['gmbl'] !== 'klasik.jpg') {
      unlink('aset/imgg/' . $data['gmbl']);
    }

    $q = "UPDATE " . $this->tb . " SET `nama` = :nama, `umur` = :umur, `kota` = :kota, `gmb` = :gmb WHERE " . $this->tb . ".`id` = :id";
    $this->tl->query($q, ['nama' => $data['nama'], 'umur' => $data['umur'], 'kota' => $data['kota'], 'gmb' => $gmb, 'id' => $data['id']]);
    $this->tl->run();
    return $this->tl->aff();
  }

  public function cariData() {
    $k = $_POST['key'];
    $q = "SELECT * FROM " . $this->tb . " WHERE `nama` LIKE :key";
    $this->tl->query($q, ['key' => "%$k%"]);
    return $this->tl->fetch();
  }
}
?>