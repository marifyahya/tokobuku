<?php
class M_publisher extends CI_Model {
	function create(){
		$this->db->set('publisher_name', $this->input->post('publisher'));
		$this->db->insert('tbl_publishers');
	}

	function all(){
		$query = $this->db->get('tbl_publishers');
		return $query;
	}

	function get($id) {
		return $this->db->get_where('tbl_publishers', ['publisher_id' => $id])->row();
	}

	function update($id) {
		$data = [
			'publisher_name'		=> $this->input->post('publisher')
		];
	    $this->db->where('publisher_id', $id);
	    $this->db->update('tbl_publishers', $data);
	}

	function delete($id) {
		$this->db->where('publisher_id', $id);
		$this->db->delete('tbl_publishers');
	}

	function check($id) {
		return $this->db->get_where('tbl_mybooks', ['publisher_id' => $id])->row();
	}
}