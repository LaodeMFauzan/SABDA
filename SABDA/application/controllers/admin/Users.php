<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('id')!=0) {
			$this->session->set_flashdata('error','Sorry you are not logged in!');
			redirect('login');
		}
		$this->load->model('m_User');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['user']=$this->m_User->all();
		$this->load->view('admin/view_all_user',$data);
	}

	public function create(){
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');
		$this->form_validation->set_rules('kode_rs','Kode Rumah Sakit','required|numeric');


		if ($this->form_validation->run()==FALSE) {
			$this->load->view('admin/form_user');
		}
		else{
			$password=set_value('password');
			$encrypt_pass=md5($password);
			$data_user=array(
						'nama'=>set_value('name'),
						'email'=>set_value('email'),
						'password'=>$encrypt_pass,
						'kode_rs'=>set_value('kode_rs'));

			//Check if kode RS is valid
			$this->load->model('m_RS');
			$valid_rs=$this->m_RS->check_rs($data_user);
			if ($valid_rs==FALSE) {
				$this->session->set_flashdata('error','Kode RS tidak valid');
				$this->load->view('admin/form_user');
			}
			else{
				//Check if email already registered
				$this->load->model('m_User');
				$valid_user=$this->m_User->login($data_user);
				if($valid_user==TRUE){
					$this->session->set_flashdata('error','Email sudah terdaftar');
					$this->load->view('admin/form_user');
				}
				else{
				$this->m_User->register($data_user);

				$this->session->set_flashdata('error','Tambah Data Berhasil'); //This is not error message

				redirect('admin/Users');
				}
			}
		}
	}

	public function delete($id){
		$this->m_User->delete($id);
		redirect('admin/Users');
	}

	public function update($id){
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');
		$this->form_validation->set_rules('kode_rs','Kode Rumah Sakit','required|numeric');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required|matches[password]');
		
		$data['user']=$this->m_User->find($id);

		if ($this->form_validation->run()==FALSE) {
			
			$this->load->view('admin/form_user',$data);
		}
		else{
			$this->load->model('M_User');

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
				$this->load->view('admin/form_user',$data);
			}
			else{
				
				$this->m_User->update($id,$data_user);

				$this->session->set_flashdata('error','Tambah Data Berhasil'); //This is not error message

				redirect('admin/Users');
				}
		}
	}
}
