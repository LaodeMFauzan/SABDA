<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('welcome_message');
		}
		else{
			$this->load->model('m_User');

			$password=set_value('password');
			$encrypt_pass=md5($password);
			$data_user=array(
						'email'=>set_value('email'),
						'password'=>$encrypt_pass);

			$valid_user=$this->m_User->login($data_user);
			
			if ($valid_user==FALSE) {
				$this->session->set_flashdata('error','Wrong Email / Password');
				redirect('login');
			} 
			else
			{
				// Password and username correct
				$data=$this->m_User->read_user_data($data_user['email']);
				$this->session->set_userdata('nama',$data[0]->nama);
				$this->session->set_userdata('id',$data[0]->id);
				$this->session->set_userdata('kode_rs',$data[0]->kode_rs);

				switch($data[0]->id){
					case 0: //Admin
						redirect('admin/RS'); 
						break; 
					default: 
						redirect('User'); 
						break;
					}
				}	
			}
		}	

	public function register(){
		//chechk if form is completely filled
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');
		$this->form_validation->set_rules('kode_rs','Kode Rumah Sakit','required|numeric');



		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_registration');
		}
		else{
			$this->load->model('m_User');

			$password=set_value('password');
			$encrypt_pass=md5($password);
			$data_user=array(
						'nama'=>set_value('name'),
						'email'=>set_value('email'),
						'password'=>$encrypt_pass,
						'kode_rs'=>set_value('kode_rs'));

			$this->load->model('m_RS');
			//Check if kode RS is valid
			$valid_rs=$this->m_RS->check_rs($data_user);
			if ($valid_rs==FALSE) {
				$this->session->set_flashdata('error','Kode RS tidak valid');
				$this->load->view('form_registration');
			}
			else{
				//Check if email already registered
				$valid_user=$this->m_User->login($data_user);
				if($valid_user==TRUE){
					$this->session->set_flashdata('error','Email sudah terdaftar');
					$this->load->view('form_registration');
				}
				else{
				$this->m_User->register($data_user);

				$this->session->set_flashdata('error','Registration Success'); //This is not error message

				redirect('login');
				}
			}
		}
	}
		
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
