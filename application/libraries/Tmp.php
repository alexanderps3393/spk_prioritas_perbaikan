<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tmp
 *
 * @author nurul_cholis
 */
class Tmp {

    //untuk menampung framewok CI -> class ini turunan dari CI
    protected $_ci;

    public function __construct(){
        $this->_ci = &get_instance();
    }

    public function display($template,$data = null){
        $data['template'] = null;

        if(is_array($template)){
           for($i = 0; $i < count($template); $i++){
               $data['template'] .= $this->_ci->load->view($template[$i],$data,TRUE);
           }
        }else{
            //TRUE utk diturunkan ke view lain
           $data['template'] = $this->_ci->load->view($template,$data,TRUE);
        }
        $this->_ci->load->view('template/index',$data);
    }
}
