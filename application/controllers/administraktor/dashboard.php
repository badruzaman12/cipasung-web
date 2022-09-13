<?php

class Dashboard extends CI_ControLLer{

    function __construct() {
        parent::__construct();

        if (!isset($this->session->userdata['username'])){
            $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('administraktor/auth');
    }
}
    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username'  => $data->username,
            'level'     => $data->level,
        );

        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/dashboard',$data);
        $this->load->view('templat_administraktor/footer');
    }
} 