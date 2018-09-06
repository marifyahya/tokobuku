<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
	public function __construct() {
	    parent::__construct();
		$this->load->model('m_category');
	}

	public function index() {
		$this->data['title'] = 'Kategori buku';
		$this->data['kategori'] = $this->m_category->all();
		$this->data['js'] = load_js([
					'node_modules\sweetalert\dist\sweetalert.min',
					'js/delete_kategori'
				]);
		$this->render('category/v_category');
	}

	public function insert() {
		$this->m_category->create();
		redirect('category');
	}

	public function delete($id) {
		$cek = $this->m_category->check($id);
		if ($cek != NULL) {
			$this->session->set_flashdata('error', 'Kategori tersebut sedang digunakan, tidak bisa dihapus');
		} else {
			$this->m_category->delete($id);
			$this->session->set_flashdata('success', 'Kategori berhasil dihapus');
		}

		redirect('category');
	}

	public function edit($id) {
		if ($_POST==NULL){
			$this->data = [
				'title'		=> 'Edit kategori',
				'kategori'	=> $this->m_category->get($id)
			];
			$this->render('category/v_edit_category');
		} else{
			$this->m_category->update($id);
			redirect('category');
		}	
	}
}
