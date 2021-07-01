<?php

/**
 * 
 */
class Songs_model extends CI_model
{
	
	public function __construct(){

		$this->load->database();
	}
	public function get_songs(){
		$query = $this->db->get('songs');

		return $query->result_array();	
	}

	public function get_song_details($param){

		$result = $this->db->get_where('songs', array('id' => $param));

		return $result->row_array();
	}

	public function insert_song(){

		$data = array(
			'title' => $this->input->post('title') , 
			'artist' => $this->input->post('artist') , 
			'lyrics' => $this->input->post('lyrics') , 
			'created_at' => date('Y-m-d H:i:s') , 


		);

		return $this->db->insert('songs', $data);
	}

	public function get_song_edit($param){

		$result = $this->db->get_where('songs', array('id' => $param));

		return $result->row_array();
	}

	public function update_song($param){

		$data = array(
			'title' => $this->input->post('title') , 
			'artist' => $this->input->post('artist') , 
			'lyrics' => $this->input->post('lyrics') , 
			'created_at' => date('Y-m-d H:i:s') , 


		);

		$this->db->where('id', $param);
		return $this->db->update('songs',$data);
	}

	public function delete_song($param){
		$this->db->where('id' , $param);
		$this->db->delete('songs');

		return true;
	}
	public function login (){
		$this->db->where('username',$this->input->post('username',true));
		$this->db->where('password',$this->input->post('password',true));

		$result = $this->db->get('user');

		if ($result->num_rows() == 1) {
			return $result->row_array();
		}else{
			return false;
		}

	}
}