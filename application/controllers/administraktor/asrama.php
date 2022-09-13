<?php

class Asrama extends CI_ControLLer{

    public function index()
    {
        $data['asrama']     =$this->asrama_model->tampil_data()->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/asrama',$data);
        $this->load->view('templat_administraktor/footer');
    }

    public function input()
    {
        $data = array(
            'id_asrama'  => set_value('id_asrama'),
            'kode_asrama'  => set_value('kode_asrama'),
            'kapasitas_asrama'  => set_value('kapasitas_asrama'),
            'nama_asrama'  => set_value('nama_asrama'),
        );
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/asrama_form',$data);
        $this->load->view('templat_administraktor/footer');

    }

    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->input();
        }else {
            $data = array(
                'kode_asrama'   => $this->input->post('kode_asrama', TRUE),
                'kapasitas_asrama'   => $this->input->post('kapasitas_asrama', TRUE),
                'nama_asrama'   => $this->input->post('nama_asrama', TRUE),
            );
            $this->asrama_model->input_data($data);
            $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Asrama Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administraktor/asrama');

            }
        }

        public function _rules()
        {
            $this->form_validation->set_rules('kode_asrama','kode_asrama','required',['required'  => 'Kode Asrama wajib diisi']);
            $this->form_validation->set_rules('kapasitas_asrama','kapasitas_asrama','required',['required'  => 'Kapasitas Asrama wajib diisi']);
            $this->form_validation->set_rules('nama_asrama','nama_asrama','required',['required'  => 'Nama Asrama wajib diisi']);

        }

        public function update($id)
        {
            $where = array('id_asrama' =>$id);
            $data['asrama'] = $this->asrama_model->edit_data($where, 'asrama')->result();
            $this->load->view('templat_administraktor/header');
            $this->load->view('templat_administraktor/sidebar');
            $this->load->view('administraktor/asrama_update',$data);
            $this->load->view('templat_administraktor/footer');
        }
        public function update_aksi()
        {
            $id = $this->input->post('id_asrama');
            $kode_asrama = $this->input->post('kode_asrama');
            $kapasitas_asrama = $this->input->post('kapasitas_asrama');
            $nama_asrama = $this->input->post('nama_asrama');

            $data = array(
                'kode_asrama' => $kode_asrama,
                'kapasitas_asrama' => $kapasitas_asrama,
                'nama_asrama' => $nama_asrama
            );
            $where = array(
                'id_asrama' => $id
            );

            $this->asrama_model->update_data($where,$data,'asrama');
            $this->session->set_flashdata('Pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Asrama Berhasil DiUpdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administraktor/asrama');
        }
        public function delete($id)
        {
            $where = array('id_asrama' => $id);
            $this->asrama_model->hapus_data($where,'asrama');
            $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Asrama Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span=aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administraktor/asrama');
        }
    }