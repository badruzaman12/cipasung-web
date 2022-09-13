<?php

class landing_page extends CI_Controller{

    public function index()
    {
        $data ['identitas'] = $this->identitas_model->tampil_data('identitas')->result();

        $this->load->view('templat_administraktor/header');
        $this->load->view('landing_page', $data);
        $this->load->view('templat_administraktor/footer');
    }
}