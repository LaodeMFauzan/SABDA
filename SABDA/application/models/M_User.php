<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	 public function __construct()
    {
        parent::__construct();
    }


	public function login($data) {
		$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function register($data_user){
		$this->db->insert('user',$data_user);
	}

	
	public function find($id){
		$hasil=$this->db->where('id',$id)->limit(1)->get('user');

		if ($hasil->num_rows()>0) {
			return $hasil->row();
		}
		else{
			return array();
		}
	}

	public function all(){
		$hasil =$this->db->get('user');
		if ($hasil->num_rows()>0) {
			return $hasil->result();
		}
		else{
			return array();
		}
	}

	public function delete($id){
		$this->db->where('id',$id)->delete('user');
	}

	// Read data from database to show data in admin page
	public function read_user_data($email) {

		$condition = "email =" . "'" . $email . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}

	public function read_user_rs($id,$kode_rs){
		$condition = "user.id =" . "'" . $id . "'";
		$this->db->select('user.nama,email,password,rumahSakit.nama as nama_rs,foto,alamat,id,kode_rs');
		$this->db->from('user');
		$this->db->join('rumahSakit','rumahSakit.kode=user.kode_rs');
		$this->db->where($condition);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
}