<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah_Sakit extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('id')<1) {
			$this->session->set_flashdata('error','Sorry you are not logged in!');
			redirect('login');
		}
		$this->load->model('M_RS');
		$this->load->model('M_Stok');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['rs']=$this->M_RS->all();
		$this->load->view('user/view_all_rs',$data);
	}

	public function get_profile($kode){
		$data['rs']=$this->M_RS->read_rs_stok($kode);
		$this->load->view('user/view_rs_data',$data);
	}	

	public function update($kode_rs){
		$this->form_validation->set_rules('namaRS', 'Nama Rumah Sakit', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		$id=$this->session->userdata('id');

		if ($this->form_validation->run()==FALSE) 
		{
				$data['rs']=$this->M_RS->find($kode_rs);
				$this->load->view('user/form_update_rs',$data);
		}
		else
		{
			if($_FILES['userfile']['name']!=''){
				$config['upload_path']          = './uploads/';
	        	$config['allowed_types']        = 'gif|jpg|png';
	        	$config['max_size']             = 2000;
	        	$config['max_width']            = 2048;
	        	$config['max_height']           = 1024;
	        	$this->load->library('upload', $config);

		     	if ( ! $this->upload->do_upload('userfile'))
		        {	
		        	$data['rs']=$this->M_RS->find($id);	 
		           	$error = $this->upload->display_errors();
		            $this->session->set_flashdata('error', $error);
					$this->load->view('user/form_update_rs', $error);
		        }
		        else
		        {
		        	$img=$this->upload->data();
		        	$data_rs=array(
		        		'nama'=>set_value('namaRS'),
		        		'alamat'=>set_value('alamat'),
		        		'foto'=>$img['file_name']);

		        	$this->M_RS->update($kode_rs,$data_rs);
		        	redirect('User/get_user_profile/'.$id.'/'.$kode_rs);
		        }  
			}
			else
			{
				$data_rs=array(
					'nama'=>set_value('namaRS'),
					'alamat'=>set_value('alamat'));
				
				$this->M_RS->update($kode_rs,$data_rs);
				redirect('User/get_user_profile/'.$id.'/'.$kode_rs);
			}
		}
	}
}

