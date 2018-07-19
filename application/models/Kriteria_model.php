<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Kriteria_model extends CI_Model
    {

      public function select_all(){
        return $this->db->get('tb_kriteria')->result_array();
      }

      public function select($id){
        $this->db->where('kode_kriteria',$id);
        return $this->db->get('tb_kriteria')->row_array();
      }

      /*
      public function insert($data,$field){
        $this->db->insert('tb_kriteria',$data);
        $query = "INSERT INTO tb_penilaian(kode_kerusakan, kode_kriteria, kode_indikator) SELECT kode_kerusakan, '$field', 0  FROM tb_kerusakan";
        $this->db->query($query);
      }
      */

      public function insert($data){
        return $this->db->insert('tb_kriteria',$data);
      }

      
      public function insert_penilaian($kode_kriteria){
          return $this->db->query("INSERT INTO tb_penilaian(kode_kerusakan, kode_kriteria, kode_indikator) SELECT kode_kerusakan, '$kode_kriteria', 0  FROM tb_kerusakan");
      }

      public function update($id,$data){
        $this->db->where('kode_kriteria',$id);
        $this->db->update('tb_kriteria',$data);
      }

      public function delete($id){
        $this->db->where('kode_kriteria',$id);
        $this->db->delete('tb_kriteria');
      }
      
      public function relasi_kriteria(){
          $query = "SELECT * FROM tb_penilaian pk INNER JOIN tb_kriteria k ON k.kode_kriteria=pk.kode_kriteria";
          return $this->db->query($query)->result_array();
      }

        public function kode_kriteria(){
            $this->db->select('RIGHT(kode_kriteria,2) as kode',false);
            $this->db->order_by('kode_kriteria','desc');
            $this->db->limit(1);
            $auto = $this->db->get('tb_kriteria');
            if($auto->num_rows()<>0){
                $data = $auto->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;
            }
            $kode_kriteria = str_pad($kode,2,'0',STR_PAD_LEFT);
            return 'C'.$kode_kriteria;
        }
        //controllers/Nilai.php(index)
        //controllers/Analisa.php(index)
        public function actionVIEW($select,$where=array()) {
            $this->db->select($select);
            $this->db->from("tb_kriteria KT");
            $this->db->where($where);
            return $this->db->get()->result_array();
        }

    }
