<?php

class materi_pengajian extends CI_Controller{

    public function index()
    {
        $data['materi_pengajian'] = $this->materi_pengajian_model->tampil_data('materi_pengajian')->result();
        $data['asrama']     =$this->asrama_model->tampil_data()->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/materi_pengajian',$data);
        $this->load->view('templat_administraktor/footer');
        }

        public function detail($id)
        {
        $data['detail'] = $this->materi_pengajian_model->ambil_id_materi_pengajian($id);
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/materi_pengajian_detail',$data);
        $this->load->view('templat_administraktor/footer');
        }
        public function tambah_materi_pengajian()
        {
        $data['asrama'] = $this->materi_pengajian_model->tampil_data('asrama')->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/materi_pengajian_form',$data);
        $this->load->view('templat_administraktor/footer');   
        }
        
        public function tambah_materi_pengajian_aksi()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->tambah_materi_pengajian();
            }else{
                $kode_materi_pengajian      =$this->input->post('kode_materi_pengajian');
                $nama_materi_pengajian      =$this->input->post('nama_materi_pengajian');
                $asrama                     =$this->input->post('asrama');
                $kelas_pengajian            =$this->input->post('kelas_pengajian');
                $semester                   =$this->input->post('semester');
                

                $data = array(
                    
                    'kode_materi_pengajian'             => $kode_materi_pengajian,
                    'nama_materi_pengajian'             => $nama_materi_pengajian,
                    'asrama'                            => $asrama,
                    'kelas_pengajian'                   => $kelas_pengajian,
                    'semester'                          => $semester
                    
                );

                $this->materi_pengajian_model->insert_data($data,'materi_pengajian');
                $this->session->set_flashdata('Pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Materi Pengajian Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('administraktor/materi_pengajian');
            }
        }
        public function update($id)
        {
            $where = array('id' => $id);

            $data['materi_pengajian'] = $this->db->query("select * from materi_pengajian mp, asrama asm where
                mp.asrama=asm.nama_asrama and
                mp.id='$id'")->result();
            $data['asrama'] = $this->materi_pengajian_model->tampil_data('asrama')->result();
            $data['detail'] = $this->materi_pengajian_model->ambil_id_materi_pengajian($id);
            $this->load->view('templat_administraktor/header');
            $this->load->view('templat_administraktor/sidebar');
            $this->load->view('administraktor/materi_pengajian_update',$data);
            $this->load->view('templat_administraktor/footer');
        }
        public function update_materi_pengajian_aksi()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE)
            {
            $this->update();
        }else{
                $id                         =$this->input->post('id');
                $kode_materi_pengajian      =$this->input->post('kode_materi_pengajian');
                $nama_materi_pengajian      =$this->input->post('nama_materi_pengajian');
                $asrama                     =$this->input->post('asrama');
                $kelas_pengajian            =$this->input->post('kelas_pengajian');
                $semester                   =$this->input->post('semester');
            }
            
            $data = array(
                'kode_materi_pengajian'             => $kode_materi_pengajian,
                'nama_materi_pengajian'             => $nama_materi_pengajian,
                'asrama'                            => $asrama,
                'kelas_pengajian'                   => $kelas_pengajian,
                'semester'                          => $semester

            );
            $where = array(
                'id' =>$id
            );
            $this->materi_pengajian_model->update_data($where,$data,'materi_pengajian');
            $this->session->set_flashdata('Pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Materi Pengajian Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administraktor/materi_pengajian');
    }

        public function _rules()
        {
            $this->form_validation->set_rules('kode_materi_pengajian', 'Kode Materi Pengajian', 'required',[ 
                'required' => 'Kode Materi Pengajian Wajib diisi'
            ]);
    
            $this->form_validation->set_rules('nama_materi_pengajian', 'Nama Materi Pengajian', 'required',[ 
                'required' => 'Nama Materi Pengajian Wajib diisi'
            ]);
    
            $this->form_validation->set_rules('asrama', 'Asrama', 'required',[ 
                'required' => 'Nama Asrama Wajib diisi'
            ]);
    
            $this->form_validation->set_rules('kelas_pengajian', 'Kelas Pengajian', 'required',[ 
                'required' => 'Kelas Pengajian Wajib diisi'
            ]);
    
            $this->form_validation->set_rules('semester', 'Semester', 'required',[ 
                'required' => 'Semester Wajib diisi'
            ]);
        }
        public function delete($id)
        {
            $where = array('id' => $id);
            $this->asrama_model->hapus_data($where,'materi_pengajian');
            $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Materi Pengajian Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span=aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administraktor/materi_pengajian');
        }
    }
