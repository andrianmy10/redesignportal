<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper(array('path'));
		$this->load->model('M_login');
		$this->load->helper('text');
		$this->load->library('user_agent');
		$this->load->library('session');
		$this->load->helper('wa');
	}

	public function index()
	{
    $data['logo'] = $this->M_login->getLogo();
		$this->load->view('Login/Pegawai/v_login', $data);
	}

  public function ViewLoginOrtu()
	{
    $nohpDC = hp('085603155659');
		$nohpTK = hp('081320267491');
		$nohpMI =  hp('081320267492');
		$nohpMTSMA =  hp('081320267493');
		// atur pesan dengan helper text urlencode
		$message = '&text=' . urlencode('');
		// cek user_agent / device yang digunakan user

		// kalau mobil maka pakai api.whatsapp.com
		if ($this->agent->is_mobile()) $linkWADC = 'https://api.whatsapp.com/send?phone=' . $nohpDC . $message;
		// tapi kalau desktop pakai web.whatsapp.com
		else $linkWADC = 'https://web.whatsapp.com/send?phone=' . $nohpDC . $message;

		if ($this->agent->is_mobile()) $linkWATK = 'https://api.whatsapp.com/send?phone=' . $nohpTK . $message;
		// tapi kalau desktop pakai web.whatsapp.com
		else $linkWATK = 'https://web.whatsapp.com/send?phone=' . $nohpTK . $message;

		if ($this->agent->is_mobile()) $linkWAMI = 'https://api.whatsapp.com/send?phone=' . $nohpMI . $message;
		// tapi kalau desktop pakai web.whatsapp.com
		else $linkWAMI = 'https://web.whatsapp.com/send?phone=' . $nohpMI . $message;

		if ($this->agent->is_mobile()) $linkWAMTSMA = 'https://api.whatsapp.com/send?phone=' . $nohpMTSMA . $message;
		// tapi kalau desktop pakai web.whatsapp.com
		else $linkWAMTSMA = 'https://web.whatsapp.com/send?phone=' . $nohpMTSMA . $message;

		$data['wa_dc'] = $linkWADC;
		$data['wa_tk'] = $linkWATK;
		$data['wa_mi'] = $linkWAMI;
		$data['wa_mtsma'] = $linkWAMTSMA;

		$data['no_dc'] = $nohpDC;
		$data['no_tk'] = $nohpTK;
		$data['no_mi'] = $nohpMI;
		$data['no_mtsma'] = $nohpMTSMA;

    $data['logo'] = $this->M_login->getLogo();
		$this->load->view('Login/Siswa/v_login', $data);
	}

  public function aksi_login(){

    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    if(!isset($username)){
      //Kondisi Login Siswa atau Orang Tua
    } else {
      //Kondisi Login Pegawai
      $api_link = "https://webserver.asihputera.or.id/api/1.0/getWorkspace";
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
      if (isset($result['status']) && $result['status'] === 'success') {
          $api_link_bpm = $result['data'][0]['api_link'];
          $client_id = $result['data'][0]['client_id'];
          $client_secret = $result['data'][0]['client_secret'];
      } else {
          $errorMessage = isset($result['message']) ? $result['message'] : 'Gagal Dapat Data';
      }

      $arr = explode('/api/1.0/',$api_link_bpm);
  		$pmLink = trim($arr[0]);
  		$pmWorkspace = trim($arr[1]);

      //Proses Login Dengan Processmaker BPM
      $postParams = array(
    		'grant_type'    => 'password',
    		'scope'         => '*',
    		'client_id'     => $client_id,
    		'client_secret' => $client_secret,
    		'username'      => $username,
    		'password'      => $password
  		);

      $ch = curl_init($pmLink.'/'.$pmWorkspace.'oauth2/token');
  		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  		curl_setopt($ch, CURLOPT_POST, 1);
  		curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  		$oToken = json_decode(curl_exec($ch));
  		$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  		curl_close($ch);

      if ($httpStatus != 200) {
  		    echo 'Full Gagal';
  		}
  		elseif (isset($oToken->error)) {
  		    echo 'Gadapet Token';
  		}
  		else {
    		setcookie("access_token",  $oToken->access_token,  time() + 86400);
    		setcookie("refresh_token", $oToken->refresh_token); //refresh token doesn't expire
    		setcookie("client_id",     $client_id);
    		setcookie("client_secret", $client_secret);

    		$this->session->set_userdata('token', $oToken->access_token,  time() + 86400);

        $ch1 = curl_init($api_link_bpm. 'extrarest/login-user');
    		curl_setopt($ch1, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $this->session->userdata('token')));
    		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    		$oUser = json_decode(curl_exec($ch1));

        //Kondisi Jika Login Bukan Processmaker_Admin, Maka Harus Login Manual User dengan Role Processmaker_Admin
        if (isset($oUser)){
          $usernameAdmin = $this->config->item('usernameAdmin');
    			$passwordAdmin = $this->config->item('passwordAdmin');

          $postParams2 = array(
      			'grant_type'    => 'password',
      			'scope'         => '*',       //set to 'view_process' if not changing the process
      			'client_id'     => $client_id,
      			'client_secret' => $client_secret,
      			'username'      => $usernameAdmin,
      			'password'      => $passwordAdmin
    			);

          $ch2 = curl_init($pmLink.'/'.$pmWorkspace.'oauth2/token');
    			curl_setopt($ch2, CURLOPT_TIMEOUT, 30);
    			curl_setopt($ch2, CURLOPT_POST, 1);
    			curl_setopt($ch2, CURLOPT_POSTFIELDS, $postParams2);
    			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

    			$oTokenAdmin = json_decode(curl_exec($ch2));
    			$httpStatus = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
    			curl_close($ch2);

    			if ($httpStatus != 200) {
    			     echo 'Full Gagal';
    			}
    			elseif (isset($oTokenAdmin->error)) {
    			     echo 'Gadapet Token';
    			}
    			else {
            setcookie("access_token",  $oTokenAdmin->access_token,  time() + 86400);
      			setcookie("refresh_token", $oTokenAdmin->refresh_token); //refresh token doesn't expire
      			setcookie("client_id",     $client_id);
      			setcookie("client_secret", $client_secret);
          }

          //Ambil Biodata User
          $ch3 = curl_init($api_link_bpm.'user/' . $oUser->uid);
    			curl_setopt($ch3, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $oTokenAdmin->access_token));
    			curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
    			$getUser = json_decode(curl_exec($ch3));
        } else ;

        $this->session->set_userdata('uid', $oUser->uid);
        $this->session->set_userdata('role', $getUser->usr_role);
        $this->session->set_userdata('api_link_bpm', $api_link_bpm);

        redirect('/home');
      }
    }
  }

  public function logout(){
      $this->session->sess_destroy();
      redirect(base_url());
  }
}
