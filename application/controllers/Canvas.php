<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Canvas extends CI_Controller {

  private $api_link_bpm;
  private $token;

  function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper(array('path','time'));
		$this->load->library('session');

    $this->api_link_bpm = $this->session->userdata('api_link_bpm');
    $this->token = $this->session->userdata('token');
	}

  public function index() {

    //Set Ucapan Salam
    $data['greeting'] = get_greeting();

    $ch = curl_init($this->api_link_bpm . 'extrarest/login-user');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $this->token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $oUser = json_decode(curl_exec($ch));

    $data['user_login'] = $oUser;

    $this->load->view('Canvas/v_canvas', $data);
  }
}
