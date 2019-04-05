<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movies_Model extends CI_Model {
  private function verifyID($id) {
    $this->db->select("*");
    $this->db->from("t_movies");
    $this->db->where("id='{$id}'");

    $query = $this->db->get();

    if($query->num_rows() == 0) {
      return true; // If it not exists in db
    }
    return false; // If it already exists in db
  }
  
  public function getTiles() {
    $query = $this->db->get("t_movies");
    return $query->result();
  }

  public function insertMovie($data) {
    if($this->verifyID($data['id'])) {
      $this->db->insert("t_movies", $data);
    }
  }
}
?>