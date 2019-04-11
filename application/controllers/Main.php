<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function view($page = "home") {
		// Senao for uma das paginas que estão nas views vai dar erro
		if (!file_exists(APPPATH."views/pages/{$page}.php")) {
      show_404();
		}

		$this->loadPage($page);
	}

	private function loadPage($page) {
		switch($page) {
			case "backoffice": 
			if(!$this->session->userdata("email")) {
				redirect();
			}
			default:
			$this->load->view("pages/{$page}", $this->getTiles());
			
		}
	}

	private function getTiles() {
		$this->load->model("Movies_Model");
		$this->load->model("Authentication_Model");

		$media["media"] = $this->Movies_Model->getTiles();
		$media["clients"] = $this->Authentication_Model->getAllClients();

		return $media;
	}
}

?>