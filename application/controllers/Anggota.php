<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Anggota_model');
    $token = $this->session->userdata('token');
    if (empty($token)) {
      $this->session->set_flashdata('flashceklogin', 'Silahkan login / daftar dahulu');
      redirect('auth');
    }
  }
  public function home()
  {
    $data['jwt']  = $this->session->userdata('token');
    $data['nama'] = $this->session->userdata('nama');
    $this->load->view('anggota/homepage', $data);
  }

  public function about()
  {
    $data['nama'] = $this->session->userdata('nama');

    $this->load->view('anggota/header', $data);
    $this->load->view('anggota/about', $data);
    $this->load->view('anggota/footer');
  }
  public function profil()
  {
    $data['id']           = $this->session->userdata('id_anggota');
    $data['nama']         = $this->session->userdata('nama');
    $data['status']       = $this->session->userdata('status');
    $data['date_created'] = $this->session->userdata('date_created');


    $this->load->view('anggota/header', $data);
    $this->load->view('anggota/profil', $data);
    $this->load->view('anggota/footer');
  }
  public function edit()
  {
    $data['nama'] = $this->session->userdata('nama');

    $this->load->view('anggota/header', $data);
    $this->load->view('anggota/edit-profil', $data);
    $this->load->view('anggota/footer', $data);
  }
}
