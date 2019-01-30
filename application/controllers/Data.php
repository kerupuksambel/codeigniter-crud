<?php
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
						redirect('member');
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

						$this->load->view('data/success', $data);
					}
				}else{
					$this->load->view('data/add');
				}
			}
		}

		private function view($id = NULL){
			if($id === NULL){
				$data['arr'] = $this->data_model->get_data();
				$this->load->view("data/view", $data);
			}else{
				$data['arr'] = $this->data_model->get_data($id);
				$this->load->view("data/view_item", $data);
			}
		}

		private function update($id = NULL){
			if($id === NULL){
				$p = $this->data_model->get_data();

				$data = array(
					'rows' => $p
				);
				$this->load->view('data/list_update', $data);
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

						$this->load->view('data/update', $in);
					}else{
						show_404();
					}
				}else{
					$r = $this->data_model->set_data($id);
					if($r['stat'] == TRUE){
						echo "Bisa diubah";
					}else{
						echo "Tidak bisa diubah";
					}
					redirect("data/delete");
				}
			}
		}

		private function delete($id = NULL){
			//There's still a problem in delete part, will try to repair by... how?
			//And on the update tho
			if($id === NULL){
				$p = $this->data_model->get_data();

				$data = array(
					'rows' => $p
				);
				$this->load->view('data/list_delete', $data);
			}else{
				echo "Sukses";
				$stat = $this->data_model->delete_data($id);
				if($stat){
					redirect("data/delete");
				}else{
					show_404();
				}
			}
		}
	}
?>