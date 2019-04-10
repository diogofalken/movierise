<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication_Model extends CI_Model {

  public function login($data) {
  
    $this->db->select("*");
    $this->db->from("t_users");
    $this->db->where("email='{$data['email']}' AND password ='{$data['password']}'");
    
    $query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		}
		return $query->result();
  }

  public function register($data) {
    if($this->verifyEmail($data['email'])) {
      $this->db->insert("t_users", $data);
    }
  }

  private function verifyEmail($email) {
    $this->db->select("*");
    $this->db->from("t_users");
    $this->db->where("email='{$email}'");

    $query = $this->db->get();

    if($query->num_rows() == 0) {
      return true; // If it not exists in db
    }
    return false; // If it already exists in db
  }
  
  public function forgetPassword($data) {
    if(!$this->verifyEmail($data['email'])) {
      $this->db->where("email='{$data['email']}'");
      $this->db->update("t_users", $data);
    }
  }
}
?>