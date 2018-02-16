<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_RS extends CI_Model {
	
	 public function __construct()
    {
        parent::__construct();
    }

	public function all(){
		$hasil =$this->db->get('rumahSakit');
		if ($hasil->num_rows()>0) {
			return $hasil->result();
		}
		else{
			return array();
		}
	}

	public function create($data_rs){
		$this->db->insert('rumahSakit',$data_rs);
	}

	public function delete($kode_rs){
		$this->db->where('kode',$kode_rs)->delete('rumahSakit');
	}

	public function check_rs($data){
		$condition = "kode =" . "'" . $data['kode_rs'] . "'";
		$this->db->select('*');
		$this->db->from('rumahSakit');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function find($kode_rs){
		$hasil=$this->db->where('kode',$kode_rs)->limit(1)->get('rumahSakit');

		if ($hasil->num_rows()>0) {
			return $hasil->row();
		}
		else{
			return array();
		}
	}

	public function update($kode_rs,$data){
		$this->db->where('kode',$kode_rs);
		$this->db->update('rumahSakit',$data);
	}
	
	// Read data from database to show data in admin page
	public function check_rs_kode($kode_rs) {
		$condition = "kode =" . "'" . $kode_rs . "'";
		$this->db->select('*');
		$this->db->from('rumahSakit');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_rs_data($kode_rs) {

		$condition = "kode =" . "'" . $kode_rs . "'";
		$this->db->select('*');
		$this->db->from('rumahSakit');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function read_rs_stok($kode_rs) {
		$condition = "rumahSakit.kode =" . "'" . $kode_rs . "'";
		$this->db->select('foto,nama,alamat,jumlah,golongan,kode_rs');
		$this->db->from('rumahSakit');
		$this->db->join('stokDarah','rumahSakit.kode=stokDarah.kode_rs');
		$this->db->where($condition);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

}