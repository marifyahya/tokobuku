<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends MY_Controller {
	public function __construct() {
	    parent::__construct();
		$this->load->model('m_book');
	}

	public function index() {
		$this->data['title'] = 'Data buku';
		$this->data['book'] = $this->m_book->all();
		$this->render('book/v_book');
	}

	public function create() {
		if ($_POST==NULL){
			$this->data['title'] = 'Tambah buku';
			$this->load->model('m_category');
			$this->load->model('m_publisher');
			$this->data['kategori'] = $this->m_category->all();
			$this->data['penerbit'] = $this->m_publisher->all();
			$this->render('book/v_add_book');
		} else{
			$upload = $this->m_book->upload();
			if ($upload['result'] == 'success') {
				$this->m_book->create($upload);
				redirect('book');
			} else {
				$this->session->set_flashdata('error', $upload['error']);
				redirect('book/create');
			}
		}
	}

	public function delete($id) {
		$this->m_book->delete($id);
		redirect('book');
	}

	public function edit($id) {
		if ($_POST==NULL){
			$this->data = [
				'title'		=> 'Edit buku',
				'book'		=> $this->m_book->get($id)
			];
			$this->load->model('m_category');
			$this->load->model('m_publisher');
			$this->data['kategori'] = $this->m_category->all();
			$this->data['penerbit'] = $this->m_publisher->all();

			$this->render('book/v_edit_book');
		} else{
			$img = $_FILES['image']['name'];
			if (!empty($img)) {
				$upload = $this->m_book->upload();
				if ($upload['result'] == 'error') {
					$this->session->set_flashdata('error', $upload['error']);
					redirect('book/create');
				}
			}

			$this->m_book->update($id, $upload);
			redirect('book');
		}	
	}
}
