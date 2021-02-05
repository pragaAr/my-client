<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_angsuran extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pinjaman_model');
    $this->load->model('Anggota_model');
    $this->load->model('Angsuran_model');
    $this->load->model('PinjamanAnggota_model');
    $token = $this->session->userdata('token');
    if (empty($token)) {
      $this->session->set_flashdata('flashceklogin', 'Silahkan login / daftar dahulu');
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title']    = 'Data Angsuran';
    $data['nama']     = $this->session->userdata('nama');
    $data['angsuran'] = $this->Angsuran_model->getAll();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data-angsuran', $data);
    $this->load->view('templates/footer');
  }
  // public function update($id)
  // {
  //   $data['title']      = 'Ubah Data Pinjaman';
  //   $data['nama']       = $this->session->userdata('nama');
  //   $data['pinjaman']   = $this->Pinjaman_model->getId($id);
  //   $data['anggota']    = $this->Anggota_model->getAll();

  //   $this->form_validation->set_rules('anggota_id', 'Id Anggota', 'required|numeric');
  //   $this->form_validation->set_rules('jml_pinjam', 'Jumlah Pinjam', 'required');
  //   $this->form_validation->set_rules('bunga', 'Suku Bunga', 'required');
  //   $this->form_validation->set_rules('tempo', 'Tempo', 'required');
  //   $this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'required');

  //   if ($this->form_validation->run() == false) {
  //     $this->load->view('templates/header');
  //     $this->load->view('templates/sidebar');
  //     $this->load->view('templates/topbar', $data);
  //     $this->load->view('admin/edit-pinjaman', $data);
  //     $this->load->view('templates/footer');
  //   } else {
  //     $this->Pinjaman_model->updateData();
  //     $this->session->set_flashdata('flash', 'Berhasil Mengubah Data');
  //     redirect('data_pinjaman');
  //   }
  // }
  public function detail($id)
  {
    $data['title']            = 'Detail Angsuran';
    $data['nama']             = $this->session->userdata('nama');
    $data['summaryAngsuran']  = $this->Angsuran_model->getSummaryAngsuranByIdPinjam($id);
    $data['angsurans']        = $this->Angsuran_model->getAngsuransByIdPinjam($id);

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/detail-angsuran', $data);
    $this->load->view('templates/footer');
  }

  public function Bayarangsuran()
  {
    $pinjam_id = $this->input->post('pinjam_id');

    $this->form_validation->set_rules('pinjam_id', 'Nama Peminjam', 'required');
    $this->form_validation->set_rules('nom_angsur', 'Jumlah Angsuran', 'required');
    $this->form_validation->set_rules('tgl_bayar', 'Tanggal', 'required');

    if ($this->form_validation->run()) {
      $this->Angsuran_model->addAngsuran();
      $this->session->set_flashdata('flash', 'Berhasil Bayar Angsuran');

      redirect("data_angsuran/detail/$pinjam_id");
    } else {
      $this->session->set_flashdata('flash', validation_errors());
      redirect("data_angsuran/detail/$pinjam_id");
    }
  }

  public function delete($id)
  {
    $this->Pinjaman_model->delete($id);
    $this->session->set_flashdata('flash', 'Berhasil Menghapus Data');
    redirect('data_pinjaman');
  }

  public function print($id)
  {
    $data['detailPinjam']  = $this->Angsuran_model->getSummaryAngsuranByIdPinjam($id);
    $data['angsuran']      = $this->Angsuran_model->getAngsuransByIdPinjam($id);

    $this->load->view('admin/print', $data);
  }

  public function download($id)
  {
    $this->load->library('pdf');
    $data['detailPinjam']  = $this->Angsuran_model->getSummaryAngsuranByIdPinjam($id);
    $data['angsuran']      = $this->Angsuran_model->getAngsuransByIdPinjam($id);

    $this->load->view('admin/download', $data);
    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->pdf->set_paper($paper_size, $orientation);
    $this->pdf->load_html($html);
    $this->pdf->render();
    $this->pdf->stream("detail-angsuran.pdf", array('Attachment' => 0));
  }
}
