<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_model extends CI_Model {
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function set_data($id = NULL){
			$name = $this->security->xss_clean($this->input->post('name'));
			$content = $this->security->xss_clean($this->input->post('content'));

			$q = array(
				'data_name' => $name,
				'data_value' => $content
			);

			if($id === NULL){
				$query = $this->db->insert('data', $q);
			}else{
				$this->db->where('id', $id);
				$query = $this->db->update('data', $q);
				if(!$query){
					$r = array(
						'stat' => false
					);

					return $r;
				}
			}

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

		public function get_data($id = NULL){
			if($id !== NULL){
				$q = array(
					'id' => $id, 
				);

				$query = $this->db->get_where('data', $q);
				if($query->num_rows() == 0){
					show_404();
				}else{
					return $query->result_array();
				}
			}

			$query = $this->db->get('data');
			$result = $query->result_array();
			return $result;
		}

		public function delete_data($id){
			$q = array(
				'id' => $id
			);
			$query = $this->db->delete('data', $q);
			if($query){
				return true;
			}else{
				return false;
			}
		}
	}
?>