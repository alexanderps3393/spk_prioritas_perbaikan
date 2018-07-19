<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logic
 *
 * @author nurul_cholis
 */
class Logic extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            [
                "kd_subkriteria" => "Z1",
                "att" => "Benefit",
                "bobot"=>3,
                "data" => [
                    [
                        "nik" => "A1",
                        "nilai" => 1
                    ], [
                        "nik" => "A2",
                        "nilai" => 0.9
                    ], [
                        "nik" => "A3",
                        "nilai" => 0.8
                    ]
                ]
            ], [
                "kd_subkriteria" => "Z2",
                "att" => "Benefit",
                "bobot"=>2,
                "data" => [
                    [
                        "nik" => "A1",
                        "nilai" => 0.8
                    ], [
                        "nik" => "A2",
                        "nilai" => 0.6
                    ], [
                        "nik" => "A3",
                        "nilai" => 1
                    ]
                ]
            ], [
                "kd_subkriteria" => "Z3",
                "bobot"=>5,
                "att" => "Cost",
                "data" => [
                    [
                        "nik" => "A1",
                        "nilai" => 0.7
                    ], [
                        "nik" => "A2",
                        "nilai" => 1
                    ], [
                        "nik" => "A3",
                        "nilai" => 0.9
                    ]
                ]
            ]
        ];


//        HANYA CETAK
        $header = array();
        foreach ($data as $value) {
            array_push($header, $value['kd_subkriteria']);
        }
        echo '<table border="1" style="width:100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th></th>';
        for ($index = 0; $index < count($header); $index++) {
            echo '<th>' . $header[$index] . '</th>';
        }
        echo '</tr>';
        echo '<thead>';
        echo '<tbody>';
        $A = ["A1", "A2", "A3"];
        for ($ind = 0; $ind < count($A); $ind++) {
            echo '<tr>';
            echo '<td>' . $A[$ind] . '</td>';
            foreach ($data as $value) {
                foreach ($value['data'] as $val) {
                    if ($val['nik'] == $A[$ind]) {
                        echo '<td>' . $val['nilai'] . '</td>';
                    }
                }
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';



        //mencari nilai max
        $index = 0;
        foreach ($data as $value) {
            $min_or_max = 0;
            $nilai = "";
            if ($value['att'] == "Benefit") {
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
            $data[$index]['min_or_max'] = $min_or_max;
            $index++;
        }
        echo json_encode($data);
echo '<br/>';
echo '<br/>';


        foreach ($data as $keys => $value) {
            //membagi
            for ($i = 0; $i < count($value['data']); $i++) {
                if ($value['att'] == 'Benefit') {
                    $data[$keys]['data'][$i]['nilai']= $value['data'][$i]['nilai'] / $value['min_or_max'];
                } else {
                    $data[$keys]['data'][$i]['nilai']=$value['min_or_max']/$value['data'][$i]['nilai'];
                }
                echo $data[$keys]['data'][$i]['nilai'].'<br/>';
            }
        }
        
        
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        echo json_encode($data);
        
        
        
        //        HANYA CETAK
        $header = array();
        foreach ($data as $value) {
            array_push($header, $value['kd_subkriteria']);
        }
        echo '<table border="1" style="width:100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th></th>';
        for ($index = 0; $index < count($header); $index++) {
            echo '<th>' . $header[$index] . '</th>';
        }
        echo '</tr>';
        echo '<thead>';
        echo '<tbody>';
        $A = ["A1", "A2", "A3"];
        for ($ind = 0; $ind < count($A); $ind++) {
            echo '<tr>';
            echo '<td>' . $A[$ind] . '</td>';
            foreach ($data as $value) {
                foreach ($value['data'] as $val) {
                    if ($val['nik'] == $A[$ind]) {
                        echo '<td>' . $val['nilai'] . '</td>';
                    }
                }
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        
        
        
        
        //Mengali dengan Bobot
        foreach ($data as $keys => $value) {
             //mengali
            for ($i = 0; $i < count($value['data']); $i++) {
                    $data[$keys]['data'][$i]['nilai']=$value['bobot']*$value['data'][$i]['nilai'];
            }
        }
        
        echo '<br/>';
        echo '<br/>';
        
        //        HANYA CETAK
        $header = array();
        foreach ($data as $value) {
            array_push($header, $value['kd_subkriteria']);
        }
        echo '<table border="1" style="width:100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th></th>';
        for ($index = 0; $index < count($header); $index++) {
            echo '<th>' . $header[$index] . '</th>';
        }
        echo '<th>SUM</th>';
        echo '</tr>';
        echo '<thead>';
        echo '<tbody>';
        $A = ["A1", "A2", "A3"];
        for ($ind = 0; $ind < count($A); $ind++) {
            echo '<tr>';
            echo '<td>' . $A[$ind] . '</td>';
            $sum=0;
            foreach ($data as $value) {
                foreach ($value['data'] as $val) {
                    if ($val['nik'] == $A[$ind]) {
                        echo '<td>' . $val['nilai'] . '</td>';
                        $sum=$sum+$val['nilai'];
                    }
                }
            }
            echo '<td>'.$sum.'</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
    public function test() {
        $this->load->library("algoritma");
         $data = [
            [
                "kd_subkriteria" => "Z1",
                "att" => "Benefit",
                "bobot"=>3,
                "data" => [
                    [
                        "nik" => "A1",
                        "nilai" => 1
                    ], [
                        "nik" => "A2",
                        "nilai" => 0.9
                    ], [
                        "nik" => "A3",
                        "nilai" => 0.8
                    ]
                ]
            ], [
                "kd_subkriteria" => "Z2",
                "att" => "Benefit",
                "bobot"=>2,
                "data" => [
                    [
                        "nik" => "A1",
                        "nilai" => 0.8
                    ], [
                        "nik" => "A2",
                        "nilai" => 0.6
                    ], [
                        "nik" => "A3",
                        "nilai" => 1
                    ]
                ]
            ], [
                "kd_subkriteria" => "Z3",
                "bobot"=>5,
                "att" => "Cost",
                "data" => [
                    [
                        "nik" => "A1",
                        "nilai" => 0.7
                    ], [
                        "nik" => "A2",
                        "nilai" => 1
                    ], [
                        "nik" => "A3",
                        "nilai" => 0.9
                    ]
                ]
            ]
        ];
        $this->algoritma->setData($data);
      
        $data=$this->algoritma->normalisasi();
        
        $data=$this->algoritma->preferensi();
          
//        HANYA CETAK
        $header = array();
        foreach ($data as $value) {
            array_push($header, $value['kd_subkriteria']);
        }
        echo '<table border="1" style="width:100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th></th>';
        for ($index = 0; $index < count($header); $index++) {
            echo '<th>' . $header[$index] . '</th>';
        }
        echo '</tr>';
        echo '<thead>';
        echo '<tbody>';
        $A = ["A1", "A2", "A3"];
        for ($ind = 0; $ind < count($A); $ind++) {
            echo '<tr>';
            echo '<td>' . $A[$ind] . '</td>';
            foreach ($data as $value) {
                foreach ($value['data'] as $val) {
                    if ($val['nik'] == $A[$ind]) {
                        echo '<td>' . $val['nilai'] . '</td>';
                    }
                }
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }

}
