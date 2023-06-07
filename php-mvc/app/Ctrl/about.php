<?php
  
  class about extends ctrl {
    
    public function index() {
      $data['jud'] = 'Tentang Saya';
      $this->view('a/hdr', $data);
      $this->view('about/index');
      $this->view('a/ftr');
    }
    public function creator() {
      $data['jud'] = 'Tentang Pembuat';
      $this->view('a/hdr', $data);
      $this->view('about/creator');
      $this->view('a/ftr');
    }
  }
  
  
?>