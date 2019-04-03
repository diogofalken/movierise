<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication_Model extends CI_Model {

  public function login($data) {
  
    $this->db->select("email");
    $this->db->from("t_users");
    $this->db->where("email='{$data['email']}' AND password ='{$data['password']}'");
    
    $query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		}
		return $query->result();
  }

  public function register($data) {
    // Verify if there is already this email in db
    $this->db->select("*");
    $this->db->from("t_users");
    $this->db->where("email='{$data['email']}'");

    $query = $this->db->get();

    if($query->num_rows() == 0) {
      $this->db->insert("t_users", $data);
    }
  }
}
?>