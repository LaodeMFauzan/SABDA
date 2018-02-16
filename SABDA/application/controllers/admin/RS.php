<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RS extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('id')!=0) {
			$this->session->set_flashdata('error','Sorry you are not logged in!');
			redirect('login');
		}
		$this->load->model('M_RS');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['rs']=$this->M_RS->all();
		$this->load->view('admin/view_all_rs',$data);
	}

	public function create(){
		$this->form_validation->set_rules('namaRS', 'Nama Rumah Sakit', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run()==FALSE) 
		{
				$this->load->view('admin/form_rs');
		}
		else
		{
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 2000;
	        $config['max_width']            = 2048;
	        $config['max_height']           = 2048;
	        $this->load->library('upload', $config);

	     	if ( ! $this->upload->do_upload('userfile'))
	        {		 
	           $error = $this->upload->display_errors();
	            $this->session->set_flashdata('error', $error);
				 $this->load->view('admin/form_rs', $error);
	        }
	        else
	        {
	        	$img=$this->upload->data();
	        	$data_rs=array(
	        		'nama'=>set_value('namaRS'),
	        		'alamat'=>set_value('alamat'),
	        		'foto'=>$img['file_name']);

	        	$this->M_RS->create($data_rs);
	        	redirect('admin/RS');
	        }  

		}
	}

	public function delete($kode_rs){
		$this->M_RS->delete($kode_rs);
		redirect('admin/RS');
	}

	public function update($kode_rs){
		$this->form_validation->set_rules('namaRS', 'Nama Rumah Sakit', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run()==FALSE) 
		{
				$data['rs']=$this->M_RS->find($kode_rs);
				$this->load->view('admin/form_rs',$data);
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
					$this->load->view('admin/form_rs', $error);
		        }
		        else
		        {
		        	$img=$this->upload->data();
		        	$data_rs=array(
		        		'nama'=>set_value('namaRS'),
		        		'alamat'=>set_value('alamat'),
		        		'foto'=>$img['file_name']);

		        	$this->M_RS->update($kode_rs,$data_rs);
		        	redirect('admin/RS');
		        }  
			}
			else
			{
				$data_rs=array(
					'nama'=>set_value('namaRS'),
					'alamat'=>set_value('alamat'));
				
				$this->M_RS->update($kode_rs,$data_rs);
				redirect('admin/RS');
			}
		}
	}
}