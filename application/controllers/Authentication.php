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
    if ($this->session->userdata("email")) {
			redirect("backoffice");
    }
    
    $data = array(  
      "email" => $this->input->post("email"),
      "password" => md5($this->input->post("password"))
    );

    $result = $this->Authentication_Model->login($data);

    if($result != FALSE) {
      $sess_array = array(
				"nome" => $result[0]->nome,
				"email" => $result[0]->email,
			);
			// Sets new session for 5min
			$this->session->set_userdata($sess_array);
			redirect("backoffice");
    } else {
      redirect("");
    }
  }

  public function forgetPassword() {
    $data = array(
      "email" => $this->input->post("email"),
      "password" => md5($this->input->post("password"))
    );

    $this->Authentication_Model->forgetPassword($data);
    redirect(""); 
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect();
  }
}


?>