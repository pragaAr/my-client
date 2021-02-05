<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_wajib extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Simpanan_wajib_model');
    $this->load->model('Anggota_model');
    $token = $this->session->userdata('token');
    if (empty($token)) {
      $this->session->set_flashdata('flashceklogin', 'Silahkan login / daftar dahulu');
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title']            = 'Data Simpanan Wajib';
    $data['nama']             = $this->session->userdata('nama');
    $data['simpanan']         = $this->Simpanan_wajib_model->getAll();
    $data['simpananAnggota']  = $this->Simpanan_wajib_model->getSimpananAnggota();
    $data['anggota']          = $this->Anggota_model->getAll();

    $this->form_validation->set_rules('anggota_id', 'Id Anggota', 'trim|required|ucwords');
    $this->form_validation->set_rules('nominal_wajib', 'Nominal', 'trim|required|ucwords');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/simpanan-wajib', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Simpanan_wajib_model->addData();
      $this->session->set_flashdata('flash', 'Berhasil Menambahkan Simpanan Wajib');
      redirect('simpanan_wajib');
    }
  }

  public function update($id)
  {
    $data['title']  = 'Ubah Data Simpanan Wajib';
    $data['nama']   = $this->session->userdata('nama');
    $data['data']   = $this->Simpanan_wajib_model->getId($id);

    $this->form_validation->set_rules('nominal_wajib', 'Nominal', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit-simpanan-wajib', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Simpanan_wajib_model->updateData();
      $this->session->set_flashdata('flash', 'Berhasil Mengubah Data');
      redirect('simpanan_wajib');
    }
  }

  public function delete($id)
  {
    $this->Simpanan_wajib_model->deleteData($id);
    $this->session->set_flashdata('flash', 'Berhasil Menghapus Data');
    redirect('simpanan_wajib');
  }
}
