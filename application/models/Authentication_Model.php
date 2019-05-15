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

  public function getAllClients() {
    $query = $this->db->get("t_users");
    return $query->result();
  }

  public function removeClient($id) {
    $this->db->delete("t_users", array('ID' => $id));
  }

  public function updateClient($data) {
    if(empty($this->input->post("password"))) {
      $this->db->set('nome', $data["nome"]);
      $this->db->set('atualizacao', "Alterar Nome");
    }
    if(empty($data["nome"])) {
      $this->db->set('password', $data["password"]);
      $this->db->set('atualizacao', "Alterar Password");
    } 
    if(!empty($this->input->post("password")) && !empty($data["nome"])) {
      $this->db->set('nome', $data["nome"]);
      $this->db->set('password', $data["password"]);
      $this->db->set('atualizacao', "Alterar Nome e Password");
    }
    $this->db->where('email', $data["email"]);
    $this->db->update('t_users');
  }
}
?>