<?php
class M_book extends CI_Model {
	function upload(){
		$config['upload_path'] = './public/uploads/';
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size']  = '2048';
	    $config['remove_space'] = TRUE;

	    $this->load->library('upload', $config);

	    if($this->upload->do_upload('image')){
      		$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      		return $return;
	    }else{
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
	    }
	}

	function create($upload) {
		$data = array(
			'ISBN'			=>$this->input->post('isbn'),
			'category_id'	=>$this->input->post('category'),
			'title'			=>$this->input->post('title'),
			'author'		=>$this->input->post('author'),
			'price'			=>$this->input->post('price'),
			'publisher_id'	=>$this->input->post('publisher'),
			'publish_date'	=>$this->input->post('publishDate'),
			'img'			=>$upload['file']['file_name']
		);

		$this->db->insert('tbl_mybooks', $data);
	}

	function all(){
		$this->db->select('*');
		$this->db->from('tbl_mybooks');
		$this->db->join('tbl_categories', 'tbl_mybooks.category_id = tbl_categories.category_id');
		$this->db->join('tbl_publishers', 'tbl_mybooks.publisher_id = tbl_publishers.publisher_id');
		$query = $this->db->get();
		return $query;
	}

	function get($id) {
		return $this->db->get_where('tbl_mybooks', ['book_id' => $id])->row();
	}

	function update($id, $upload) {
		$img = $_FILES['image']['name'];

		if (!empty($img)) {
			$data = array(
				'ISBN'			=>$this->input->post('isbn'),
				'category_id'	=>$this->input->post('category'),
				'title'			=>$this->input->post('title'),
				'author'		=>$this->input->post('author'),
				'price'			=>$this->input->post('price'),
				'publisher_id'	=>$this->input->post('publisher'),
				'publish_date'	=>$this->input->post('publishDate'),
				'img'			=>$upload['file']['file_name']
			);	
		} else {
			$data = array(
				'ISBN'			=>$this->input->post('isbn'),
				'category_id'	=>$this->input->post('category'),
				'title'			=>$this->input->post('title'),
				'author'		=>$this->input->post('author'),
				'price'			=>$this->input->post('price'),
				'publisher_id'	=>$this->input->post('publisher'),
				'publish_date'	=>$this->input->post('publishDate')
			);	
		}
		
	    $this->db->where('book_id', $id);
	    $this->db->update('tbl_mybooks', $data);
	}

	function delete($id) {
		$this->db->where('book_id', $id);
		$this->db->delete('tbl_mybooks');
	}
}