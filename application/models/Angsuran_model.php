<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Angsuran_model extends CI_Model
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
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Angsuran', [
      'headers' => $headers,
      'query'   => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
  }

  public function getSummaryAngsuranByIdPinjam($id)
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Angsuran', [
      'headers'     => $headers,
      'query'       => [
        'MyKey'     => 'kspkey',
        'id_angsur' => $id
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'][0];
  }

  public function getAngsuransByIdPinjam($id)
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Angsuran_pinjaman', [
      'headers'     => $headers,
      'query'       => [
        'MyKey'     => 'kspkey',
        'id_angsur' => $id
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
  }

  public function getAngsuranById($id)
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Angsuran', [
      'headers'     => $headers,
      'query'       => [
        'MyKey'     => 'kspkey',
        'id_angsur' => $id
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'][0];
  }

  public function addAngsuran()
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];
    $data = [
      'pinjam_id'   => $this->input->post('pinjam_id', true),
      'nom_angsur'  => $this->input->post('nom_angsur', true),
      'tgl_bayar'   => date('Y-m-d H:i:s'),
      'MyKey'       => 'kspkey'
    ];
    $response = $this->_client->request('POST', 'Angsuran', [
      'headers'     => $headers,
      'form_params' => $data
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function deleteAngsuran($id)
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('DELETE', 'Angsuran', [
      'headers'     => $headers,
      'form_params' => [
        'id_angsur' => $id,
        'MyKey'     => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function angsuran_masuk()
  {
    $token    = $this->session->userdata('token');
    $headers  = [
      'Authorization' => 'Bearer ' . $token
    ];

    $response = $this->_client->request('GET', 'Angsuran', [
      'headers' => $headers,
      'query'   => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    $total_angsur = 0;
    $allAngsur = $result['data'];
    foreach ($allAngsur as $dataAngsur) {
      $total_angsur += $dataAngsur['total_angsur'];
    }
    return $total_angsur;
  }
}
