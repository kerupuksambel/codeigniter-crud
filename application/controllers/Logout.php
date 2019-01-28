<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Logout extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
		}

		function index(){
			session_destroy();
			redirect('login');
		}
	}
?>