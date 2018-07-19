<?php

 class MY_Controller extends CI_Controller
 {
   function render_page($content,$data=null)
   {
     $data['header'] = $this->load->view('header',$data,TRUE);
     $data['isi']    = $this->load->view($content,$data,TRUE);
     $data['footer'] = $this->load->view('footer',$data,TRUE);

     $this->load->view('index',$data);
   }
 }
