<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function cek_login($username,$password){
        $this->db->where('password',$password);
        $this->db->where('username',$username);
        return $this->db->get('tb_admin')->result();
    }

}
