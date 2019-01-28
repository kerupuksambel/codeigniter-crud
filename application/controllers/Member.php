<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Member extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
		}

		function index(){
			$v = $this->session->userdata('verified');
			if($v){
				$data = array(
					"nama_user" => $this->session->userdata('user')
				);
				$this->load->view("member", $data);
			}else{
				redirect('login');
			}
		}
	}
?>