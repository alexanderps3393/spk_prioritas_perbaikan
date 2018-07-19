<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Periode_model extends CI_Model
    {

      public function select_all(){
          $query = $this->db->get('tb_periode')->result_array();
          return $query;
      }

      public function select($id){
        $this->db->where('kode_periode',$id);
        $query = $this->db->get('tb_periode');
        return $query->row_array();
      }

      public function insert($data){
        return $this->db->insert('tb_periode',$data);
      }

      public function update($id,$data){
        $this->db->where('kode_periode',$id);
        $this->db->update('tb_periode',$data);
      }

      public function delete($id){
        $this->db->where('kode_periode',$id);
        $this->db->delete('tb_periode');
      }

      public function kode_periode(){
          $this->db->select('RIGHT(kode_periode,3) as kode',false);
          $this->db->order_by('kode_periode','desc');
          $this->db->limit(1);
          $auto = $this->db->get('tb_periode');
          if($auto->num_rows()<>0){
              $data = $auto->row();
              $kode = intval($data->kode)+1;
          }else{
              $kode = 1;
          }
          $kode_periode = str_pad($kode,3,'0',STR_PAD_LEFT);
          return 'P'.$kode_periode;
      }
    }
