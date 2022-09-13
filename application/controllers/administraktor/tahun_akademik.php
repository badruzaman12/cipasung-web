<?php

class Tahun_akademik extends CI_ControLLer{

    public function index()
    {
        $data['tahun_akademik']     =$this->tahun_akademik_model->tampil_data()->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/tahun_akademik',$data);
        $this->load->view('templat_administraktor/footer');
    }
    public function input()
    {
        $data = array(
            'id_tahun'  => set_value('id_tahun_'),
            'tahun_akademik'  => set_value('tahun_akademik'),
            'semester'  => set_value('semester'),
            'kelas'  => set_value('kelas'),
            'status'  => set_value('status'),
        );
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/tahun_akademik_form',$data);
        $this->load->view('templat_administraktor/footer');

    }

    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->input();
        }else {
            $data = array(
                'id_tahun'   => $this->input->post('id_tahun', TRUE),
                'tahun_akademik'   => $this->input->post('tahun_akademik', TRUE),
                'semester'   => $this->input->post('semester', TRUE),
                'kelas'   => $this->input->post('kelas', TRUE),
                'status'   => $this->input->post('status', TRUE),
            );
            $this->tahun_akademik_model->input_data($data);
            $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Tahun Akademik Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administraktor/tahun_akademik');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tahun_akademik','tahun_akademik','required',['required'  => 'Tahun Akademik wajib diisi']);
        $this->form_validation->set_rules('semester','semester','required',['required'  => 'semester wajib diisi']);
        $this->form_validation->set_rules('kelas','kelas','required',['required'  => 'kelas wajib diisi']);
        $this->form_validation->set_rules('status','status','required',['required'  => 'status wajib diisi']);

    }
            public function update($id)
            {
                $where = array('id_tahun' =>$id);
                $data['tahun_akademik'] = $this->asrama_model->edit_data($where, 'tahun_akademik')->result();
                $this->load->view('templat_administraktor/header');
                $this->load->view('templat_administraktor/sidebar');
                $this->load->view('administraktor/tahun_akademik_update',$data);
                $this->load->view('templat_administraktor/footer');
            }
            public function update_aksi()
            {
                $id = $this->input->post('id_tahun');
                $tahun_akademik = $this->input->post('tahun_akademik');
                $semester = $this->input->post('semester');
                $kelas = $this->input->post('kelas');
                $status = $this->input->post('status');
    
                $data = array(
                    'tahun_akademik' => $tahun_akademik,
                    'semester' => $semester,
                    'kelas' => $kelas,
                    'status'=> $status
                );
                $where = array(
                    'id_tahun' => $id
                );
    
                $this->tahun_akademik_model->update_data($where,$data,'tahun_akademik');
                $this->session->set_flashdata('Pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Tahun Akademik Berhasil DiUpdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('administraktor/tahun_akademik');
            }
            public function delete($id)
            {
                $where = array('id_tahun' => $id);
                $this->tahun_akademik_model->hapus_data($where,'tahun_akademik');
                $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data tahun akademik Berhasil Dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span=aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('administraktor/tahun_akademik');
            }
        }