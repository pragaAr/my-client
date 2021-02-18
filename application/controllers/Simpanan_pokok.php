<?php defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_pokok extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Anggota_model');
    $this->load->model('Simpanan_pokok_model');
    $token = $this->session->userdata('token');
    if (empty($token)) {
      $this->session->set_flashdata('flashceklogin', 'Silahkan login / daftar dahulu');
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title']            = 'Data Simpanan Pokok';
    $data['nama']             = $this->session->userdata('nama');
    $data['simpanan']         = $this->Simpanan_pokok_model->getAll();
    $data['simpananAnggota']  = $this->Simpanan_pokok_model->getSimpananAnggota();
    $data['anggota']          = $this->Anggota_model->getAll();

    $this->form_validation->set_rules('anggota_id', 'Id Anggota', 'trim|required|ucwords');
    $this->form_validation->set_rules('nominal_pokok', 'Nominal', 'trim|required|ucwords');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/simpanan-pokok', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Simpanan_pokok_model->addData();
      $this->session->set_flashdata('flash', 'Berhasil Menambahkan Simpanan Pokok');
      redirect('simpanan_pokok');
    }
  }

  public function update($id)
  {
    $data['title']  = 'Ubah Data Simpanan Pokok';
    $data['nama']   = $this->session->userdata('nama');
    $data['data']   = $this->Simpanan_pokok_model->getId($id);

    $this->form_validation->set_rules('nominal_pokok', 'Nominal', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit-simpanan-pokok', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Simpanan_pokok_model->updateData();
      $this->session->set_flashdata('flash', 'Berhasil Mengubah Data');
      redirect('simpanan_pokok');
    }
  }

  public function delete($id)
  {
    $this->Simpanan_pokok_model->deleteData($id);
    $this->session->set_flashdata('flash', 'Berhasil Menghapus Data');
    redirect('simpanan_pokok');
  }
}
