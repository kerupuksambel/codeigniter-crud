<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function verify_login(){
			// $this->load->library('security');
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$q = $this->db->get_where('login', array(
				'username' => $username, 
				'pwd' => $password,
				'permission' => '1'
			));

			if($q->num_rows() == 1){
				$r = $q->row();

				$data = array(
					'verified' => TRUE,
					'user' => $r->username,
				);

				$this->session->set_userdata($data);
			}else{
				$data = array(
					// 'verified' => FALSE
				);
				
				$this->session->set_userdata($data);
			}
		}
	}

/*

CI Structure
============

	Model+View
	    |
	Controller
	 	|
	 Routing
	    |
      Server
	
*/
//CSRF Protection Disabled.
?>