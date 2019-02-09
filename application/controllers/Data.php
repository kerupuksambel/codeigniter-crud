<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Data extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('data_model');
		}

		public function index($act = "", $id = NULL){
			$this->load->library('session');
			$this->load->helper('url');
			$s = $this->session->userdata('verified');
			if($s){
				switch ($act) {
					case 'add':
						$this->add();
						break;

					case 'view':
						if($id === NULL){
							$this->view();
						}else{
							$this->view($id);
						}
						break;

					case 'update':
						$this->update($id);
						break;

					case 'delete':
						if($id === NULL){
							$this->delete();
						}else{
							$this->delete($id);
						}
						break;

					case "":
						redirect('dashboard');
						break;

					case 'toggle':
						if($id === NULL){
							$this->toggle();
						}else{
							$this->toggle($id);
						}
						break;

					default:
						show_404();
						break;
				}
			}else{
				redirect('login');
			}
		}

		private function add(){
			if(!isset($_POST)){
				$this->load->view('data/add');
			}else{
				//Verifying the input
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('content', 'Content', 'required');

				if($this->form_validation->run() === TRUE){
					$r = $this->data_model->set_data();
					if(!$r['stat']){
						$this->load->view('data/add');
					}else{
						$data = array(
							'name' => $r['name'],
							'content' => $r['content']
						);

						$p = array(
							'page' => 'data/success',
							'data' => $data
						);

						$this->load->view('template/dashboard', $p);

						unset($_POST);
					}
				}else{
					$p = array('page' => 'data/add', 'data' => NULL);

					$this->load->view('template/dashboard', $p);
				}
			}
		}

		private function view($id = NULL){
			if($id === NULL){
				$data['arr'] = $this->data_model->get_data();
				$p = array(
					'page' => 'data/view',
					'data' => $data
				);

				$this->load->view("template/dashboard", $p);
			}else{
				$data['arr'] = $this->data_model->get_data($id);
				$p = array(
					'page' => 'data/view_item',
					'data' => $data
				);

				$this->load->view("template/dashboard", $p);
			}
		}

		private function update($id = NULL){
			if($id === NULL){
				$p = $this->data_model->get_data();

				$data = array(
					'rows' => $p,
					'link' => "update",
					'act' => "Update"
				);

				$p = array(
					'page' => 'data/list',
					'data' => $data
				);

				$this->load->view("template/dashboard", $p);
			}else{
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('content', 'Content', 'required');

				if($this->form_validation->run() === FALSE){
					$p = $this->data_model->get_data($id);
					if(count($p) != 0){
						$in = array(
							'nama' => $p[0]['data_name'],
							'konten' => $p[0]['data_value'],
							'id' => $id
						);

						$p = array(
							'page' => 'data/update',
							'data' => $in
						);

						$this->load->view("template/dashboard", $p);
					}else{
						show_404();
					}
				}else{
					$r = $this->data_model->set_data($id);
					if($r['stat'] == TRUE){
						//Sending messages to data/update
						echo "Bisa diubah";
					}else{
						echo "Tidak bisa diubah";
					}
					redirect("data/update");
				}
			}
		}

		private function delete($id = NULL){
			if($id === NULL){
				$p = $this->data_model->get_data();

				$data = array(
					'rows' => $p,
					'link' => "delete",
					'act' => "Delete"
				);

				$p = array(
					'page' => 'data/list',
					'data' => $data
				);

				$this->load->view("template/dashboard", $p);
			}else{
				$stat = $this->data_model->delete_data($id);
				if($stat){
					redirect("data/delete");
				}else{
					show_404();
				}
			}
		}

		private function toggle($id = NULL){
			if($id === NULL){
				$p = $this->data_model->get_data();

				$data = array(
					'rows' => $p
				);

				$p = array(
					'page' => 'data/list_toggle',
					'data' => $data
				);

				$this->load->view("template/dashboard", $p);
			}else{
				$p = $this->data_model->toggle_data($id);

				if($p){
					redirect('data/toggle');
				}else{
					show_404();
				}
			}
		}
	}
?>