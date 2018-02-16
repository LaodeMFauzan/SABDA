<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Stok extends CI_Model {
	
	 public function __construct()
    {
        parent::__construct();
    }

	public function all(){
		$hasil =$this->db->get('stokDarah');
		if ($hasil->num_rows()>0) {
			return $hasil->result();
		}
		else{
			return array();
		}
	}

	public function create($data){
		$this->db->insert('stokDarah',$data);
	}

	public function delete($kode){
		$this->db->where('kode',$kode)->delete('stokDarah');
	}

	public function find($kode){
		$hasil=$this->db->where('kode',$kode)->limit(1)->get('stokDarah');

		if ($hasil->num_rows()>0) {
			return $hasil->row();
		}
		else{
			return array();
		}
	}

	public function update($kode,$data){
		$this->db->where('kode',$kode);
		$this->db->update('stokDarah',$data);
	}
	

	public function get_rs_stok($kode){
		$hasil=$this->db->where('kode_rs',$kode)->get('stokDarah');
		if ($hasil->num_rows()>0) {
			return $hasil->result();
		}
		else{
			return array();
		}
	}

	public function get_golongan_jumlah($kode_rs,$golongan){
		$condition = "kode_rs =" . "'" . $kode_rs . "' and golongan="."'".$golongan."'";
		$this->db->select('jumlah');
		$this->db->from('stokDarah');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function update_jumlah($kode_rs,$golongan,$jumlah){
		$this->db->set('jumlah', $jumlah);
		$array = array('kode_rs' => $kode_rs, 'golongan' => $golongan);
		$this->db->where($array);
		$this->db->update('stokDarah');
	}
}