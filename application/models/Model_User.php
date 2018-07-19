<?php

class Model_User extends CI_Model {

  public function get_user($id) {
    $this->db->where('id_user',$id);
    $query = $this->db->get('admin');
    return $query->result_array();
  }
}


 ?>
