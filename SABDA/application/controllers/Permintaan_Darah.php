<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_Darah extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('id')<1) {
			$this->session->set_flashdata('error','Sorry you are not logged in!');
			redirect('login');
		}
		$this->load->model('M_Permintaan');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('user/view_home_permintaan');
	}

	public function request($kode){
		$this->form_validation->set_rules('golongan', 'Golongan Darah', 'required|in_list[A,B,AB,O]');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

		if ($this->form_validation->run()==FALSE) 
		{	
			$this->load->model('M_RS');
			$data['rs']=$this->M_RS->find($kode);
			$this->load->view('user/form_minta_darah',$data);
		}
		else
		{
			$data=array(
						'kode_asal'=>$this->session->userdata('kode_rs'),
						'kode_tujuan'=>$kode,
						'golongan'=>set_value('golongan'),
						'jumlah'=>set_value('jumlah'));
			
			$this->M_Permintaan->create($data);
			 $this->session->set_flashdata('error','Permintaan berhasil dikirim'); //This is not error message
			redirect('Permintaan_Darah/');
			
		}
	}

	public function get_kotak_masuk(){
		$data['kotak_masuk']=$this->M_Permintaan->get_permintaan_masuk($this->session->userdata('kode_rs'));
		$this->load->view('user/view_kotak_masuk',$data);
	}

	public function get_kotak_keluar(){
		$data['kotak_keluar']=$this->M_Permintaan->get_permintaan_keluar($this->session->userdata('kode_rs'));
		$this->load->view('user/view_kotak_keluar',$data);
	}

	public function tolak($kode_p){
		$status='Ditolak';
		$this->M_Permintaan->ubah_status($kode_p,$status);
		redirect('Permintaan_Darah/get_kotak_masuk');
	}

	public function terima($kode_p,$kode_asal,$jum_minta,$golongan){
		$permintaan=$jum_minta;
		$this->load->model('M_Stok');
		$data_stok= $this->M_Stok->get_golongan_jumlah($this->session->userdata('kode_rs'),$golongan);
		$tersedia=$data_stok[0]->jumlah;
		$selisih=$tersedia-$permintaan;
		
		if ($selisih<5) {
			$this->session->set_flashdata('error','Stok darah tidak mencukupi'); //This is not error message
		}
		else{
			$status="Dikirim";
			$this->M_Permintaan->ubah_status($kode_p,$status);
			$this->M_Stok->update_jumlah($this->session->userdata('kode_rs'),$golongan,$selisih);

			$data_tujuan= $this->M_Stok->get_golongan_jumlah($kode_asal,$golongan);
			$hasil=($data_tujuan[0]->jumlah)+$permintaan;
			$this->M_Stok->update_jumlah($kode_asal,$golongan,$hasil);
		}
		redirect('Permintaan_Darah/get_kotak_masuk');
	}
}
