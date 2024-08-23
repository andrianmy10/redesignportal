<?php
  class M_login extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getLogo() {
        $query = $this->db->query("SELECT logo FROM tb_site");
        $row = $query->row_array();
        return $row['logo'];
    }
  }
?>
