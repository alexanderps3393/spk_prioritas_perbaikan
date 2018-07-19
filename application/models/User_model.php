<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class User_model extends CI_Model
 {
   private $table = 'tb_admin';

   public function get_user()
   {
     return $this->db->get($this->table)->result_array();
   }

   public function get_one_user($id)
   {
     return $this->db->get_where($this->table,$id);
   }

   public function insert($data)
   {
     $this->db->insert($this->table,$data);
   }

   public function update_user($data,$id)
   {
     $this->db->get_where($id);
     $this->db->update($this->table,$data);
   }

   public function delete($id){
     $this->db->where('id',$id);
     $this->db->delete('tb_admin');
   }

   public function actionVIEW($select,$where=array()) {
       $this->db->select($select);
       $this->db->from("tb_admin");
       $this->db->where($where);
       return $this->db->get()->result_array();
   }

   public function actionUPDATE($input,$where=array()) {
       $this->db->update("tb_admin", $input, $where);
   }


      public function select($id){
        $this->db->where('id',$id);
        return $this->db->get('tb_admin')->row_array();
      }


 }
