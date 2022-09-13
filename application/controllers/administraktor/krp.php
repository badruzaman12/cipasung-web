<?php

class krp extends CI_ControLLer
{

    public function index()
    {
        $data = array(
            'nama' => set_value('nama'),
            'email' => set_value('email'),
            'id_tahun' => set_value('id_tahun'),

        );
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/masuk_krp', $data);
        $this->load->view('templat_administraktor/footer');
    }

    public function krp_aksi()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('id_tahun', 'id_tahun', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $id_tahun = $this->input->post('id_tahun');

            if ($this->santri_model->get_by_tanggal_lahir($nama, $email) == null) {
                $this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Santri Yang anda Input Belum Terdaftar!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
            </div>');
                redirect('administraktor/krp');
            } else {
                $this->load->model('asrama_model');
                $this->load->model('krp_model');
                $santri = $this->santri_model->get_by_tanggal_lahir($nama, $email);
                $tahun_akademik = $this->tahun_akademik_model->get_by_id($id_tahun);
                $krp_data = $this->krp_model->get_by_id($santri->id);

                $data = array(
                    'id_tahun' => $id_tahun,
                    'email' => $email,
                    'asrama' => $santri->asrama,
                    'nama' => $santri->nama,
                    'tahun_akademik' => $tahun_akademik,
                    'krp_data' => $krp_data,
                );

                $this->load->view('templat_administraktor/header');
                $this->load->view('templat_administraktor/sidebar');
                $this->load->view('administraktor/krp_list', $data);
                $this->load->view('templat_administraktor/footer');
            }
        }
    }
    public function baca_krp($nama, $tahun)
    {
        $this->db->select('k.id_krp,k.kode_materi_pengajian,m.nama_materi_pengajian,m.kelas');
        $this->db->from('tahun_akademik as k');
        $this->db->where('k.id_tahun', $tahun);
        $this->db->join('materi_pengajian as m', 'm.kode_materi_pengajian =
             k.kode_materi_pengajian');

        $kelas = $this->db->get()->result();
        return $kelas;
    }

    public function _ruleskrp()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('id_tahun', 'id_tahun', 'required');
    }
    public function tambah_krp($nama, $email, $tahun)
    {
        $datafrom = array (
            'id_krp' => set_value('id_krp'),
            'id_santri' => set_value('id_santri'),
            'id_tahun'  => $tahun,
            'tahun_semester' => $this->tahun_akademik_model->get_by_id($tahun)->tahun_akademik,
            'semester'      => $this->tahun_akademik_model->get_by_id($tahun)->semester==1?'Ganjil':'Genap',
            'nama'          => $nama,
            'email'         => $email,
            'kode_materi_pengajian' => set_value('kode_materi_pengajian')

        );
        $this->load->view('templat_administraktor/header');
        $this->load->view('templat_administraktor/sidebar');
        $this->load->view('administraktor/krp_from', $datafrom);
        $this->load->view('templat_administraktor/footer');
    }
    public function tambah_krp_aksi()
    {
        $this->rules();

        if($this->from_validation->run() == FALSE) {
            $this->tambah_krp($this->input->post('nama',TRUE),
            // $this->tambah_krp($this->input->post('email',TRUE),
            $this->input->post('id_tahun',TRUE) );
        }else{
            $nama       =$this->input->post('nama',TRUE);
            $id_tahun   = $this->input->post('id_tahun',TRUE);
            $kode_materi_pengajian   = $this->input->post('kode_materi_pengajian',TRUE);

            $data =array(

                'id_tahun'      => $id_tahun,
                'nama'          => $nama,
                'email'         => $email,
                'kode_materi_pengajian' => $kode_materi_pengajian,
            );
            $this->krp_model->insert($data);
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data KRP Berhasil Di Tambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('administraktor/krp/index');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_tahun', 'id_tahun', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('kode_materi_pengajian', 'kode_materi_pengajian', 'required');
    }
    public function update ($id)
    {
        $row = $this->krp_model->get_by_id($id);
        $th = $row->id_tahun;

        if($row) {
            $data = array(
                'id_krp'            => set_value('id_krp', $row->id_krp),
                'id_tahun'            => set_value('id_tahun', $row->id_tahun),
                'nama'            => set_value('nama', $row->nama),
                'email'            => set_value('email', $row->id_email),
                'kode_materi_pengajian'     => set_value('kode_materi_pengajian', $row->kode_materi_pengajian),
                'tahun_semester'            => $this->tahun_akademik_model->get_by_id($th)->tahun_akademik,
                'semester'            => $this->tahun_akademik_model->get_by_id($th)->semester==1?'Ganjil':'genap',

            );
            $this->load->view('templat_administraktor/header');
            $this->load->view('templat_administraktor/sidebar');
            $this->load->view('administraktor/krp_update', $data);
            $this->load->view('templat_administraktor/footer');
        }else{
            echo "Data Tidak Ada!";
        }
    }
    public function update_aksi()
    {
        $id_kpr         = $this->input->post('id_krp', TRUE);
        $nama         = $this->input->post('nama', TRUE);
        $email         = $this->input->post('email', TRUE);
        $id_tahun         = $this->input->post('id_tahun', TRUE);
        $kode_materi_pengajian        = $this->input->post('kode_materi_pengajian', TRUE);

        $data = array (
            'id_krp'                         => $id_kpr,
            'id_tahun'                       => $id_tahun,
            'nama'                           => $nama,
            'email'                          => $email,
            'kode_materi_pengajian'          => $this->input->post('kode_materi_pengajian', TRUE)
        );

        $this->krp_model->update($id_kpr, $data);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data KRP Berhasil Diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span=aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('administraktor/krp/index');
    }
    public function delete($id)
    {
        $where = array('id_krp' => $id);
        $this->krp_model->hapus_data($where,'krp');
        $this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data KRP Berhasil Dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span=aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administraktor/krp/index');
    }
}