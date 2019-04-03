<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

  // Constructor
  public function __construct() {
    parent::__construct();
    $this->load->model("Authentication_Model");
  }

  public function register() {
    $data = array(
      "nome" => $this->input->post("name"),
      "email" => $this->input->post("email"),
      "password" => md5($this->input->post("password")),
      "data" => date("Y-m-d"),
      "atualizacao" => 'Novo utilizador'
    );
    
    $this->Authentication_Model->register($data);
    redirect("");
  }
  
  public function login() {
    $data = array(  
      "email" => $this->input->post("email"),
      "password" => md5($this->input->post("password"))
    );

    $result = $this->Authentication_Model->login($data);

    if($result != FALSE) {
      redirect("backoffice");
    } else {
      echo "ERRO";
      redirect("");
    }
  }

  public function forgetPassword() {
    $data = array(
      "email" => $this->input->post("email"),
      "password" => md5($this->input->post("password"))
    );
  }
  
}

?>