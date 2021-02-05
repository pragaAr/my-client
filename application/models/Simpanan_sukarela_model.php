<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Simpanan_sukarela_model extends CI_Model
{
  private $_client;
  public function __construct()
  {
    $this->_client = new Client([
      'base_uri' => 'http://localhost:8080/my-server/api/'
    ]);
  }

  public function getAll()
  {
    $token = $this->session->userdata('token');
    $headers = [
      'Authorization' => 'Bearer ' . $token
    ];
    $response = $this->_client->request('GET', 'Simpanan_sukarela', [
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
    $response = $this->_client->request('GET', 'Simpanan_sukarela', [
      'headers' => $headers,
      'query' => [
        'id_sukarela' => $id,
        'MyKey'       => 'kspkey'
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
      "anggota_id"        => $this->input->post('anggota_id', true),
      "nominal_sukarela"  => $this->input->post('nominal_sukarela', true),
      'MyKey'             => 'kspkey'
    ];
    $response = $this->_client->request('POST', 'Simpanan_sukarela', [
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
      "anggota_id"        => $this->input->post('anggota_id', true),
      "nominal_sukarela"  => $this->input->post('nominal_sukarela', true),
      "id_sukarela"       => $this->input->post('id_sukarela', true),
      'MyKey'             => 'kspkey'
    ];

    $response = $this->_client->request('PUT', 'Simpanan_sukarela', [
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
    $response = $this->_client->request('DELETE', 'Simpanan_sukarela', [
      'headers'  => $headers,
      'form_params' => [
        'id_sukarela' => $id,
        'MyKey'       => 'kspkey'
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
    $response = $this->_client->request('GET', 'SimpananSukarela_anggota', [
      'headers'     => $headers,
      'query' => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
  }
}
