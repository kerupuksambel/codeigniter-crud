<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
		}

		function index(){
			$v = $this->session->userdata('verified');
			if(isset($v)){
				redirect('member');
			}else{
				redirect('login');
			}
		}
	}
?>