<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_pinjaman extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pinjaman_model');
    $this->load->model('Anggota_model');
    $this->load->model('PinjamanAnggota_model');
    $token = $this->session->userdata('token');
    if (empty($token)) {
      $this->session->set_flashdata('flashceklogin', 'Silahkan login / daftar dahulu');
      redirect('auth');
    }
  }
  public function index()
  {
    $data['title']    = 'Data Pinjaman';
    $data['nama']     = $this->session->userdata('nama');
    $data['pinjam']   = $this->Pinjaman_model->getAll();
    $data['anggota']  = $this->Anggota_model->getAll();
    $data['data']     = $this->PinjamanAnggota_model->getAll();

    $this->form_validation->set_rules('anggota_id', 'Id Anggota', 'required|numeric');
    $this->form_validation->set_rules('jml_pinjam', 'Jumlah Pinjam', 'required');
    $this->form_validation->set_rules('bunga', 'Suku Bunga', 'required');
    $this->form_validation->set_rules('tempo', 'Tempo', 'required');
    $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/data-pinjaman', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Pinjaman_model->addData();
      $this->session->set_flashdata('flash', 'Berhasil Menambahkan Pinjaman Baru');
      redirect('data_pinjaman');
    }
  }
  public function update($id)
  {
    $data['title']      = 'Ubah Data Pinjaman';
    $data['nama']       = $this->session->userdata('nama');
    $data['pinjaman']   = $this->Pinjaman_model->getId($id);
    $data['anggota']    = $this->Anggota_model->getAll();

    $this->form_validation->set_rules('anggota_id', 'Id Anggota', 'required|numeric');
    $this->form_validation->set_rules('jml_pinjam', 'Jumlah Pinjam', 'required');
    $this->form_validation->set_rules('bunga', 'Suku Bunga', 'required');
    $this->form_validation->set_rules('tempo', 'Tempo', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit-pinjaman', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Pinjaman_model->updateData();
      $this->session->set_flashdata('flash', 'Berhasil Mengubah Data');
      redirect('data_pinjaman');
    }
  }
  public function detail($id)
  {
    $data['title']    = 'Detail Pinjaman';
    $data['nama']     = $this->session->userdata('nama');
    $data['pinjaman'] = $this->Pinjaman_model->getId($id);

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/detail-pinjaman', $data);
    $this->load->view('templates/footer');
  }
  public function delete($id)
  {
    $this->Pinjaman_model->delete($id);
    $this->session->set_flashdata('flash', 'Berhasil Menghapus Data');
    redirect('data_pinjaman');
  }
}
