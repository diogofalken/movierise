<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

  // Constructor
  public function __construct() {
    parent::__construct();
    $this->load->model("Movies_Model");
  }

  public function insertMovie() {
    $movie_id = $this->input->get("id");
    $jsonurl = "http://www.omdbapi.com/?i={$movie_id}&apikey=a4c49050";
    $json = file_get_contents($jsonurl);
    $jsondata = json_decode($json, true);

    $data = array(
      "id" => $movie_id,
      "nome" => $jsondata['Title'],
      "descricao" => $jsondata['Plot'],
      "poster" => $jsondata['Poster'],
      "data" => date("Y-m-d"),
      "type" => $jsondata['Type']
    );

    $this->Movies_Model->insertMovie($data);
    redirect('backoffice');
  }

  public function removeMovie() {
    $this->Movies_Model->removeMovie($this->input->post("id"));
    redirect('backoffice');
  }
}

?>