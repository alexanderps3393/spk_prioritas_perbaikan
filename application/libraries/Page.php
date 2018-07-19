<?php

 class Page
 {
   
   protected $_ci;

    public function __construct() {
       $this->_ci = &get_instance();
    }

    public function render_page($content,$data=null){
      $value = [
          //'header' => $this->_ci->load->view('header',$data,TRUE),
          'isi'    => $this->_ci->load->view($content,$data,TRUE)
          //'footer' => $this->_ci->load->view('footer',$data,TRUE)
      ];

      $this->_ci->load->view('index',$value);
   }
   
   
   
 }
