<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');	
		}

		public function index($data = array()){
			$this->load->library('session');

			$p = $this->session->userdata('verified');
			if($p){
				redirect('member');
			}else{
				$this->load->view('login', $data);
			}
		}

		public function verify(){
			$this->load->helper('url');
			$this->load->model('login_model');
			$this->login_model->verify_login();

			$v = $this->session->verified;

			//	This process should be using redirection, as the member can only entered the member page once
			//right after they logged in

			if($v){
				$data = array(
					'nama_user' => $this->session->user
				);

				redirect('member');
			}else{
				$data = array(
					'msg' => "Data Anda salah."
				);
				$this->index($data);
			}
		}
	}
?>