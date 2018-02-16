<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')!=0) {
			$this->session->set_flashdata('error','Sorry you are not logged in!');
			redirect('login');
		}
		$this->load->model('M_Stok');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['stok']=$this->M_Stok->all();
		$this->load->view('admin/view_all_stok',$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('kode_rs', 'Kode Rumah Sakit', 'required');
		$this->form_validation->set_rules('golongan', 'Blood Type', 'required|in_list[A,B,AB,O]');
		$this->form_validation->set_rules('jumlah', 'Jumlah Kantung Darah', 'required|numeric');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('admin/form_stok');
		}
		else{
			$data_stok=array(
						'kode_rs'=>set_value('kode_rs'),
						'golongan'=>set_value('golongan'),
						'jumlah'=>set_value('jumlah'));

			//Check if kode RS is valid
			$this->load->model('M_RS');
			$valid_rs=$this->M_RS->check_rs($data_stok);
			if ($valid_rs==FALSE) {
				$this->session->set_flashdata('error','Kode RS tidak valid');
				$this->load->view('admin/form_stok');
			}
			else{
				$this->load->model('M_Stok');
				$this->M_Stok->create($data_stok);

				$this->session->set_flashdata('error','Tambah Data Berhasil'); //This is not error message

				redirect('admin/Stok');
			}
		}
	}

	public function delete($kode){
		$this->M_Stok->delete($kode);
		redirect('admin/Stok');
	}

	public function update($kode)
	{
		$this->form_validation->set_rules('kode_rs', 'Kode Rumah Sakit', 'required');
		$this->form_validation->set_rules('golongan', 'Golongan Darah', 'required|in_list[A,B,AB,O]');
		$this->form_validation->set_rules('jumlah', 'Jumlah Kantung Darah', 'required');

		$this->load->model('M_Stok');
		$data['stok']=$this->M_Stok->find($kode);
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('admin/form_stok',$data);
		}
		else{
			$data_stok=array(
						'kode_rs'=>set_value('kode_rs'),
						'golongan'=>set_value('golongan'),
						'jumlah'=>set_value('jumlah'));

			//Check if kode RS is valid
			$this->load->model('M_RS');
			$valid_rs=$this->M_RS->check_rs($data_stok);
			if ($valid_rs==FALSE) {
				$this->session->set_flashdata('error','Kode RS tidak valid');
				$this->load->view('admin/form_stok');
			}
			else{
				
				$this->M_Stok->update($kode,$data_stok);

				$this->session->set_flashdata('error','Tambah Data Berhasil'); //This is not error message

				redirect('admin/Stok');
			}
		}
	}

}
