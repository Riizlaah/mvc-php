<?php
  
  class abdat extends ctrl {
    
    public function index() {
      
      $data['jud'] = 'AbData';
      $data['abdat'] = $this->model('datam')->getData();
      $this->view('a/hdr', $data);
      $this->view('abdat/index', $data);
      $this->view('a/ftr');
    }
    
    public function ubah($id) {
      $data['jud'] = 'Ubah AbData';
      $data['ud'] = $this->model('datam')->getDataBI($id);
      $this->view('a/hdr', $data);
      $this->view('abdat/ubah', $data);
      $this->view('a/ftr');
    }
    
    public function cari() {
      
      $data['jud'] = 'AbData';
      $data['abdat'] = $this->model('datam')->cariData();
      $this->view('a/hdr', $data);
      $this->view('abdat/index', $data);
      $this->view('a/ftr');
    }
    
    public function tambah() {
      if( $this->model('datam')->tAbDat($_POST) > 0 ) {
        Flasher::setFlash('Data Berhasil', 'ditambahkan', 'suc');
        header('Location: ' . BASEURL . 'abdat');
        exit;
      } else {
        Flasher::setFlash('Data Gagal', 'ditambahkan', 'dgr');
        header('Location: ' . BASEURL . 'abdat');
        exit;
      }
    }
    
    public function hapus($id) {
      if( $this->model('datam')->hapusD($id) > 0 ) {
        Flasher::setFlash('Berhasil', 'dihapus', 'suc');
        header('Location: ' . BASEURL . 'abdat');
        exit;
      } else {
        Flasher::setFlash('Gagal', 'dihapus', 'dgr');
        header('Location: ' . BASEURL . 'abdat');
        exit;
      }
    }
    
    public function ub() {
      $ubh = $this->model('datam')->ubahD($_POST);
      if( $ubh > 0 ) {
        Flasher::setFlash('Berhasil', 'diubah', 'suc');
        header('Location: ' . BASEURL . 'abdat');
        exit;
      } else if( $ubh === 0 ) {
        Flasher::setFlash('Tidak', 'diubah', 'suc');
        header('Location: ' . BASEURL . 'abdat');
        exit;
      } else {
        Flasher::setFlash('Gagal', 'diubah', 'dgr');
        header('Location: ' . BASEURL . 'abdat');
        exit;
      }
    }
  }
  
  
?>