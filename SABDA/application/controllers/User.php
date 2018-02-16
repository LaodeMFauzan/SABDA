<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('id')<1) {
			$this->session->set_flashdata('error','Sorry you are not logged in!');
			redirect('login');
		}
		$this->load->model('M_User');
		$this->load->model('M_RS');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('user/view_home');
	}

	public function get_user_profile($id,$kode_rs){
		$data['user']=$this->M_User->read_user_rs($id,$kode_rs);
		$this->load->view('user/view_user_data',$data);
	}	

	public function update($id){
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required|matches[password]');
		
		$data['user']=$this->M_User->find($id);

		if ($this->form_validation->run()==FALSE) {
			
			$this->load->view('user/form_update_user',$data);
		}
		else{
			$this->load->model('M_User');

			$password=set_value('password');
			$encrypt_pass=md5($password);
			$data_user=array(
						'nama'=>set_value('name'),
						'email'=>set_value('email'),
						'password'=>$encrypt_pass);

			$this->M_User->update($id,$data_user);

			$this->session->set_flashdata('error','Update Sukses'); //This is not error message

			$id=$this->session->userdata('id');
			$kode_rs=$this->session->userdata('kode_rs');

			redirect('User/get_user_profile/'.$id.'/'.$kode_rs);
				
		}
	}
}