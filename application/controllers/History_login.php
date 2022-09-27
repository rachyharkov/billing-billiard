<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class History_login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('History_login_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $history_login = $this->History_login_model->get_all();
        $data = array(
            'history_login_data' => $history_login,
        );
        $this->template->load('template','history_login/history_login_list', $data);
    }

}

/* End of file History_login.php */
/* Location: ./application/controllers/History_login.php */
/* Please DO NOT modify this information : */
