<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('id')!=0) {
			$this->session->set_flashdata('error','Sorry you are not logged in!');
			redirect('login');
		}
		$this->load->model('M_Permintaan');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['permintaan']=$this->M_Permintaan->all();
		$this->load->view('admin/view_all_permintaan',$data);
	}

	public function create(){
		$this->form_validation->set_rules('kode_asal', 'Kode RS Asal', 'required');
		$this->form_validation->set_rules('kode_tujuan', 'Kode RS Tujuan', 'required');
		$this->form_validation->set_rules('golongan', 'Kode RS Tujuan', 'required|in_list[A,B,AB,O]');
		$this->form_validation->set_rules('jumlah', 'Kode RS Tujuan', 'required|numeric');

		if ($this->form_validation->run()==FALSE) 
		{
			$this->load->view('admin/form_permintaan');
		}
		else
		{
			$data=array(
						'kode_asal'=>set_value('kode_asal'),
						'kode_tujuan'=>set_value('kode_tujuan'),
						'golongan'=>set_value('golongan'),
						'jumlah'=>set_value('jumlah'));

			$kode_asal=set_value('kode_asal');
			$kode_tujuan=set_value('kode_tujuan');

			//Check if kode RS is valid
			$this->load->model('m_RS');
			$valid_rs1=$this->m_RS->check_rs_kode($kode_asal);
			$valid_rs2=$this->m_RS->check_rs_kode($kode_tujuan);

			if ($valid_rs1==FALSE || $valid_rs2==FALSE || $kode_tujuan==$kode_asal) {
				$this->session->set_flashdata('error','Kode RS tidak valid');
				$this->load->view('admin/form_permintaan');
			}
			else
			{
				$this->M_Permintaan->create($data);
				// $this->session->set_flashdata('error','Tambah Data Berhasil'); //This is not error message
				redirect('admin/Permintaan');
			}
		}
	}

	public function update($kode_p){
		$this->form_validation->set_rules('kode_asal', 'Kode RS Asal', 'required');
		$this->form_validation->set_rules('kode_tujuan', 'Kode RS Tujuan', 'required');
		$this->form_validation->set_rules('golongan', 'Kode RS Tujuan', 'required|in_list[A,B,AB,O]');
		$this->form_validation->set_rules('jumlah', 'Kode RS Tujuan', 'required|numeric');

		
		if ($this->form_validation->run()==FALSE) 
		{
			$data['permintaan']=$this->M_Permintaan->find($kode_p);
			$this->load->view('admin/form_permintaan',$data);
		}
		else
		{
			$data=array(
						'kode_asal'=>set_value('kode_asal'),
						'kode_tujuan'=>set_value('kode_tujuan'),
						'golongan'=>set_value('golongan'),
						'jumlah'=>set_value('jumlah'));

			$kode_asal=set_value('kode_asal');
			$kode_tujuan=set_value('kode_tujuan');

			//Check if kode RS is valid
			$this->load->model('m_RS');
			$valid_rs1=$this->m_RS->check_rs_kode($kode_asal);
			$valid_rs2=$this->m_RS->check_rs_kode($kode_tujuan);

			if ($valid_rs1==FALSE || $valid_rs2==FALSE || $kode_tujuan==$kode_asal) {
				$this->session->set_flashdata('error','Kode RS tidak valid');
				$this->load->view('admin/form_permintaan');
			}
			else
			{
				$this->M_Permintaan->update($kode_p,$data);
				// $this->session->set_flashdata('error','Tambah Data Berhasil'); //This is not error message
				redirect('admin/Permintaan');
			}
		}
	}

	public function delete($kode){
		$this->M_Permintaan->delete($kode);
		redirect('admin/Permintaan');
	}

}

