<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publisher extends MY_Controller {
	public function __construct() {
	    parent::__construct();
		$this->load->model('m_publisher');
	}

	public function index() {
		$this->data['title'] = 'Penerbit buku';
		$this->data['penerbit'] = $this->m_publisher->all();
		$this->render('publisher/v_publisher');
	}

	public function insert() {
		$this->m_publisher->create();
		redirect('publisher');
	}

	public function delete($id) {
		$cek = $this->m_publisher->check($id);
		if ($cek != NULL) {
			$this->session->set_flashdata('success', 'Penerbit sedang digunakan, tidak bisa dihapus');
		} else {
			$this->m_publisher->delete($id);
		}

		redirect('publisher');
	}

	public function edit($id) {
		if ($_POST==NULL){
			$this->data = [
				'title'		=> 'Edit Penerbit',
				'penerbit'	=> $this->m_publisher->get($id)
			];
			$this->render('publisher/v_edit_publisher');
		} else{
			$this->m_publisher->update($id);
			redirect('publisher');
		}	
	}
}
