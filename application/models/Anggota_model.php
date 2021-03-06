<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Anggota_model extends CI_Model
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
    $token = $this->session->userdata('token');
    $headers = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Anggota', [
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
    $token = $this->session->userdata('token');
    $headers = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Anggota', [
      'headers' => $headers,
      'query' => [
        'id_anggota'  => $id,
        'MyKey'       => 'kspkey'
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

    $data = [
      "nama"     => $this->input->post('nama', true),
      "email"    => $this->input->post('email', true),
      "password" => $this->input->post('password', true),
      "alamat"   => $this->input->post('alamat', true),
      "jk"       => $this->input->post('jk', true),
      "no_telp"  => $this->input->post('no_telp', true),
      "no_ktp"   => $this->input->post('no_ktp', true),
      'MyKey'    => 'kspkey'
    ];
    $response = $this->_client->request('POST', 'Anggota', [
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

    $data = [
      "id_anggota"  => $this->input->post('id_anggota', true),
      "nama"        => $this->input->post('nama', true),
      "email"       => $this->input->post('email', true),
      "password"    => $this->input->post('password', true),
      "alamat"      => $this->input->post('alamat', true),
      "jk"          => $this->input->post('jk', true),
      "no_telp"     => $this->input->post('no_telp', true),
      "no_ktp"      => $this->input->post('no_ktp', true),
      'MyKey'       => 'kspkey'
    ];

    $response = $this->_client->request('PUT', 'Anggota', [
      'headers'     => $headers,
      'form_params' => $data
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }
  public function deleteAnggota($id)
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('DELETE', 'Anggota', [
      'headers'       => $headers,
      'form_params'   => [
        'id_anggota'  => $id,
        'MyKey'       => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }
}
