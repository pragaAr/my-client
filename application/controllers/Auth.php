<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Silahkan login dahulu';
      $this->load->view('auth/header');
      $this->load->view('auth/login', $data);
      $this->load->view('auth/footer');
    } else {

      try {
        $result = $this->Auth_model->login();

        $cek = [
          'id_anggota'    => $result['id_anggota'],
          'nama'          => $result['nama'],
          'email'         => $result['email'],
          'status'        => $result['status'],
          'role_id'       => $result['role_id'],
          'date_created'  => $result['date_created'],
          'token'         => $result['token'],
        ];

        $this->session->set_userdata($cek);

        if ($cek['role_id'] == 1) {
          $this->session->set_flashdata('flash', 'Login Berhasil');
          redirect('admin');
        } else {
          $this->session->set_flashdata('flash', 'Login Berhasil');
          redirect('anggota/home');
        }
      } catch (\Throwable $th) {
        $this->session->set_flashdata('flashcek', 'Email atau password salah');
        redirect('auth');
      }
    }
  }

  public function register()
  {
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
    $this->form_validation->set_rules('no_telp', 'No Telpon', 'trim|required');
    $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required');


    if ($this->form_validation->run() == false) {
      $data['title'] = 'Ayo buat akun anda';
      $this->load->view('auth/header');
      $this->load->view('auth/register', $data);
      $this->load->view('auth/footer');
    } else {
      $this->Auth_model->register();
      $this->session->set_flashdata('flashLogin', 'Silahkan Login');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('role_id');
    $this->session->unset_userdata('token');

    $this->session->set_flashdata('flashlogout', 'Sampai Jumpa lagi');
    redirect('auth');
  }
}
