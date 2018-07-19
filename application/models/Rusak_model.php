<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Rusak_model extends CI_Model
    {

      public function select_all(){
        return $this->db->get('tb_kerusakan')->result_array();
      }

      public function select($id){
        $this->db->where('kode_kerusakan',$id);
        return $this->db->get('tb_kerusakan')->row_array();
      }

      public function insert($data){
        return $this->db->insert('tb_kerusakan',$data);
        //$query = "INSERT INTO tb_penilaian(kode_kerusakan, kode_kriteria, kode_indikator) SELECT '$field', kode_kriteria, 0 FROM tb_kriteria";
        //$this->db->query($query);
      }

      function insert_penilaian($kode_kerusakan,$kode_periode){
          return $this->db->query("INSERT INTO tb_penilaian(kode_kerusakan, kode_kriteria, kode_indikator, kode_periode)
                    SELECT '$kode_kerusakan',kode_kriteria, 0 ,'$kode_periode' FROM tb_kriteria");
      }

      public function update($id,$data){
        $this->db->where('kode_kerusakan',$id);
        $this->db->update('tb_kerusakan',$data);
      }

      public function delete($id){
        $this->db->where('kode_kerusakan',$id);
        $this->db->delete('tb_kerusakan');
      }

      public function data_rusak_periode($periode){
          $query = "SELECT * FROM tb_kerusakan r INNER JOIN tb_periode p ON r.kode_periode = p.kode_periode "
                  . "WHERE r.kode_periode = '$periode'";
          return $this->db->query($query)->result_array();
      }

        public function kode_rusak(){
            $this->db->select('RIGHT(kode_kerusakan,2) as kode',false);
            $this->db->order_by('kode_kerusakan','desc');
            $this->db->limit(1);
            $auto = $this->db->get('tb_kerusakan');
            if($auto->num_rows()<>0){
                $data = $auto->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;
            }
            $kode_kerusakan = str_pad($kode,2,'0',STR_PAD_LEFT);
            return 'A'.$kode_kerusakan;
        }
        //controllers/Nilai.php(index)
        //controllers/Analisa.php(index)
    public function actionVIEW($select,$where=array()) {
      $this->db->select($select);
      $this->db->from("tb_kerusakan K");
      $this->db->where($where);
      return $this->db->get()->result_array();
    }

    public function actionRelasi($select){
      $this->db->select($select);
      $this->db->from('tb_kerusakan K');
      $this->db->join('tb_periode P','P.kode_periode=K.kode_periode');
      $this->db->order_by('P.tanggal','DESC');

      return $this->db->get()->result_array();
    }

		public function action_result($select,$awal,$akhir){
			$this->db->select($select);
			$this->db->from('tb_kerusakan K');
			$this->db->join('tb_periode P','P.kode_periode=K.kode_periode');
			$this->db->where('P.tanggal >= ',$awal);
			$this->db->where('P.tanggal <= ',$akhir);
			$this->db->order_by('P.tanggal','DESC');

			return $this->db->get()->result_array();

		}

    }
