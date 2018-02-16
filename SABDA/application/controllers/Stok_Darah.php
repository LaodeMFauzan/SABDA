<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_Darah extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('id')<1) {
			$this->session->set_flashdata('error','Sorry you are not logged in!');
			redirect('login');
		}
		$this->load->model('M_Stok');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['stok']=$this->M_Stok->get_rs_stok($this->session->userdata('kode_rs'));
		$this->load->view('user/view_stok',$data);
	}

	public function update($kode){
		$this->form_validation->set_rules('jumlah', 'Jumlah Kantung Darah', 'required|numeric');

		$this->load->model('M_Stok');
		$data['stok']=$this->M_Stok->find($kode);
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('user/form_update_stok',$data);
		}
		else{
			$data_jumlah=array('jumlah'=>set_value('jumlah'));
			$this->M_Stok->update($kode,$data_jumlah);
			$this->session->set_flashdata('error','Tambah Data Berhasil'); //This is not error 
			redirect('Stok_Darah');
		}
	}
}

	

