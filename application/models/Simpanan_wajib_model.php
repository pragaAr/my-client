<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Simpanan_wajib_model extends CI_Model
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
    $response = $this->_client->request('GET', 'Simpanan_wajib', [
      'headers'     => $headers,
      'query' => [
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
    $response = $this->_client->request('GET', 'Simpanan_wajib', [
      'headers' => $headers,
      'query' => [
        'id_sim_wajib'  => $id,
        'MyKey'         => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'][0];
  }

  public function addData()
  {
    $token = $this->session->userdata('token');
    $headers = [
      'Authorization' => 'Bearer ' . $token
    ];

    $data = [
      "anggota_id"    => $this->input->post('anggota_id', true),
      "nominal_wajib"   => $this->input->post('nominal_wajib', true),
      'MyKey'         => 'kspkey'
    ];
    $response = $this->_client->request('POST', 'Simpanan_wajib', [
      'headers'     => $headers,
      'form_params' => $data
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function updateData()
  {
    $token = $this->session->userdata('token');
    $headers = [
      'Authorization' => 'Bearer ' . $token
    ];

    $data = [
      "anggota_id"      => $this->input->post('anggota_id', true),
      "nominal_wajib"   => $this->input->post('nominal_wajib', true),
      "id_sim_wajib"    => $this->input->post('id_sim_wajib', true),
      'MyKey'           => 'kspkey'
    ];

    $response = $this->_client->request('PUT', 'Simpanan_wajib', [
      'headers'     => $headers,
      'form_params' => $data
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function deleteData($id)
  {
    $token = $this->session->userdata('token');
    $headers = [
      'Authorization' => 'Bearer ' . $token
    ];
    $response = $this->_client->request('DELETE', 'Simpanan_wajib', [
      'headers'     => $headers,
      'form_params' => [
        'id_sim_wajib'  => $id,
        'MyKey'         => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function getSimpananAnggota()
  {
    $token = $this->session->userdata('token');
    $headers = [
      'Authorization' => 'Bearer ' . $token
    ];
    $response = $this->_client->request('GET', 'SimpananWajib_anggota', [
      'headers'     => $headers,
      'query' => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
  }
}
