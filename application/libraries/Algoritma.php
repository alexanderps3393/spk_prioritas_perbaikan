<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Algoritma
 *
 * @author nurul_cholis
 */
class Algoritma {
    protected $_ci;
    private $_data;
    
    public function __construct() {
        $this->_ci=&get_instance();
        $this->_data=array();
    }
    public function setData($data) {
        $this->_data=$data;
    }
    
    public function normalisasi() {
        //mencari nilai max
        $index = 0;
        foreach ($this->_data as $value) {
            $min_or_max = 0;
            $nilai = "";
            if ($value['att'] == "BENEFIT") {
                foreach ($value['data'] as $key => $val) {
                    if ($key == 0) {
                        $min_or_max = $val['nilai'];
                    } else {
                        if ($min_or_max < $val['nilai']) {
                            $min_or_max = $val['nilai'];
                        }
                    }
                }
            } else {
                foreach ($value['data'] as $key => $val) {
                    if ($key == 0) {
                        $min_or_max = $val['nilai'];
                    } else {
                        if ($min_or_max > $val['nilai']) {
                            $min_or_max = $val['nilai'];
                        }
                    }
                }
            }
            $this->_data[$index]['min_or_max'] = $min_or_max;
            $index++;
        }
        foreach ($this->_data as $keys => $value) {
            //membagi
            for ($i = 0; $i < count($value['data']); $i++) {
                if ($value['att'] == 'BENEFIT') {
                    $this->_data[$keys]['data'][$i]['nilai']= $value['data'][$i]['nilai'] / $value['min_or_max'];
                } else {
                    $this->_data[$keys]['data'][$i]['nilai']=$value['min_or_max']/$value['data'][$i]['nilai'];
                }
            }
        }
        return $this->_data;
    }
    
    public function preferensi() {
         //Mengali dengan Bobot
        foreach ($this->_data as $keys => $value) {
             //mengali
            for ($i = 0; $i < count($value['data']); $i++) {
                $this->_data[$keys]['data'][$i]['nilai']=$value['bobot']*$value['data'][$i]['nilai'];
            }
        }
        return $this->_data;
    }
    
    public function get_rank() {
        arsort($this->_data); // value descending
        $no = 1;
        //$new = array();
        foreach ($this->_data as $key => $value) {
            $this->_data[$key] = $no++;
        }
        return $this->_data;
    }

}
