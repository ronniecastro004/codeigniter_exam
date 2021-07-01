<?php


class Pages extends CI_Controller{
	
	public function view($param = NULL){

		if (!$this->session->logged_in) {
			$this->session->set_flashdata('notification_status','failed.');
			$this->session->set_flashdata('notification_msg','Restricted Area');
			redirect('login');
		}
		if ($param == NULL) {
			$page = "home";
			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$data['title'] = "Song Lists";
			$data['songs'] = $this->Songs_model->get_songs();
			
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');

		}else{
			$page = "details";

			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$data['songs'] = $this->Songs_model->get_song_details($param);
			
			if ($data['songs']) {
				$this->load->view('templates/header');
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('notification_status','failed.');
				$this->session->set_flashdata('notification_msg','No Record Found.');
				redirect(base_url());
			}
		}


	}

	public function login(){

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');


		if ($this->form_validation->run() == FALSE) {
			$page = "login";

			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page);
			$this->load->view('templates/footer');

		}else{

			$user_id = $this->Songs_model->login();
			if ($user_id) {

				$user_data = array(
					'firstname' => $user_id['firstname'],
					'lastname' => $user_id['lastname'],
					'access' => $user_id['is_admin'],
					'logged_in' => true,
				);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('notification_status','success.');
				$this->session->set_flashdata('notification_msg','Your are now login.');
				redirect(base_url());

			}else{
				

				$this->session->set_flashdata('notification_status','failed.');
				$this->session->set_flashdata('notification_msg','Invalid Username or Password.');	
				redirect('login');
			}
			//$this->session->set_flashdata('notification_status','success.');
			//$this->session->set_flashdata('notification_msg','Song was successFully updated.');
			//redirect(base_url());
		}

	}

	public function logout(){

		$this->session->unset_userdata('firstname');
		$this->session->unset_userdata('lastname');
		$this->session->unset_userdata('access');
		$this->session->unset_userdata('logged_in');

		$this->session->set_flashdata('notification_status','success.');
		$this->session->set_flashdata('notification_msg','You are now logged out');
		redirect('login');	

	}
	public function create(){

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		$this->form_validation->set_rules('title','title','required');
		$this->form_validation->set_rules('artist','artist','required');
		$this->form_validation->set_rules('lyrics','lyrics','required');


		if ($this->form_validation->run() == FALSE) {
			$page = "create";

			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$data['title'] = "Add New Songs";


			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}else{

			$this->Songs_model->insert_song();
			$this->session->set_flashdata('notification_status','success.');
			$this->session->set_flashdata('notification_msg','New Song Successfully added.');
			redirect(base_url());
		}
		
	}

	public function edit($param = NULL){

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		$this->form_validation->set_rules('title','title','required');
		$this->form_validation->set_rules('artist','artist','required');
		$this->form_validation->set_rules('lyrics','lyrics','required');


		if ($this->form_validation->run() == FALSE) {
			$page = "edit";

			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$data['title'] = "Edit Song";
			$data['songs'] = $this->Songs_model->get_song_edit($param);

			if (!$data['songs']) {
				$this->session->set_flashdata('notification_status','failed.');
				$this->session->set_flashdata('notification_msg','No Record Found.');
				redirect(base_url());
			}

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');

		}else{

			$this->Songs_model->update_song($param);
			$this->session->set_flashdata('notification_status','success.');
			$this->session->set_flashdata('notification_msg','Song was successFully updated.');
			redirect(base_url());
		}
	}
	
	public function delete($param = NULL){
		$this->Songs_model->delete_song($param);
		$this->session->set_flashdata('notification_status','success.');
		$this->session->set_flashdata('notification_msg','Song was successFully deleted.');
		redirect(base_url());

	}
}