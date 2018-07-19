<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Penilaian_model
 *
 * @author nurul_cholis
 */
class Penilaian_model extends CI_Model{

    /*

    public function get_data(){

      $rows = $this->db->query("SELECT a.kode_kerusakan, b.kode_kriteria, c.kode_indikator FROM tb_kerusakan a
                              INNER JOIN tb_penilaian ra ON ra.kode_kerusakan = a.kode_kerusakan
                               INNER JOIN tb_kriteria b ON b.kode_kriteria = ra.kode_kriteria
                                LEFT JOIN tb_indikator c ON c.kode_indikator = ra.kode_indikator");

      return $rows->result_array();
    }

    public function relasi_nilai($periode){
        $query = "SELECT r.*, a.nama_kerusakan, c.nama_indikator FROM tb_penilaian r
                    INNER JOIN tb_kerusakan a ON a.kode_kerusakan=r.kode_kerusakan
                        LEFT JOIN tb_indikator c ON c.kode_indikator=r.kode_indikator
                            WHERE r.kode_periode = '$periode'
                                ORDER BY r.kode_kerusakan, r.kode_kriteria";
        return $this->db->query($query)->result_array();
    }
     *
     *
     */
    //controllers/Nilai.php(insert)
    //controllers/Analisa.php(index)
    public function actionCOUNT($where=array()) {
        $this->db->where($where);
        return $this->db->get("tb_penilaian P")->num_rows();
    }
    //controllers/Nilai.php(insert)
    public function actionINSERT($input) {
        $this->db->insert("tb_penilaian", $input);
    }
    //controllers/Nilai.php(insert)
    public function actionUPDATE($input,$where=array()) {
        $this->db->update("tb_penilaian", $input, $where);
    }
    //controllers/Analisa.php(index)
    public function actionVIEW($select,$where=array()) {
        $this->db->select($select);
        $this->db->from("tb_penilaian P");
        $this->db->join("tb_indikator I", "I.kode_indikator=P.kode_indikator");
        $this->db->join("tb_kerusakan K", "K.kode_kerusakan=P.kode_kerusakan");
        $this->db->where($where);
        $this->db->order_by("P.kode_kerusakan","ASC");
        return $this->db->get()->result_array();
    }

    public function laporan($select){
      $this->db->select($select);
      $this->db->from("tb_histori H");
      $this->db->join("tb_kerusakan K","K.kode_kerusakan=H.kode_kerusakan","INNER");
      $this->db->order_by("H.nilai","DESC");
      return $this->db->get()->result_array();
    }
}
