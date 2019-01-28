<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_model extends CI_Model {
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function set_data(){
			$name = $this->security->xss_clean($this->input->post('name'));
			$content = $this->security->xss_clean($this->input->post('content'));

			$q = array(
				'data_name' => $name,
				'data_value' => $content
			);
			$query = $this->db->insert('data', $q);
			if($this->db->affected_rows() == 1){
				//Success
				$r = array(
					'stat' => true,
					'name' => $name,
					'content' => $content 
				);
			}else{
				//Fail
				$r = array(
					'stat' => false
				);
			}

			return $r;
		}

		public function get_data(){
			$q = array(
				'' => 'a'
			);

			$query = $this->db->get('data');
			$result = $query->result_array();
			return $result;
		}

		public function delete_data(){}
	}
?>