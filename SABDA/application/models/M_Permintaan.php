<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Permintaan extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function all(){
		$hasil =$this->db->get('permintaanDarah');
		if ($hasil->num_rows()>0) {
			return $hasil->result();
		}
		else{
			return array();
		}
	}

	public function create($data){
		$this->db->insert('permintaanDarah',$data);
	}

	public function delete($kode_p){
		$this->db->where('kode_p',$kode_p)->delete('permintaanDarah');
	}

	public function check_rs($data){
		$condition = "kode_p =" . "'" . $data['kode_p'] . "'";
		$this->db->select('*');
		$this->db->from('permintaanDarah');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function find($kode){
		$hasil=$this->db->where('kode_p',$kode)->limit(1)->get('permintaanDarah');

		if ($hasil->num_rows()>0) {
			return $hasil->row();
		}
		else{
			return array();
		}
	}

	public function update($kode,$data){
		$this->db->where('kode_p',$kode);
		$this->db->update('permintaanDarah',$data);
	}

	public function get_permintaan_masuk($kode){
		$condition = "permintaanDarah.kode_tujuan =" . "'" . $kode . "' AND status='Dalam Proses'";
		$this->db->select('*');
		$this->db->from('permintaanDarah');
		$this->db->join('rumahSakit','rumahSakit.kode=permintaanDarah.kode_asal');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function get_permintaan_keluar($kode){
		$condition = "permintaanDarah.kode_asal =" . "'" . $kode . "'";
		$this->db->select('*');
		$this->db->from('permintaanDarah');
		$this->db->join('rumahSakit','rumahSakit.kode=permintaanDarah.kode_tujuan');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function ubah_status($kode_p,$status){
		$this->db->set('status', $status);
		$this->db->where('kode_p',$kode_p);
		$this->db->update('permintaanDarah');
	}
}