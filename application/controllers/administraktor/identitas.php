<?php

class identitas extends CI_ControLLer
{

    public function index()
    {
        $data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/identitas', $data);
        $this->load->view('templat_administraktor/footer');
    }
    public function update($id)
    {
        $where = array('id_identitas' => $id);

        $data['identitas'] = $this->identitas_model->edit_data($where,'identitas')->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/identitas_update', $data);
        $this->load->view('templat_administraktor/footer');
    }
    public function update_aksi()
    {
        $id = $this->input->post('id_identitas');
        $nama_website = $this->input->post('nama_website');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $level = $this->input->post('level');

        $data = array(
            'nama_website' => $nama_website,
            'alamat' => $alamat,
            'email' =>  $email,
            'telepon' => $telepon,
        );

        $where = array(
            'id_identitas' => $id
        );

        $this->identitas_model->update_data($where,$data,'identitas');
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Identitas Berhasil Di Update!
        <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('administraktor/identitas');
    }
}