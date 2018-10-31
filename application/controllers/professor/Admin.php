<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	
	public function index() {

		$this->load->view('professor/index_admin_professor_tpl');

	}



	
}
