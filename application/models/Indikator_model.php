<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Indikator_model extends CI_Model
    {

       public function select_all(){
            $query = $this->db->get('tb_indikator')->result_array();
            return $query;
        }
        
        public function select($id){
            $this->db->where('kode_indikator',$id);
            return $this->db->get('tb_indikator')->row_array();
        }
        
        public function insert($data){
            $this->db->insert('tb_indikator',$data);
        }
        
        public function update($id,$data){
            $this->db->where('kode_indikator',$id);
            $this->db->update('tb_indikator',$data);
        }
        
        public function delete($id){
            $this->db->where('kode_indikator',$id);
            $this->db->delete('tb_indikator');
        }
        
        public function relasi_indikator($kriteria){
           $query ="SELECT * FROM tb_indikator i INNER JOIN tb_kriteria k ON i.kode_kriteria = k.kode_kriteria WHERE i.kode_kriteria = '$kriteria'";
            return $this->db->query($query)->result_array();
        }
        //controllers/Nilai.php(index)
        public function actionVIEW($select,$where=array()) {
            $this->db->select($select);
            $this->db->from("tb_indikator I");
            $this->db->where($where);
            return $this->db->get()->result_array();
        }
    }
