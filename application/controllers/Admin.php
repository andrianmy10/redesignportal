<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  private $api_link_bpm, $token, $uid, $timestamp, $api_key;

  function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper(array('path','time'));
		$this->load->library('session');

    $this->api_link_bpm = $this->session->userdata('api_link_bpm');
    $this->token = $this->session->userdata('token');
    $this->uid = $this->session->userdata('uid');
    $this->timestamp = date('Y-m-d H:i:s');
    $this->api_key = $this->config->item('api_key');
	}

  /* Bagian Menu Setting */
  public function viewMenuSetting() {

    $data['greeting'] = get_greeting();

    $ch = curl_init($this->api_link_bpm . 'extrarest/login-user');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $this->token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $oUser = json_decode(curl_exec($ch));

    $data['user_login'] = $oUser;

    $api_link = "https://webserver.asihputera.or.id/api/1.0/getMenu";
    $ch1 = curl_init($api_link);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_POST, true);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode([
        'api_key_access' => $this->api_key,
        'web_origin' => 'http://localhost:8080/redesignportal/',
    ]));
    curl_setopt($ch1, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch1);
    curl_close($ch1);

    $result = json_decode($response, true);
    $error_msg = '';

    if (isset($result['status']) && $result['status'] === 'success' && isset($result['data'])) {
        $data['menu'] = $result['data'];
    } else {
        $this->session->set_flashdata('error', $error_msg);
    }

    $this->load->view('Canvas/Admin/Menu/v_menusetting', $data);
  }

  public function saveMenu(){
    $nama_menu = $this->input->post('nama_menu');
    $menu_parent = $this->input->post('menu_parent');
    $viewer = $this->input->post('viewer');
    $urutan = $this->input->post('urutan');
    $publish = $this->input->post('publish');

    $api_link = "https://webserver.asihputera.or.id/api/1.0/addMenu?nama_menu=".urlencode($nama_menu)."&menu_parent=".urlencode($menu_parent)."&viewer=".urlencode($viewer).
    "&urutan=".urlencode($urutan)."&publish=".urlencode($publish)."&pembuat=".urlencode($this->uid)."&ts=".urlencode($this->timestamp);

    $api_key = $this->config->item('api_key');

    $ch = curl_init($api_link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'api_key_access' => $api_key,
        'web_origin' => 'http://localhost:8080/redesignportal/',
    ]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    $error_msg = '';

    if (isset($result['status']) && $result['status'] === 'success') {
      $this->session->set_flashdata('success', 'Menu berhasil dibuat.');
    } else {
      $this->session->set_flashdata('error', $error_msg);
    }

    redirect('admin/menusetting');
  }

  /* Bagian Modul Setting */
  public function viewProcessmakerSetting(){
    $data['greeting'] = get_greeting();

    $ch = curl_init($this->api_link_bpm . 'extrarest/login-user');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $this->token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $oUser = json_decode(curl_exec($ch));

    $data['user_login'] = $oUser;
    $api_link = "https://webserver.asihputera.or.id/api/1.0/getDataPM";
    $ch1 = curl_init($api_link);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_POST, true);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode([
        'api_key_access' => $this->api_key,
        'web_origin' => 'http://localhost:8080/redesignportal/',
    ]));
    curl_setopt($ch1, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch1);
    curl_close($ch1);

    $result = json_decode($response, true);
    $error_msg = '';

    if (isset($result['status']) && $result['status'] === 'success' && isset($result['data'])) {
        $data['pm'] = $result['data'];
    } else {
        $this->session->set_flashdata('error', $error_msg);
    }

    $this->load->view('Canvas/Admin/Modul/v_processmaker', $data);
  }
}
