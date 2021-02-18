<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class PinjamanAnggota_model extends CI_Model
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
    $response = $this->_client->request('GET', 'Pinjaman_anggota', [
      'headers' => $headers,
      'query'   => [
        'MyKey' => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
  }
}
