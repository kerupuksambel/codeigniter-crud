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
						$this->update();
						break;
					
					case 'delete':
						$this->delete();
						break;

					default:
						redirect('member');
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

		public function view($id = NULL){
			if($id === NULL){
				$data['arr'] = $this->data_model->get_data();
				$this->load->view("data/view", $data);
			}else{
				$data['arr'] = $this->data_model->get_data($id);
				$this->load->view("data/view_item", $data);
			}
		}

		public function delete(){}

		public function edit(){}
	}
?>