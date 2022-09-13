<?php

class guru extends CI_Controller{

    public function index()
    {
        $data['guru'] = $this->guru_model->tampil_data('guru')->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/guru',$data);
        $this->load->view('templat_administraktor/footer');
        }

        public function detail($id)
        {
        $data['detail'] = $this->guru_model->ambil_id_guru($id);
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/guru_detail',$data);
        $this->load->view('templat_administraktor/footer');
        }
        public function tambah_guru()
        {
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/guru_form');
        $this->load->view('templat_administraktor/footer');   
        }
        
        public function tambah_guru_aksi()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->tambah_guru();
            }else{
                $nama_guru          =$this->input->post('nama_guru');
                $email              =$this->input->post('email');
                $alamat_guru        =$this->input->post('alamat_guru');
                $telepon            =$this->input->post('telepon');
                $jenis_kelamin      =$this->input->post('jenis_kelamin');
                $pendidikan         =$this->input->post('pendidikan');
                $photo              =$_FILES['photo'];
                if ($photo=''){}else{
                    $config['upload_path'] = './assets/uploads';
                    $config['allowed_types'] = 'jpg|png|gif|tiff';

                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('photo')){
                        echo "Gagal Upload"; die();
                    }else{
                        $photo=$this->upload->data('file_name');
                    }
                }

                $data = array(
                    
                    'nama_guru'              => $nama_guru,
                    'alamat_guru'            => $alamat_guru,
                    'email'                  => $email,
                    'telepon'                => $telepon,
                    'jenis_kelamin'          => $jenis_kelamin,
                    'pendidikan'             => $pendidikan,
                    'photo'                  => $photo
                );

                $this->guru_model->insert_data($data,'guru');
                $this->session->set_flashdata('Pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Gru Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('administraktor/guru');
            }
        }

        public function update($id)
        {
            $where = array('id_guru' => $id);
            var_dump($where);
            $data['guru'] = $this->guru_model->edit_data($where,'guru')->result();
            $data['detail'] = $this->guru_model->ambil_id_guru($id);
            $this->load->view('templat_administraktor/header');
            $this->load->view('templat_administraktor/sidebar');
            $this->load->view('administraktor/guru_update',$data);
            $this->load->view('templat_administraktor/footer');
        }
        public function update_guru_aksi()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE)
            {
            $this->update();
        }else{
            $id                 =$this->input->post('id_guru');
            $nama_guru          =$this->input->post('nama_guru');
            $email              =$this->input->post('email');
            $alamat_guru        =$this->input->post('alamat_guru');
            $telepon            =$this->input->post('telepon');
            $jenis_kelamin      =$this->input->post('jenis_kelamin');
            $pendidikan         =$this->input->post('pendidikan');
            $photo              =$_FILES['userfile']['name'];
            if ($photo){
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|gif|tiff';

                $this->load->library('upload',$config);
                if($this->upload->do_upload('userfile')){
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('photo', $userfile);
                }else{
                    echo "Gagal Upload";
                }
            }
            
            $data = array(
                'nama_guru'              => $nama_guru,
                'alamat_guru'            => $alamat_guru,
                'email'                  => $email,
                'telepon'                => $telepon,
                'jenis_kelamin'          => $jenis_kelamin,
                'pendidikan'             => $pendidikan,
                'photo'                  => $photo

            );
            $where = array(
                'id_guru' =>$id
            );
            $this->guru_model->update_data($where,$data,'guru');
            $this->session->set_flashdata('Pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Guru Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('administraktor/guru');
    }
}
        public function _rules()
        {
            $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required',[ 
                'required' => 'Nama Guru Wajib diisi'
            ]);


            $this->form_validation->set_rules('alamat_guru', 'Alamat Lengkap', 'required',[ 
                'required' => 'Alamat Lengkap Wajib diisi'
            ]);

            $this->form_validation->set_rules('email', 'Email', 'required',[ 
                'required' => 'Email Wajib diisi'
            ]);

            $this->form_validation->set_rules('telepon', 'No Hp', 'required',[ 
                'required' => 'No Hp Wajib diisi'
            ]);

            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required',[ 
                'required' => 'Jenis Kelamin Wajib diisi'
            ]);

            $this->form_validation->set_rules('pendidikan', 'Pendidikan Trakhir', 'required',[ 
                'required' => 'Pendidikan Trakhir Wajib diisi'
            ]);
        }
        public function delete($id)
        {
            $where = array('id' => $id);
            $this->guru_model->hapus_data($where,'guru');
            $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Guru Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span=aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('administraktor/guru');
        }
    }
