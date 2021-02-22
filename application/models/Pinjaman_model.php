<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Pinjaman_model extends CI_Model
{
  private $_client;
  public function __construct()
  {
    $this->_client = new Client([
      'base_uri' => 'http://kspserver.xyz//api/'
    ]);
  }

  public function getAll()
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Pinjaman', [
      'headers' => $headers,
      'query'   => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
  }

  public function getId($id)
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Pinjaman', [
      'headers'     => $headers,
      'query'       => [
        'MyKey'     => 'kspkey',
        'id_pinjam' => $id
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'][0];
  }

  public function addData()
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $post_data    = $this->input->post();
    $tempo        = $post_data['tempo'];
    $bungabln     = $post_data['jml_pinjam'] * ($post_data['bunga'] / 100);
    $pokok        = $post_data['jml_pinjam'] / $tempo;
    $cicilan      = $bungabln + $pokok;
    // pembulatan
    $cicil  = $cicilan;
    $ribuan = substr($cicil, -3);
    $akhir  = $cicil + (1000 - $ribuan);

    $pinjam = preg_replace("/[^0-9]/", "", $post_data['jml_pinjam']);

    $total_bayar  = $akhir * $tempo;
    $total = $total_bayar;
    $nilaitotal = substr($total, -3);
    $totalakhir = $total + (1000 - $nilaitotal);
    date_default_timezone_set('Asia/Jakarta');

    $data = [
      'anggota_id'  => $this->input->post('anggota_id'),
      'jml_pinjam'  => $pinjam,
      'bunga'       => $this->input->post('bunga'),
      'tempo'       => $tempo,
      'angsur_bln'  => $akhir,
      'tgl_pinjam'  => date('Y-m-d H:i:s'),
      'tgl_bayar'   => date('Y-m-d'),
      'total_bayar' => $totalakhir,
      'MyKey'       => 'kspkey'
    ];

    $response = $this->_client->request('POST', 'Pinjaman', [
      'headers'     => $headers,
      'form_params' => $data
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function updateData()
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $post_data    = $this->input->post();
    $tempo        = $post_data['angsuran'];
    $bungabln     = $post_data['jml_pinjam'] * ($post_data['bunga'] / 100);
    $pokok        = $post_data['jml_pinjam'] / $tempo;
    $cicilan      = $bungabln + $pokok;

    $cicil  = $cicilan;
    $ribuan = substr($cicil, -3);
    $akhir  = $cicil + (1000 - $ribuan);

    $pinjam = preg_replace("/[^0-9]/", "", $post_data['jml_pinjam']);

    $total_bayar  = $akhir * $tempo;
    $total = $total_bayar;
    $nilaitotal = substr($total, -3);
    $totalakhir = $total + (1000 - $nilaitotal);

    $data = [
      'anggota_id'  => $this->input->post('anggota_id'),
      'jml_pinjam'  => $pinjam,
      'bunga'       => $this->input->post('bunga'),
      'tempo'       => $this->input->post('tempo'),
      'angsur_bln'  => $akhir,
      'total_bayar' => $totalakhir,
      'id_pinjam'   => $this->input->post('id_pinjam', true),
      'MyKey'       => 'kspkey'
    ];

    try {
      $response = $this->_client->request('PUT', 'Pinjaman', [
        'headers'     => $headers,
        'form_params' => $data
      ]);
      $result   = json_decode($response->getBody()->getContents(), true);
      $message  = isset($result['message']) ? $result['message'] : 'Data diubah !';
      return $message;
    } catch (\Throwable $th) {
      return 'Tidak ada perubahan data !';
    }
  }

  public function summary()
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'pinjaman/summary', [
      'headers' => $headers,
      'query'   => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function total_pinjaman()
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Pinjaman', [
      'headers' => $headers,
      'query'   => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    $total_pinjaman = 0;
    $allPinjaman = $result['data'];
    foreach ($allPinjaman as $dataPinjam) {
      $total_pinjaman += $dataPinjam['jml_pinjam'];
    }
    return $total_pinjaman;
  }

  public function totalBayar()
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Pinjaman', [
      'headers' => $headers,
      'query'   => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    $total_bayar = 0;
    $allBayar = $result['data'];
    foreach ($allBayar as $databayar) {
      $total_bayar += $databayar['total_bayar'];
    }
    return $total_bayar;
  }
  public function delete($id)
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];
    $response = $this->_client->request('DELETE', 'Pinjaman', [
      'headers'     => $headers,
      'form_params' => [
        'id_pinjam' => $id,
        'MyKey'     => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }
}
