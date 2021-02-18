<?php defined('BASEPATH') or exit('No direct script access allowed');

class Data_anggota extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Anggota_model');
    $this->load->model('Pinjaman_model');
    $this->load->model('PinjamanAnggota_model');
    $this->load->model('DetailByIdAnggota_model');
    $token = $this->session->userdata('token');
    if (empty($token)) {
      $this->session->set_flashdata('flashceklogin', 'Silahkan login / daftar dahulu');
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title']    = 'Data Anggota';
    $data['nama']     = $this->session->userdata('nama');
    $data['anggota']  = $this->Anggota_model->getAll();

    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|ucwords');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|ucwords');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|ucwords');
    $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|numeric');
    $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|numeric');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/data-anggota', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Anggota_model->addData();
      $this->session->set_flashdata('flash', 'Berhasil Menambahkan Anggota Baru');
      redirect('data_anggota');
    }
  }

  public function update($id)
  {
    $data['title']  = 'Ubah Data Anggota';
    $data['nama']   = $this->session->userdata('nama');
    $data['data']   = $this->Anggota_model->getId($id);

    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|ucwords');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|ucwords');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|ucwords');
    $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|numeric');
    $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|numeric');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit-anggota', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Anggota_model->updateData();
      $this->session->set_flashdata('flash', 'Berhasil Mengubah Data');
      redirect('data_anggota');
    }
  }

  public function detail($id)
  {
    $data['title']   = 'Detail Anggota';
    $data['nama']    = $this->session->userdata('nama');
    $data['anggota'] = $this->Anggota_model->getId($id);
    $data['detil']   = $this->DetailByIdAnggota_model->getData($id);

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/detail-anggota', $data);
    $this->load->view('templates/footer');
  }

  public function delete($id)
  {
    $this->Anggota_model->deleteAnggota($id);
    $this->session->set_flashdata('flash', 'Berhasil Menghapus Data');
    redirect('data_anggota');
  }
}
