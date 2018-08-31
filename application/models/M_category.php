<?php
class M_category extends CI_Model {
	function create(){
		$this->db->set('category_name', $this->input->post('kategori'));
		$this->db->insert('tbl_categories');
	}

	function all(){
		$query = $this->db->get('tbl_categories');
		return $query;
	}

	function get($id) {
		return $this->db->get_where('tbl_categories', ['category_id' => $id])->row();
	}

	function update($id) {
		$data = [
			'category_name'		=> $this->input->post('category')
		];
	    $this->db->where('category_id', $id);
	    $this->db->update('tbl_categories', $data);
	}

	function delete($id) {
		$this->db->where('category_id', $id);
		$this->db->delete('tbl_categories');
	}

	function check($id) {
		return $this->db->get_where('tbl_mybooks', ['category_id' => $id])->row();
	}
}