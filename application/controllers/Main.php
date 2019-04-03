<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function view($page = "home") {
		// Senao for uma das paginas que estão nas views vai dar erro
		if (!file_exists(APPPATH."views/pages/{$page}.php")) {
      show_404();
		}

	$this->load->model("Movies_Model");
	$media["media"] = $this->Movies_Model->getTiles();
	
	$this->load->view("pages/{$page}", $media);
	}
}

?>