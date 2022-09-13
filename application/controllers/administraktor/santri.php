<?php

class santri extends CI_Controller{

    public function index()
    {
        $data['santri'] = $this->santri_model->tampil_data('santri')->result();
        $data['asrama']     =$this->asrama_model->tampil_data()->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/santri',$data);
        $this->load->view('templat_administraktor/footer');
        }

        public function detail($id)
        {
        $data['detail'] = $this->santri_model->ambil_id_santri($id);
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/santri_detail',$data);
        $this->load->view('templat_administraktor/footer');
        }
        public function tambah_santri()
        {
        $data['asrama'] = $this->santri_model->tampil_data('asrama')->result();
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/santri_form',$data);
        $this->load->view('templat_administraktor/footer');   
        }
        
        public function tambah_santri_aksi()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->tambah_santri();
            }else{
                $nama               =$this->input->post('nama');
                $tempat_lahir       =$this->input->post('tempat_lahir');
                $tanggal_lahir      =$this->input->post('tanggal_lahir');
                $alamat             =$this->input->post('alamat');
                $asrama             =$this->input->post('asrama');
                $email              =$this->input->post('email');
                $password           =$this->input->post('password');
                $no_hp              =$this->input->post('no_hp');
                $nama_ws            =$this->input->post('nama_ws');
                $pekerja_ws         =$this->input->post('pekerja_ws');
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
                    
                    'nama'              => $nama,
                    'tempat_lahir'      => $tempat_lahir,
                    'tanggal_lahir'     => $tanggal_lahir,
                    'alamat'            => $alamat,
                    'asrama'            => $asrama,
                    'email'             => $email,
                    'password'          => $password,
                    'no_hp'             => $no_hp,
                    'nama_ws'           => $nama_ws,
                    'pekerja_ws'        => $pekerja_ws,
                    'jenis_kelamin'     => $jenis_kelamin,
                    'pendidikan'        => $pendidikan,
                    'photo'             => $photo
                );

                $this->santri_model->insert_data($data,'santri');
                $this->session->set_flashdata('Pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Santri Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('administraktor/santri');
            }
        }

        public function update($id)
        {
            $where = array('id' => $id);

            $data['santri'] = $this->db->query("select * from santri sni, asrama asm where
                sni.asrama=asm.nama_asrama and
                sni.id='$id'")->result();
            $data['asrama'] = $this->materi_pengajian_model->tampil_data('asrama')->result();
            $data['detail'] = $this->santri_model->ambil_id_santri($id);
            $this->load->view('templat_administraktor/header');
            $this->load->view('templat_administraktor/sidebar');
            $this->load->view('administraktor/santri_update',$data);
            $this->load->view('templat_administraktor/footer');
        }
        public function update_santri_aksi()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE)
            {
            $this->update();
        }else{
            $id                 =$this->input->post('id');
            $nama               =$this->input->post('nama');
            $tempat_lahir       =$this->input->post('tempat_lahir');
            $tanggal_lahir      =$this->input->post('tanggal_lahir');
            $alamat             =$this->input->post('alamat');
            $asrama             =$this->input->post('asrama');
            $email              =$this->input->post('email');
            $password           =$this->input->post('password');
            $no_hp              =$this->input->post('no_hp');
            $nama_ws            =$this->input->post('nama_ws');
            $pekerja_ws         =$this->input->post('pekerja_ws');
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
                'nama'              => $nama,
                'tempat_lahir'      => $tempat_lahir,
                'tanggal_lahir'     => $tanggal_lahir,
                'alamat'            => $alamat,
                'asrama'            => $asrama,
                'email'             => $email,
                'password'          => $password,
                'no_hp'             => $no_hp,
                'nama_ws'           => $nama_ws,
                'pekerja_ws'        => $pekerja_ws,
                'jenis_kelamin'     => $jenis_kelamin,
                'pendidikan'        => $pendidikan

            );
            $where = array(
                'id' =>$id
            );
            $this->santri_model->update_data($where,$data,'santri');
            $this->session->set_flashdata('Pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Santri Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administraktor/santri');
    }
}
        public function _rules()
        {
            $this->form_validation->set_rules('nama', 'Nama', 'required',[ 
                'required' => 'Nama Wajib diisi'
            ]);

            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required',[ 
                'required' => 'Tempat Lahir Wajib diisi'
            ]);

            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required',[ 
                'required' => 'Tanggal Lahir Wajib diisi'
            ]);

            $this->form_validation->set_rules('alamat', 'Alamat', 'required',[ 
                'required' => 'Alamat Wajib diisi'
            ]);

            $this->form_validation->set_rules('asrama', 'Asrama', 'required',[ 
                'required' => 'Asrama Wajib diisi'
            ]);

            $this->form_validation->set_rules('email', 'Email', 'required',[ 
                'required' => 'Email Wajib diisi'
            ]);


            $this->form_validation->set_rules('password', 'password', 'required',[ 
                'required' => 'Password Wajib diisi'
            ]);

            $this->form_validation->set_rules('no_hp', 'No Hp', 'required',[ 
                'required' => 'No Hp Wajib diisi'
            ]);

            $this->form_validation->set_rules('nama_ws', 'Nama Wali Santri', 'required',[ 
                'required' => 'Nama Wali Santri Wajib diisi'
            ]);

            $this->form_validation->set_rules('pekerja_ws', 'Pekerjaan Wali Santri', 'required',[ 
                'required' => 'Pekerjaan Wali Santri Wajib diisi'
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
            $this->asrama_model->hapus_data($where,'santri');
            $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Santri Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span=aria-hidden="true">&times;</span>
            </button>
             </div>');
            redirect('administraktor/santri');
        }
    }
