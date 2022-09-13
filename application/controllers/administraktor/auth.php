<?php

class Auth extends CI_Controller{

    public function index()
    {
    $this->load->view('templat_administraktor/header');
    $this->load->view('administraktor/login');
    $this->load->view('templat_administraktor/footer');
    }
    
    public function proses_login()
    {
        $this->form_validation->set_rules('username','username','required',[ 'required' => 'password wajib disi' ]);
        $this->form_validation->set_rules('password','password','required', [ 'required' => 'password wajib disi' ]);
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templat_administraktor/header');
        $this->load->view('administraktor/login');
        $this->load->view('templat_administraktor/footer');
    }else {
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');


            $user = $username;
            $pass = MD5 ($password);

            $cek    = $this->login_model->cek_login($user, $pass);

            if ($cek->num_rows() > 0){
                foreach ($cek->result() as $ck){
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if($sess_data['level'] == 'admin'){
                    redirect('administraktor/dashboard');
                }else{
                    $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('administraktor/auth');
                }
            }else{
                    $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  redirect('administraktor/auth');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('administraktor/auth');
        }
}
