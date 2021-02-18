<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Anggota_model');
    $this->load->model('Pinjaman_model');
    $this->load->model('Angsuran_model');
    $token = $this->session->userdata('token');
    if (empty($token)) {
      $this->session->set_flashdata('flashceklogin', 'Silahkan login / daftar dahulu');

      redirect('auth');
    }
  }
  public function index()
  {
    $data['jwt']        = $this->session->userdata('token');
    $data['id']         = $this->session->userdata('id_anggota');
    $data['nama']       = $this->session->userdata('nama');
    $data['anggota']    = $this->Anggota_model->getAll();
    $data['pinjaman']   = $this->Pinjaman_model->getAll();
    $data['total_pinjaman']   = $this->Pinjaman_model->total_pinjaman();
    $data['angsuran_masuk']   = $this->Angsuran_model->angsuran_masuk();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }
}
