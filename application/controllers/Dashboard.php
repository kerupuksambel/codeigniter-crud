<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
		}

		function index(){
			$v = $this->session->userdata('verified');
			if($v){
				$pass = array(
					"nama_user" => $this->session->userdata('user')
				);

				$data = array(
					'page' => 'member',
					'data' => $pass 
				);
				$this->load->view("member", $pass);
				// $this->load->view("template/dashboard", $data);
			}else{
				redirect('login');
			}
		}
	}
?>