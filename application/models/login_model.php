<?php

class login_model extends CI_Model{
    public function cek_login($username,$password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('user');
    }

    public function getLoginData($user, $pass)
    {
        $u = $user;
        $p = MD5($pass);

        $query_cekLogin = $this->db->get_where('user',array('username'=> $u, 'password'=> $p));

        if (count($query_cekLogin->result()) > 0) {
            foreach ($query_cekLogin->result() as $qck){
                foreach ($query_cekLogin->result() as $ck){  
                    $ses_data ['logged_in']     = TRUE;
                    $ses_data ['username']      = $ck->username;
                    $ses_data ['password']      = $ck->password;
                    $ses_data ['level']         = $ck->level;
                    $this->session->set_userdata($ses_data);
                }
                redirect('administraktor/dashboard');
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