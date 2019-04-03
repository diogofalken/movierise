<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movies_Model extends CI_Model {
  public function getTiles() {
    $query = $this->db->get("t_movies");
    return $query->result();
  }
}
?>