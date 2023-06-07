<?php
  
  class home extends ctrl {
    
    public function index() {
      $data['jud'] = 'NR Web';
      $this->view('a/hdr', $data);
      $this->view('home/index');
      $this->view('a/ftr');
    }
  }
  
  
?>