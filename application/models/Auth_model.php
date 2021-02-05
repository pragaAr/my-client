<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Auth_model extends CI_Model
{
  private $_client;
  public function __construct()
  {
    $this->_client = new Client([
      'base_uri' => 'http://localhost:8080/my-server/api/Anggota_user/'
    ]);
  }

  public function login()
  {
    $email    = $this->input->post('email', true);
    $password = $this->input->post('password', true);

    $response = $this->_client->request('POST', 'login', [
      'form_params' => [
        'email'     => $email,
        'password'  => $password,
        'MyKey'     => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
  }

  public function register()
  {
    $response = $this->_client->request('POST', 'register', [
      'form_params' => [
        'nama'      => $this->input->post('nama', true),
        'email'     => $this->input->post('email', true),
        'password'  => $this->input->post('password', true),
        'alamat'    => $this->input->post('alamat', true),
        'jk'        => $this->input->post('jk', true),
        'no_telp'   => $this->input->post('no_telp', true),
        'no_ktp'    => $this->input->post('no_ktp', true),
        'MyKey'     => 'kspkey'
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }
}
